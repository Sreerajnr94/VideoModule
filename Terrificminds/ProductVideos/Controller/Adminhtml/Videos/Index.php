<?php
namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function execute()
    {	
		$this->resultPage = $this->resultPageFactory->create();  
		// $this->resultPage->setActiveMenu('Terrificminds_Videos::productvideos');
		$this->resultPage ->getConfig()->getTitle()->set((__('Videos')));
		return $this->resultPage;
    }
}
