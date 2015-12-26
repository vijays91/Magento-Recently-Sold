<?php
class Learn_Recentsold_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_RE_SOLD_ENABLE     = 'recentsold_tab/recentsold_setting/recentsold_active';
    const XML_PATH_RE_SOLD_POSITION   = 'recentsold_tab/recentsold_setting/recentsold_position';
    const XML_PATH_RE_SOLD_TITLE   	  = 'recentsold_tab/recentsold_setting/recentsold_title';
    const XML_PATH_RE_SOLD_DISPLAY_COUNT = 'recentsold_tab/recentsold_setting/recentsold_display_count';
    
	
	public function conf($code, $store = null) {
        return Mage::getStoreConfig($code, $store);
    }
	
	public function resendsold_enable($store) {
		return $this->conf(self::XML_PATH_RE_SOLD_ENABLE, $store);
	}
    
	public function resendsold_position($store) {
		return $this->conf(self::XML_PATH_RE_SOLD_POSITION, $store);
	}
    
    public function resendsold_title() {
		return $this->conf(self::XML_PATH_RE_SOLD_TITLE, $store);
	}
        
    public function resendsold_display_count() {
		return $this->conf(self::XML_PATH_RE_SOLD_DISPLAY_COUNT, $store);
	}
    
	public function postion_left() {
		if(self::resendsold_enable() == 1 && self::resendsold_position() == 1) {
			return "resendsold/resendsold.phtml";
		}
		return false;
	}
    
	public function postion_right() {
		if(self::resendsold_enable() == 1 && self::resendsold_position() == 2) {
			return "resendsold/resendsold.phtml";
		}
		return false;
	}
	
}