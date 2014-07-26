<?php
/**
 * Created by PhpStorm.
 * User: manuele
 * Date: 23/07/14
 * Time: 17:27
 */

class Webgriffe_DiscountSticker_Test_Block_DiscountSticker extends EcomDev_PHPUnit_Test_Case
{
    protected function setUp()
    {
        $_SESSION = array();
        parent::setUp();
    }

    public function testGetDiscountRate()
    {
        $product = new Mage_Catalog_Model_Product();
        $product->setPrice(100);
        $product->setFinalPrice(80);

        $discountSticker = new Webgriffe_DiscountSticker_Block_DiscountSticker();

        $this->assertEquals(20, $discountSticker->setProduct($product)->getDiscountRate());
    }
} 
