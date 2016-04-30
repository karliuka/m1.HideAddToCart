<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_HideAddToCart
 * @copyright   Copyright (c) 2015 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Faonni_HideAddToCart_Model_Observer
{
    /**
     * Check is product available
     *
     * @param   Varien_Event_Observer $observer
     * @return  Faonni_HideAddToCart_Model_Observer
     */	
    public function isSalable(Varien_Event_Observer $observer)
    {
		if (!Mage::helper('faonni_hideaddtocart')->isEnabled()) {
			return $this;
		}

		if (!Mage::helper('faonni_hideaddtocart')->isAvailable()) { 
			/** @var $salable Varien_Object */
			$salable = $observer->getEvent()->getSalable();		
			$salable->setIsSalable(false);
		}		
		return $this;
    }
	
    /**
     * Check add product to quote
     *
     * @param   Varien_Event_Observer $observer
     * @return  Faonni_HideAddToCart_Model_Observer
     */		
    public function addProduct(Varien_Event_Observer $observer)
    {
		if (!Mage::helper('faonni_hideaddtocart')->isEnabled()) {
			return $this;
		}
		
		if (!Mage::helper('faonni_hideaddtocart')->isAvailable()) { 
			Mage::throwException(Mage::helper('faonni_hideaddtocart')->__('You should login to add products to cart.'));
		}		
		return $this;
    }	
}