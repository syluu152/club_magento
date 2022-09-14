<?php

namespace Customer\Store\Setup;

use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('customer_store')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('customer_store')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'ID'
                )
                ->addColumn(
                    'product_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true,
                    ],
                    'Product ID'
                )
                ->addColumn(
                    'product_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Product Name'
                )
                ->addColumn(
                    'product_image',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Product Image'
                )
                ->addColumn(
                    'count',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    1,
                    [],
                    'Count'
                )
                ->addColumn(
                    'customer_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true,
                    ],
                    'Customer ID'
                )
                ->addColumn(
                    'customer_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Customer Name'
                )
                ->addColumn(
                    'customer_user_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Customer User Name'
                )
                ->addColumn(
                    'store_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true,
                    ],
                    'Store ID'
                )
                ->addColumn(
                    'store_name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Store Name'
                )
                ->setComment('Customer Store Table');
            $installer->getConnection()->createTable($table);

        }
        $installer->endSetup();
    }
}
