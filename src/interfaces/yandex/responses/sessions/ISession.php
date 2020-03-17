<?php
namespace extas\interfaces\yandex\responses\sessions;

use extas\interfaces\IItem;

/**
 * Interface ISession
 * 
 * @package extas\interfaces\yandex\responses\sessions
 * @author jeyroik@gmail.com
 */
interface ISession extends IItem
{
    public const SUBJECT = 'alice.response.session';

    public const FIELD__SESSION_ID = 'session_id';
    public const FIELD__MESSAGE_ID = 'message_id';
    public const FIELD__USER_ID = 'user_id';

    /**
     * @return string
     */
    public function getSessionId(): string;

    /**
     * @return int
     */
    public function getMessageId(): int;

    /**
     * @return string
     */
    public function getUserId(): string;

    /**
     * @param string $sessionId
     * 
     * @return $this
     */
    public function setSessionId(string $sessionId);

    /**
     * @param int $messageId
     * 
     * @return $this
     */
    public function setMessageId(int $messageId);

    /**
     * @param string $userId
     * 
     * @return $this
     */
    public function setUserId(string $userId);
}
