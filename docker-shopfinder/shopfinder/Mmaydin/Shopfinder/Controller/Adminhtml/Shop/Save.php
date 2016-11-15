<?php

namespace Mmaydin\Shopfinder\Controller\Adminhtml\Shop;

class Save extends \Magento\Backend\App\Action
{
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
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setShopId($data['id']);
                $rowData->setModifedAt(date('Y-m-d H:i:s'));
            } else {
                $rowData->setCreatedAt(date('Y-m-d H:i:s'));
            }

            $rowData->save();

            $this->messageManager->addSuccess(__('Shop has been successfully saved.'));
        } catch (Exception $e) {
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