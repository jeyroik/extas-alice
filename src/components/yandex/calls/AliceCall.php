<?php
namespace extas\components\yandex\calls;

use extas\components\Item;
use extas\components\yandex\calls\metas\Meta;
use extas\components\yandex\calls\requests\Request;
use extas\components\yandex\calls\sessions\Session;
use extas\interfaces\yandex\calls\IAliceCall;
use extas\interfaces\yandex\calls\metas\IMeta;
use extas\interfaces\yandex\calls\requests\IRequest;
use extas\interfaces\yandex\calls\sessions\ISession;

/**
 * Class AliceCall
 *
 * @package extas\components\yandex\calls
 * @author jeyroik@gmail.com
 */
class AliceCall extends Item implements IAliceCall
{
    /**
     * @return IMeta
     */
    public function getMeta(): IMeta
    {
        $meta = $this->config[static::FIELD__META] ?? [];

        return new Meta($meta);
    }

    /**
     * @return IRequest
     */
    public function getRequest(): IRequest
    {
        $request = $this->config[static::FIELD__REQUEST] ?? [];

        return new Request($request);
    }

    /**
     * @return ISession
     */
    public function getSession(): ISession
    {
        $session = $this->config[static::FIELD__SESSION] ?? [];

        return new Session($session);
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->config[static::FIELD__VERSION] ?? '';
    }

    /**
     * @param array|IMeta $meta
     *
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->config[static::FIELD__META] = $meta instanceof IMeta
            ? $meta->__toArray()
            : $meta;

        return $this;
    }

    /**
     * @param array|IRequest $request
     *
     * @return $this
     */
    public function setRequest($request)
    {
        $this->config[static::FIELD__REQUEST] = $request instanceof IRequest
            ? $request->__toArray()
            : $request;

        return $this;
    }

    /**
     * @param array|ISession $session
     *
     * @return $this
     */
    public function setSession($session)
    {
        $this->config[static::FIELD__SESSION] = $session instanceof ISession
            ? $session->__toArray()
            : $session;

        return $this;
    }

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion(string $version)
    {
        $this->config[static::FIELD__VERSION] = $version;

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
