<?php
namespace Terrificminds\ProductVideos\Block\Adminhtml\Productvideos;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected function _construct()
    {
		$this->_objectId = 'id';
        $this->_blockGroup = 'Terrificminds_ProductVideos';
        $this->_controller = 'adminhtml_productvideos';

        parent::_construct();
        
        $this->buttonList->update('save', 'label', __('Save '));
        $this->buttonList->add(
            'saveandcontinue',
            array(
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => array(
                    'mage-init' => array('button' => array('event' => 'saveAndContinueEdit', 'target' => '#edit_form'))
                )
            ),
            -100
        );
    }

    // public function getHeaderText()
    // {
    //     if ($this->_coreRegistry->registry('checkmodule_checkmodel')->getId()) {
    //         return __("Edit Item '%1'", $this->escapeHtml($this->_coreRegistry->registry('checkmodule_checkmodel')->getTitle()));
    //     } else {
    //         return __('New Item');
    //     }
    // }
}
