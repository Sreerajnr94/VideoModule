<?php
namespace Terrificminds\ProductVideos\Controller\Adminhtml\Videos;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Action\Context;  
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory; 

class Save extends \Magento\Framework\App\Action\Action
{
    protected $uploader;
    public function __construct(
        Context $context,
        Filesystem $filesystem,
        UploaderFactory $uploader
    ) 
    {
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;
        parent::__construct($context);
        $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
        if ($data) {            
            $model = $this->_objectManager->create('Terrificminds\ProductVideos\Model\Productvideos');		     
            if(isset($_FILES['thump_nail_image']['name']) && $_FILES['thump_nail_image']['name'] != '') {
                $yourFolderName = 'your-custom-folder/';
                try 
                {
                    $target = $this->mediaDirectory->getAbsolutePath($yourFolderName);
                    $uploader = $this->uploader->create(['fileId' => 'thump_nail_image']);
                    $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);
                    $uploader->setAllowCreateFolders(true);     
                    $uploader->setAllowRenameFiles(true);                      
                    $result = $uploader->save($target);
                    $data['thump_nail_image'] = $yourFolderName.$_FILES['thump_nail_image']['name'];
           
				} catch (Exception $e) {
                    $data['thump_nail_image'] = $_FILES['thump_nail_image']['name'];
                    
			    }
			}
			else{
				$data['thump_nail_image'] =  $data['thump_nail_image']['value'];
            } 
 
            if(isset($_FILES['video_url']['name']) && $_FILES['video_url']['name'] != '') {
                $yourFolderName = 'your-video-folder/';
                try 
                {
                    $target = $this->mediaDirectory->getAbsolutePath($yourFolderName);
                    $uploader = $this->uploader->create(['fileId' => 'video_url']);
                    $uploader->setAllowedExtensions(['mp4', '3gp', 'mlv', 'hd']);
                    $uploader->setAllowCreateFolders(true);     
                    $uploader->setAllowRenameFiles(true);                      
                    $result = $uploader->save($target);
                    $data['video_url'] = $yourFolderName.$_FILES['video_url']['name'];
           
				} catch (Exception $e) {
                    $data['video_url'] = $_FILES['video_url']['name'];
                    
			    }
			}
			else{
				$data['video_url'] =  $data['video_url']['value'];
            } 

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }
			
            $model->setData($data);		
            try {
                $model->save();
                
                $this->messageManager->addSuccess(__('The Frist Grid Has been Saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }
            $this->_redirect('*/*/edit', array('banner_id' => $this->getRequest()->getParam('banner_id')));
            return;
        }
        $this->_redirect('*/*/');
    }
}