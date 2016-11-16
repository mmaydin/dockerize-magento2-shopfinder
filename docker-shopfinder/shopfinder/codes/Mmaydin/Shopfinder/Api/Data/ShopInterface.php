<?php

namespace Mmaydin\Shopfinder\Api\Data;

interface ShopInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const SHOP_ID = 'shop_id';
    const NAME = 'name';
    const IDENTIFIER = 'identifier';
    const IMAGE = 'image';
    const IS_ACTIVE = 'is_active';
    const MODIFIED_AT = 'modified_at';
    const CREATED_AT = 'created_at';

    /**
     * Get ShopId.
     *
     * @return int
     */
    public function getShopId();

    /**
     * Set ShopId.
     *
     * @return $this
     */
    public function setShopId($shopId);

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName();

    /**
     * Set Name.
     *
     * @return $this
     */
    public function setName($name);

    /**
     * Get Identifier.
     *
     * @return string
     */
    public function getIdentifier();

    /**
     * Set Identifier.
     *
     * @return $this
     */
    public function setIdentifier($identifier);

    /**
     * Get Image.
     *
     * @return string|null
     */
    public function getImage();

    /**
     * Set Image.
     *
     * @return $this
     */
    public function setImage($image);

    /**
     * Get IsActive.
     *
     * @return int|null
     */
    public function getIsActive();

    /**
     * Set IsActive.
     *
     * @param int $isActive
     * @return $this
     */
    public function setIsActive($isActive);

    /**
     * Get ModifiedAt.
     *
     * @return string|null
     */
    public function getModifiedAt();

    /**
     * Set ModifiedAt.
     *
     * @return $this
     */
    public function setModifiedAt($modifiedAt);

    /**
     * Get CreatedAt.
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     *
     * @return $this
     */
    public function setCreatedAt($createdAt);
}