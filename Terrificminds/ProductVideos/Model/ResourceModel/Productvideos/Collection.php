<?php
namespace Terrificminds\ProductVideos\Model\ResourceModel\Productvideos;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init('Terrificminds\ProductVideos\Model\Productvideos', 'Terrificminds\ProductVideos\Model\ResourceModel\Productvideos');
    }
}
