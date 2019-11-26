<?php
namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;
class Edit extends \Magento\Backend\App\Action
{
	public function execute()
    {
		$id = $this->getRequest()->getParam('id');		
        $model = $this->_objectManager->create('Terrificminds\ProductVideos\Model\Productvideos');		
		$registryObject = $this->_objectManager->get('Magento\Framework\Registry');       
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This row no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
		$registryObject->register('productvideos_productvideos', $model);
		$this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
