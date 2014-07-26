<?php
/**
 * Created by PhpStorm.
 * User: manuele
 * Date: 23/07/14
 * Time: 17:29
 */

class Webgriffe_DiscountSticker_Block_DiscountSticker extends Mage_Core_Block_Template
{
    const BLOCK_ALIAS = 'webgriffe_discountsticker/discountSticker';

    /**
     * @var Mage_Catalog_Model_Product
     */
    protected $_product;

    /**
     * @var string
     */
    protected $_template = 'catalog/product/list/discount_sticker.phtml';

    /**
     * @var int
     */
    protected $_discountRate = null;

    public function setProduct(Mage_Catalog_Model_Product $product)
    {
        $this->_product = $product;
        return $this;
    }

    public function getDiscountRate()
    {
        if (is_null($this->_discountRate)) {
            /** @var $_taxHelper Mage_Tax_Helper_Data */
            $_taxHelper = $this->helper('tax');
            $_simplePricesTax   = ($_taxHelper->displayPriceIncludingTax() || $_taxHelper->displayBothPrices());

            $_store = $this->_product->getStore();
            $_convertedPrice = $_store->roundPrice($_store->convertPrice($this->_product->getPrice()));
            $_convertedFinalPrice = $_store->roundPrice($_store->convertPrice($this->_product->getFinalPrice()));
            $_regularPrice = $_taxHelper->getPrice($this->_product, $_convertedPrice, $_simplePricesTax);
            $_finalPrice = $_taxHelper->getPrice($this->_product, $_convertedFinalPrice);

            $this->_discountRate = round((($_regularPrice - $_finalPrice) / $_regularPrice) * 100);
        }

        return $this->_discountRate;
    }

    public function canShowSticker()
    {
        if ($this->getDiscountRate() > 0) {
            return true;
        }

        return false;
    }
}
