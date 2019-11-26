<?php
namespace Terrificminds\ProductVideos\Block\Adminhtml\Productvideos\Edit\Tab;
class Videos extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = array()
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
		
        $model = $this->_coreRegistry->registry('productvideos_productvideos');
		$isElementDisabled = false;
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', array('legend' => __('Videos')));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array('name' => 'id'));
        }
        $fieldset->addField(
            'product_id',
            'text',
            array(
                'name' => 'product_id',
                'label' => __('Sku'),
                'title' => __('product_id'),                
            )
        );
        $fieldset->addField(
            'title',
            'text',
            array(
                'name' => 'title',
                'label' => __('Title'),
                'title' => __('title'),
            )
        );
        $fieldset->addField(
            'thump_nail_image',
            'image',
            array(
                'name' => 'thump_nail_image',
                'label' => __('Image'),
                'title' => __('thump_nail_image'),
                'note' => '(*.jpg, *.png, *.gif)',                
            )
        );
        $fieldset->addField(
            'video_url',
            'file',
            array(
                'name' => 'video_url',
                'label' => __('Video url'),
                'title' => __('video_url'), 
            )
        );
        // $fieldset->addField(
        //     'video_url',
        //     'button',
        //     array(
        //         'name' => 'video_url',
        //         'label' => __('Video url'),
        //         'title' => __('video_url'), 
        //         'onclick' => "setLocation('{$this->getUrl('*/*/getVideo')}')",
                // )
        // );        
        $fieldset->addField(
            'video_description',
            'text',
            array(
                'name' => 'video_description',
                'label' => __('Video description'),
                'title' => __('video_description'),               
            )
        );
		if (!$model->getId()) {
            $model->setData('status', $isElementDisabled ? '2' : '1');
        }
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();   
    }
    public function getTabLabel()
    {
        return __('Videos');
    }
    public function getTabTitle()
    {
        return __('Videos');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}
