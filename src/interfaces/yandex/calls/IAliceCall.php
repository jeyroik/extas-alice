<?php
namespace extas\interfaces\yandex\calls;

use extas\interfaces\IItem;
use extas\interfaces\yandex\calls\metas\IMeta;
use extas\interfaces\yandex\calls\requests\IRequest;
use extas\interfaces\yandex\calls\sessions\ISession;
use extas\interfaces\yandex\IHasVersion;

/**
 * Interface IAliceRequest
 *
 * @package extas\interfaces\yandex\calls
 * @author jeyroik@gmail.com
 */
interface IAliceCall extends IItem, IHasVersion
{
    public const SUBJECT = 'yandex.alice.call';

    public const FIELD__META = 'meta';
    public const FIELD__REQUEST = 'request';
    public const FIELD__SESSION = 'session';

    /**
     * @return IMeta
     */
    public function getMeta(): IMeta;

    /**
     * @return IRequest
     */
    public function getRequest(): IRequest;

    /**
     * @return ISession
     */
    public function getSession(): ISession;

    /**
     * @param IMeta|array $meta
     *
     * @return $this
     */
    public function setMeta($meta);

    /**
     * @param IRequest|array $request
     *
     * @return $this
     */
    public function setRequest($request);

    /**
     * @param ISession|array $session
     *
     * @return $this
     */
    public function setSession($session);
}
