<?php
namespace extas\interfaces\yandex\calls\sessions;

use extas\interfaces\IItem;

/**
 * Interface ISession
 *
 * @package extas\interfaces\yandex\calls\sessions
 * @author jeyroik@gmail.com
 */
interface ISession extends IItem
{
    public const SUBJECT = 'yandex.call.session';

    public const FIELD__IS_NEW = 'new';
    public const FIELD__MESSAGE_ID = 'message_id';
    public const FIELD__SESSION_ID = 'session_id';
    public const FIELD__SKILL_ID = 'skill_id';
    public const FIELD__USER_ID = 'user_id';

    /**
     * @return bool
     */
    public function isNew(): bool;

    /**
     * @return int
     */
    public function getMessageId(): int;

    /**
     * @return string
     */
    public function getSessionId(): string;

    /**
     * @return string
     */
    public function getSkillId(): string;

    /**
     * @return string
     */
    public function getUserId(): string;

    /**
     * @param bool $isNew
     *
     * @return $this
     */
    public function setIsNew(bool $isNew);

    /**
     * @param int $messageId
     *
     * @return $this
     */
    public function setMessageId(int $messageId);

    /**
     * @param string $sessionId
     *
     * @return $this
     */
    public function setSessionId(string $sessionId);

    /**
     * @param string $skillId
     *
     * @return $this
     */
    public function setSkillId(string $skillId);

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId);
}
