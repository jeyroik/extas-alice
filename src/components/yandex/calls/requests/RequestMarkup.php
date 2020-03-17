<?php
namespace extas\components\yandex\calls\requests;

use extas\components\Item;
use extas\interfaces\yandex\calls\requests\IRequestMarkup;

/**
 * Class RequestMarkup
 *
 * @package extas\components\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
class RequestMarkup extends Item implements IRequestMarkup
{
    /**
     * @return bool
     */
    public function isDangerousContext(): bool
    {
        return $this->config[static::FIELD__IS_DANGEROUS_CONTEXT] ?? false;
    }

    /**
     * @param bool $isDangerousContext
     *
     * @return $this
     */
    public function setIsDangerousContext(bool $isDangerousContext)
    {
        $this->config[static::FIELD__IS_DANGEROUS_CONTEXT] = $isDangerousContext;

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
