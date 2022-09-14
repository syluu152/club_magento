<?php
namespace Customer\Store\Model\ResourceModel\Customer;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\InventoryReservationsApi\Model\ReservationInterface;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Customer\Store\Model\Customer',
            'Customer\Store\Model\ResourceModel\Customer'
        );
    }
}
