<?php

namespace Mmaydin\Shopfinder\Api;

interface ShopRepositoryInterface
{
    /**
     * Get shops with filter.
     *
     * @return \Mmaydin\Shopfinder\Api\Data\ShopSearchResultsInterface
     */
    public function getLists();
}