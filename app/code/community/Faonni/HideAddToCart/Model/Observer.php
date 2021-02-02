<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_HideAddToCart_Model_Observer
{
    /**
     * Check is product available
     *
     * @param Varien_Event_Observer $observer
     * @return void
     */
    public function isSalable(Varien_Event_Observer $observer)
    {
        if (!Mage::helper('faonni_hideaddtocart')->isEnabled()) {
            return;
        }

        if (!Mage::helper('faonni_hideaddtocart')->isAvailable()) {
            /** @var Varien_Object $salable */
            $salable = $observer->getEvent()->getSalable();
            $salable->setIsSalable(false);
        }
    }

    /**
     * Check add product to quote
     *
     * @param Varien_Event_Observer $observer
     * @return void
     */
    public function addProduct(Varien_Event_Observer $observer)
    {
        if (!Mage::helper('faonni_hideaddtocart')->isEnabled()) {
            return;
        }

        if (!Mage::helper('faonni_hideaddtocart')->isAvailable()) {
            Mage::throwException(
                Mage::helper('faonni_hideaddtocart')->__('You should login to add products to cart.')
            );
        }
    }
}
