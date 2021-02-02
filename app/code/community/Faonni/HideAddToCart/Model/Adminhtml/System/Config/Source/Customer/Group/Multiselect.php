<?php
/**
 * Copyright © Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * See COPYING.txt for license details.
 */
class Faonni_HideAddToCart_Model_Adminhtml_System_Config_Source_Customer_Group_Multiselect
{
    /**
     * Customer groups options array
     *
     * @var array
     */
    protected $options;

    /**
     * Retrieve customer groups as array
     *
     * @return array
     */
    public function toOptionArray()
    {
        if (null === $this->options) {
            $this->options = Mage::getResourceModel('customer/group_collection')
                ->loadData()->toOptionArray();
        }
        return $this->options;
    }
}
