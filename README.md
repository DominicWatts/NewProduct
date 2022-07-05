# Magento 2 New Products and Widget #

[![M2 Coding Standard](https://github.com/DominicWatts/NewProduct/actions/workflows/phpcs.yml/badge.svg)](https://github.com/DominicWatts/NewProduct/actions/workflows/phpcs.yml)

[![M2 PHPStan](https://github.com/DominicWatts/NewProduct/actions/workflows/phpstan.yml/badge.svg)](https://github.com/DominicWatts/NewProduct/actions/workflows/phpstan.yml)

[![php-cs-fixer](https://github.com/DominicWatts/NewProduct/actions/workflows/phpcsfixer.yml/badge.svg)](https://github.com/DominicWatts/NewProduct/actions/workflows/phpcsfixer.yml)

[![PHP Compatibility](https://github.com/DominicWatts/NewProduct/actions/workflows/phpcompatibility.yml/badge.svg)](https://github.com/DominicWatts/NewProduct/actions/workflows/phpcompatibility.yml)

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


