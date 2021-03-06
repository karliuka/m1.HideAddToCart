<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_HideAddToCart_Helper_Data
    extends Mage_Core_Helper_Abstract
{
    /**
     * Check whether hide add to cart should be enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)(Mage::helper('Core')->isModuleEnabled('Faonni_HideAddToCart') &&
            Mage::getStoreConfig('catalog/access_option/hide_add_to_cart')) ||
                (Mage::helper('Core')->isModuleEnabled('Faonni_HidePrice') &&
                    Mage::getStoreConfig('catalog/access_option/hide_price'));
    }

    /**
     * Check whether the customer allows to add to cart
     *
     * @return bool
     */
    public function isAvailable()
    {
        return !in_array(
            Mage::getSingleton('customer/session')->getCustomerGroupId(),
            explode(',', Mage::getStoreConfig('catalog/access_option/apply_from_group'))
        );
    }
}