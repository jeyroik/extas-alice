<?php
namespace extas\interfaces\yandex\calls\requests;

use extas\interfaces\IItem;
use extas\interfaces\yandex\calls\requests\nlu\INLUEntity;

/**
 * Interface IRequestNLU
 *
 * @package extas\interfaces\yandex\calls\requests
 * @author jeyroik@gmail.com
 */
interface IRequestNLU extends IItem
{
    public const SUBJECT = 'alice.call.request.nlu';

    public const FIELD__TOKENS = 'tokens';
    public const FIELD__ENTITIES = 'entities';

    public const INDEX__LAST = 'last';

    /**
     * @param int $startIndex
     * @param string|int $endIndex
     *
     * @return string[]
     */
    public function getTokens(int $startIndex = 0, $endIndex = self::INDEX__LAST): array;

    /**
     * @param int $index
     *
     * @return string
     */
    public function getToken(int $index): string;

    /**
     * @param string $type entity type
     *
     * @return INLUEntity[]
     */
    public function getEntities($type = '');

    /**
     * @param string[] $tokens
     *
     * @return $this
     */
    public function setTokens(array $tokens);

    /**
     * @param string $token
     *
     * @return $this
     */
    public function addToken(string $token);

    /**
     * @param string $token
     *
     * @return bool
     */
    public function hasToken(string $token): bool;

    /**
     * @param INLUEntity[] $entities
     *
     * @return $this
     */
    public function setEntities(array $entities);

    /**
     * @param INLUEntity $entity
     *
     * @return $this
     */
    public function addEntity(INLUEntity $entity);
}
