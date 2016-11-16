<?php

namespace Mmaydin\Shopfinder\Model;

use Mmaydin\Shopfinder\Api\Data\ShopInterface;

class Shop extends \Magento\Framework\Model\AbstractModel implements ShopInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'mma_shop';

    /**
     * @var string
     */
    protected $_cacheTag = 'mma_shop';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'mma_shop';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Mmaydin\Shopfinder\Model\ResourceModel\Shop');
    }
    /**
     * Get ShopId.
     *
     * @return int
     */
    public function getShopId()
    {
        return $this->getData(self::SHOP_ID);
    }

    /**
     * Set ShopId.
     */
    public function setShopId($shopId)
    {
        return $this->setData(self::SHOP_ID, $shopId);
    }

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Identifier.
     *
     * @return varchar
     */
    public function getIdentifier()
    {
        return $this->getData(self::IDENTIFIER);
    }

    /**
     * Set Name.
     */
    public function setIdentifier($identifier)
    {
        return $this->setData(self::IDENTIFIER, $identifier);
    }

    /**
     * Get Image.
     *
     * @return varchar
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Set Image.
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get ModifiedAt.
     *
     * @return varchar
     */
    public function getModifiedAt()
    {
        return $this->getData(self::MODIFIED_AT);
    }

    /**
     * Set ModifiedAt.
     */
    public function setModifiedAt($modifiedAt)
    {
        return $this->setData(self::MODIFIED_AT, $modifiedAt);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}