# Magento 2 New Products and Widget #

![phpcs](https://github.com/DominicWatts/NewProduct/workflows/phpcs/badge.svg)

![PHPCompatibility](https://github.com/DominicWatts/NewProduct/workflows/PHPCompatibility/badge.svg)

![PHPStan](https://github.com/DominicWatts/NewProduct/workflows/PHPStan/badge.svg)

Frontend controller to display products within Set Product as New From dates with layered navigation.

For products to display they must be on within Set Product as New From and To date range.  Plus any additional rules that would apply to a product collection on your store such as visibility or stock.

![Screenshot](https://i.snipboard.io/yPguG2.jpg)

The widget needs to be configured from the admin

# Install instructions #

`composer require dominicwatts/newproduct`

`php bin/magento setup:upgrade`

`php bin/magento setup:di:compile`

# Usage instructions #

Apply Set Product as New From dates to products

Go to `/new-products` or use header link


