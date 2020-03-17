<?php
namespace extas\components\yandex;

use extas\components\Item;
use extas\components\SystemContainer;
use extas\components\yandex\calls\AliceCall;
use extas\components\yandex\responses\AliceResponse;
use extas\interfaces\yandex\calls\IAliceCall;
use extas\interfaces\yandex\IAlice;
use extas\interfaces\yandex\responses\IAliceResponse;
use extas\interfaces\yandex\responses\sessions\ISession;
use extas\interfaces\yandex\skills\IAliceSkill;
use extas\interfaces\yandex\skills\IAliceSkillRepository;

/**
 * Class Alice
 *
 * @package extas\components\yandex
 * @author jeyroik@gmail.com
 */
class Alice extends Item implements IAlice
{
    /**
     * @return mixed
     * @throws
     */
    public function run()
    {
        $yandexCall = [];
        foreach ($this->getPluginsByStage('alice.call.get') as $plugin) {
            $plugin($yandexCall);
        }

        if (empty($yandexCall)) {
            return $this->throwException('Empty yandex call');
        }

        $aliceCall = new AliceCall($yandexCall);
        $skillId = $aliceCall->getSession()->getSkillId();

        /**
         * @var $skillRepo IAliceSkillRepository
         * @var $skill IAliceSkill
         */
        $skillRepo = SystemContainer::getItem(IAliceSkillRepository::class);
        $skill = $skillRepo->one([IAliceSkill::FIELD__ID => $skillId]);

        $response = $this->getResponse($aliceCall);
        if ($skill) {
            $stage = 'alice.skill.run';
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                $plugin($aliceCall, $skill, $response);
            }

            $stage .= '.' . $skill->getName();
            foreach ($this->getPluginsByStage($stage) as $plugin) {
                $plugin($aliceCall, $skill, $response);
            }
        } else {
            return $this->throwException('Missed skill with id ' . $skillId, $response);
        }

        return $this->response($response);
    }

    /**
     * @param $message
     * @param $response
     *
     * @return Alice
     * @throws \Exception
     */
    protected function throwException($message, $response = null)
    {
        if ($this->{static::OPTION__THROW_ON_ERROR}) {
            throw new \Exception($message);
        } else {
            $response = $response ?: new AliceResponse();
            $response->setText('[error] ' . $message);

            return $this->response($response);
        }
    }

    /**
     * @param IAliceResponse $response
     *
     * @return $this
     */
    protected function response(IAliceResponse $response)
    {
        header('Content-Type: application/json');
        echo json_encode($response->__toArray());

        return $this;
    }

    /**
     * @param IAliceCall $call
     * @return AliceResponse
     */
    protected function getResponse($call)
    {
        $requestSession = $call->getSession();

        return new AliceResponse([
            IAliceResponse::FIELD__SESSION => [
                ISession::FIELD__MESSAGE_ID => $requestSession->getMessageId(),
                ISession::FIELD__SESSION_ID => $requestSession->getSessionId(),
                ISession::FIELD__USER_ID => $requestSession->getUserId()
            ],
            IAliceResponse::FIELD__VERSION => $call->getVersion()
        ]);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
