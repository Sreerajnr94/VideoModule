<?php

namespace Terrificminds\ProductVideos\Model\ResourceModel;

class Productvideos extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('product_related_videos', 'id');
    }

  
}
