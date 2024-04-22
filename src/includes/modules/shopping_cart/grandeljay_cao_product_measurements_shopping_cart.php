<?php

/**
 * CAO Product Measurements
 *
 * @author  Jay Trees <modified-cao-product-measurements@grandels.email>
 * @link    https://github.com/grandeljay/modified-cao-product-measurements
 * @package GrandeljayCaoProductMeasurements
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 */

use Grandeljay\CaoProductMeasurements\{Constants, Installer};
use RobinTheHood\ModifiedStdModule\Classes\StdModule;

class grandeljay_cao_product_measurements_shopping_cart extends StdModule
{
    public const VERSION = '0.2.1';

    public function __construct()
    {
        parent::__construct(Constants::MODULE_SHOPPING_CART_NAME);

        $this->checkForUpdate(true);
    }

    public function install(): void
    {
        parent::install();

        Installer::install();
    }

    protected function updateSteps(): int
    {
        if (version_compare($this->getVersion(), self::VERSION, '<')) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }

    public function remove(): void
    {
        parent::remove();

        Installer::uninstall();
    }

    /**
     * Extends the modified-shop `shopping_cart` method `get_products`.
     *
     * phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
     *
     * @param array  $product_info The product information, slightly manipulated
     *                             since retrieving it from the database.
     * @param array  $product_data The product's data from the database.
     * @param array  $contents     The cart's products, stored as ids.
     *
     * @return array
     */
    public function get_products(array $product_info, array $product_data, array $contents): array
    {
        if (!$this->getEnabled()) {
            return $product_info;
        }

        $product_measurements_query = xtc_db_query(
            sprintf(
                'SELECT `products_length` AS "length",
                        `products_width`  AS "width",
                        `products_height` AS "height"
                   FROM `%s`
                  WHERE `products_id` = %d',
                Constants::TABLE_MEASUREMENTS,
                $product_data['products_id']
            )
        );
        $product_measurements_data  = xtc_db_fetch_array($product_measurements_query);

        if (null === $product_measurements_data) {
            return $product_info;
        }

        $product_info = array_merge($product_info, $product_measurements_data);

        return $product_info;
    }
    /**
     * phpcs:enable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
     */
}
