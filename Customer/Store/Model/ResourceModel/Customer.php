<?php
namespace Customer\Store\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Customer extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_store', 'id');
    }
}
