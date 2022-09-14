<?php
namespace Customer\Store\Model;

use Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel{
    protected function _construct()
    {
        $this->_init('Customer\Store\Model\ResourceModel\Customer');
    }
}
