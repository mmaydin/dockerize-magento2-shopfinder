<?php

namespace Mmaydin\Shopfinder\Controller\Adminhtml\Shop;

class Save extends \Magento\Backend\App\Action
{

    /**
     * @var \Magento\Framework\Image\AdapterFactory
     */
    protected $adapterFactory;

    /**
     * @var \Magento\MediaStorage\Model\File\UploaderFactory
     */
    protected $uploader;

    /**
     * @var \Magento\Framework\Filesystem
     */
    protected $filesystem;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploader,
        \Magento\Framework\Filesystem $filesystem
    )
    {
        $this->adapterFactory = $adapterFactory;
        $this->uploader = $uploader;
        $this->filesystem = $filesystem;

        parent::__construct($context);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('shopfinder/shop/addrow');
            return;
        }
        try {
            $rowData = $this->_objectManager->create('Mmaydin\Shopfinder\Model\Shop');
            if (isset($data['image']['value'])) {
                $oldImage = $data['image']['value'];
                unset($data['image']);
                $data['image'] = $oldImage;
            } else {
                $data['image'] = 'mmaydin/shopfinder/images/e/m/empty.jpg';
            }

            $rowData->setData($data);
            if (isset($data['shop_id'])) {
                $rowData->setModifiedAt(date('Y-m-d H:i:s'));
            } else {
                $rowData->setCreatedAt(date('Y-m-d H:i:s'));
            }

            if (
                isset($_FILES['image']) &&
                isset($_FILES['image']['name']) &&
                strlen($_FILES['image']['name'])
            ) {
                try {
                    $baseMediaPath = 'mmaydin/shopfinder/images';
                    $uploader = $this->uploader->create(
                        ['fileId' => 'image']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save(
                        $mediaDirectory->getAbsolutePath($baseMediaPath)
                    );
                    $rowData->setImage($baseMediaPath . $result['file']);
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            }

            $rowData->save();

            $this->messageManager->addSuccess(__('Shop has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('shopfinder/shop/index');
    }

    /**
     * Check Category Map permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mmaydin_Auction::add_auction');
    }
}
