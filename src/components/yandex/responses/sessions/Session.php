<?php
namespace extas\components\yandex\responses\sessions;

use extas\components\Item;
use extas\interfaces\yandex\responses\sessions\ISession;

/**
 * Class Session
 *
 * @package extas\components\yandex\responses\sessions
 * @author jeyroik@gmail.com
 */
class Session extends Item implements ISession
{
    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->config[static::FIELD__MESSAGE_ID] ?? 0;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->config[static::FIELD__USER_ID] ?? '';
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->config[static::FIELD__SESSION_ID] ?? '';
    }

    /**
     * @param int $messageId
     *
     * @return $this
     */
    public function setMessageId(int $messageId)
    {
        $this->config[static::FIELD__MESSAGE_ID] = $messageId;

        return $this;
    }

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId)
    {
        $this->config[static::FIELD__USER_ID] = $userId;

        return $this;
    }

    /**
     * @param string $sessionId
     *
     * @return $this
     */
    public function setSessionId(string $sessionId)
    {
        $this->config[static::FIELD__SESSION_ID] = $sessionId;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
