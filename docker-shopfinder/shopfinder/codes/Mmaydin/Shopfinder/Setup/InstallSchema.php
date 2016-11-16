<?php

namespace Mmaydin\Shopfinder\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*
         * Create table 'mma_shop'
         */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('mma_shop')
        )->addColumn(
            'shop_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Shop Record Id'
        )->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true, 'nullable' => true, 'default' => null],
            'Store ID'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Name'
        )->addColumn(
            'identifier',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Identifier'
        )->addColumn(
            'country',
            Table::TYPE_TEXT,
            32,
            ['nullable' => false],
            'Country'
        )->addColumn(
            'image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            ['nullable' => true,'default' => null],
            'Shop image media path'
        )->addColumn(
            'is_active',
            Table::TYPE_SMALLINT,
            null,
            [],
            'Active Status'
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            [],
            'Created'
        )->addColumn(
            'modified_at',
            Table::TYPE_TIMESTAMP,
            null,
            [],
            'Modified'
        )->setComment(
            'Shop Table'
        )->addIndex(
            $installer->getIdxName('mma_shop', ['store_id']),
            ['store_id']
        )->addIndex(
            $installer->getIdxName('mma_shop', ['country']),
            ['country']
        )->addIndex(
            $installer->getIdxName('mma_shop', ['is_active']),
            ['is_active']
        )->addIndex(
            $installer->getIdxName(
                'identifier',
                ['identifier'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
            ),
            ['identifier'],
            ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}