Magento Discount Sticker Extension
==================================

Adds a ready-to-use block to show discount rate of products in Magento.

Usage
-----

Simply install the exentions with `modman` or `composer`. Then you can add the discount sticker block by adding these lines in your `.phtml` files:

```
<?php
  echo $this
	->getLayout()
    ->createBlock(Webgriffe_DiscountSticker_Block_DiscountSticker::BLOCK_ALIAS)
    ->setProduct($_product)
    ->toHtml();
?>
```

Where `$_product` is a `Mage_Catalog_Model_Product` instance of the product on which you want to display the discount.

If you want you can override default discount sticker template by overriding `catalog/product/list/discount_sticker.phtml` in your theme.

Contributing
------------

* Fork this repo
* `git submodule init && git submodule update` to get continuous integration tool
* `cp ci/ci.sh.sample ci.sh` and enter your settings
* Run `sh ci.sh` to get full working Magento environment
* Do your change by adding related automated test on a dedicated branch
* Submit a pull request

Credits
-------

Developed by [Webgriffe®](http://www.webgriffe.com)