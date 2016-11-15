<?php

namespace Mmaydin\Shopfinder\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory /* For Attribute create  */;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        /* assign object to class global variable for use in other class methods */
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->getConnection()->insert(
            $setup->getTable('store'),
            [
                'store_id' => 2,
                'name' => 'UEA - English',
                'code' => 'en_ae',
                'website_id' => 1,
                'group_id' => 1,
                'sort_order' => 0,
                'is_active' => 1
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('store'),
            [
                'store_id' => 3,
                'name' => 'TR - English',
                'code' => 'en_tr',
                'website_id' => 1,
                'group_id' => 1,
                'sort_order' => 0,
                'is_active' => 1
            ]
        );

        $createdAt = date('Y-m-d H:i:s');

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 2,
                'name' => 'Muscat City Center',
                'identifier' => 'store-07751',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 2,
                'name' => 'Mercato Mall',
                'identifier' => 'store-07290',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 2,
                'name' => 'Dubai Mall',
                'identifier' => 'store-07266',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 2,
                'name' => 'City Centre Mirdif',
                'identifier' => 'store-07560',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 3,
                'name' => 'Zorlu Center',
                'identifier' => 'store-34001',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 3,
                'name' => 'Kanyon Avm',
                'identifier' => 'store-34002',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 3,
                'name' => 'Istinye Park',
                'identifier' => 'store-34003',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('mma_shop'),
            [
                'store_id' => 3,
                'name' => 'Capacity Avm',
                'identifier' => 'store-34004',
                'is_active' => 1,
                'created_at' => $createdAt
            ]
        );
    }
}