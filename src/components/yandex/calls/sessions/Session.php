<?php
namespace extas\components\yandex\calls\sessions;

use extas\components\Item;
use extas\interfaces\yandex\calls\sessions\ISession;

/**
 * Class Session
 *
 * @package extas\components\yandex\calls\sessions
 * @author jeyroik@gmail.com
 */
class Session extends Item implements ISession
{
    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->config[static::FIELD__SESSION_ID] ?? '';
    }

    /**
     * @return string
     */
    public function getSkillId(): string
    {
        return $this->config[static::FIELD__SKILL_ID] ?? '';
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->config[static::FIELD__USER_ID] ?? '';
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->config[static::FIELD__MESSAGE_ID] ?? 0;
    }

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->config[static::FIELD__IS_NEW] ?? true;
    }

    /**
     * @param bool $isNew
     *
     * @return $this
     */
    public function setIsNew(bool $isNew)
    {
        $this->config[static::FIELD__IS_NEW] = $isNew;

        return $this;
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
     * @param string $skillId
     *
     * @return $this
     */
    public function setSkillId(string $skillId)
    {
        $this->config[static::FIELD__SKILL_ID] = $skillId;

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
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
