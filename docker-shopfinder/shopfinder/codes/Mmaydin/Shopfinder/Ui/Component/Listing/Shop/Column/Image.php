<?php
namespace Mmaydin\Shopfinder\Ui\Component\Listing\Shop\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Image extends \Magento\Ui\Component\Listing\Columns\Column
{
    const NAME = 'Image';

    const ALT_FIELD = 'image';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $storeManager;
        $this->_urlBuilder = $urlBuilder;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['image']) && !empty($item['image'])) {
                    $mediaRelativePath = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
                    $imagePath = $mediaRelativePath . $item['image'];
                    $item[$fieldName . '_src'] = $imagePath;
                    $item[$fieldName . '_alt'] = $this->getAlt($item);
                    $item[$fieldName . '_link'] = $this->_urlBuilder->getUrl(
                        'shopfinder/shop/addrow',
                        ['id' => $item['shop_id']]
                    );
                    $item[$fieldName . '_orig_src'] = $imagePath;
                }

            }
        }

        return $dataSource;
    }

    /**
     * @param array $row
     *
     * @return null|string
     */
    protected function getAlt($row)
    {
        $altField = self::ALT_FIELD;
        return isset($row[$altField]) ? $row[$altField] : null;
    }
}