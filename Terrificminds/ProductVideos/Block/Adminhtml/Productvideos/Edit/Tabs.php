<?php
namespace Terrificminds\ProductVideos\Block\Adminhtml\Productvideos\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
		
        parent::_construct();
        $this->setId('checkmodule_productvideos_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Productvideo Informations'));
    }
} 