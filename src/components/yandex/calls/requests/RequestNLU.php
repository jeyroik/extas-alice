<?php
namespace extas\components\yandex\calls\requests;

use extas\components\Item;
use extas\components\yandex\calls\requests\nlu\NLUEntity;
use extas\interfaces\yandex\calls\requests\IRequestNLU;
use extas\interfaces\yandex\calls\requests\nlu\INLUEntity;

/**
 * Class RequestNLU
 *
 * @package extas\components\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
class RequestNLU extends Item implements IRequestNLU
{
    /**
     * @param int $startIndex
     * @param int|string $endIndex
     *
     * @return array
     */
    public function getTokens(int $startIndex = 0, $endIndex = self::INDEX__LAST): array
    {
        $tokens = $this->config[static::FIELD__TOKENS] ?? [];
        $endIndex = ($endIndex == static::INDEX__LAST) ? count($tokens) : $endIndex;

        return array_slice($tokens, $startIndex, $endIndex - $startIndex);
    }

    /**
     * @param int $index
     *
     * @return string
     */
    public function getToken(int $index): string
    {
        $tokens = $this->getTokens();

        return $tokens[$index] ?? '';
    }

    /**
     * @param string $token
     *
     * @return bool
     */
    public function hasToken($token): bool
    {
        return in_array($token, $this->getTokens());
    }

    /**
     * @param string $type
     *
     * @return INLUEntity[]
     */
    public function getEntities($type = '')
    {
        $entitiesData = $this->config[static::FIELD__ENTITIES] ?? [];
        $entities = [];

        foreach ($entitiesData as $entityData) {
            $entity = new NLUEntity($entityData);
            if (!$type || ($entity->getType() == $type)) {
                $entities[] = $entity;
            }
        }

        return $entities;
    }

    /**
     * @param array $tokens
     *
     * @return $this
     */
    public function setTokens(array $tokens)
    {
        $this->config[static::FIELD__TOKENS] = $tokens;

        return $this;
    }

    /**
     * @param string $token
     *
     * @return $this
     */
    public function addToken(string $token)
    {
        $tokens = $this->config[static::FIELD__TOKENS] ?? [];
        $tokens[] = $token;
        $this->config[static::FIELD__TOKENS] = $tokens;

        return $this;
    }

    /**
     * @param array $entities
     *
     * @return $this
     */
    public function setEntities(array $entities)
    {
        $entitiesData = [];

        foreach ($entities as $entity) {
            $entitiesData[] = $entity instanceof INLUEntity ? $entity->__toArray() : $entity;
        }

        $this->config[static::FIELD__ENTITIES] = $entitiesData;

        return $this;
    }

    /**
     * @param INLUEntity $entity
     *
     * @return $this
     */
    public function addEntity(INLUEntity $entity)
    {
        $entities = $this->config[static::FIELD__ENTITIES] ?? [];
        $entities[] = $entity->__toArray();
        $this->config[static::FIELD__ENTITIES] = $entities;

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
