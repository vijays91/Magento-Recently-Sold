<?php
class Learn_Recentsold_Block_Resendlysold extends Mage_Core_Block_Template
{
    /*
        Get Recently Sold Products
    */
    public function getRecentlySoldItems($limt = 5)
    {
        $storeID = Mage::app()->getStore()->getId();
        $itemsCollection = Mage::getResourceModel('sales/order_item_collection')
        ->join('order', 'order_id=entity_id')
        ->addFieldToFilter('main_table.store_id', array('eq'=>$storeID))
        ->setOrder('main_table.created_at','desc')
        ->setPageSize($limt);
        $itemsCollection->getSelect()->group('main_table.product_id');
        $products = array();
        if(sizeof($itemsCollection)>0)
        {
            foreach ($itemsCollection as $item) {
                $product = Mage::getModel('catalog/product')->setStoreId(Mage::app()->getStore()->getId())->load($item->getProductId());
                $products[] = $product;
            }
        }
        return $products;
    }
    
    public function getProductUrl($product)
    {
        if ($product instanceof Mage_Catalog_Model_Product) {
            return $product->getProductUrl();
        }
        elseif (is_numeric($product)) {
            return Mage::getModel('catalog/product')->load($product)->getProductUrl();
        }
        return false;
    }
}