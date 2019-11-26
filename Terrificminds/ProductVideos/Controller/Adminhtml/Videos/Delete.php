<?php
namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;

class Delete extends \Magento\Backend\App\Action
{
    public function execute()
    {
		$id = $this->getRequest()->getParam('id');
		try {
				$banner = $this->_objectManager->get('Terrificminds\ProductVideos\Model\Productvideos')->load($id);
				$banner->delete();
                $this->messageManager->addSuccess(
                    __('Delete successfully !')
                );
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
	    $this->_redirect('*/*/');
    }
}
