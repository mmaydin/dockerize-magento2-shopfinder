<?php

namespace Mmaydin\Shopfinder\Api\Data;


interface ShopSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get Shop Complete list.
     *
     * @return \Mmaydin\Shopfinder\Api\Data\ShopInterface[]
     */
    public function getItems();

    /**
     * Set Shop Complete list.
     *
     * @param \Mmaydin\Shopfinder\Api\Data\ShopInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}