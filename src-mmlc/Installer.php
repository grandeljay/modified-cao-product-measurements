<?php

/**
 * CAO Product Measurements
 *
 * @author  Jay Trees <modified-cao-product-measurements@grandels.email>
 * @link    https://github.com/grandeljay/modified-cao-product-measurements
 * @package GrandeljayCaoProductMeasurements
 */

namespace Grandeljay\CaoProductMeasurements;

class Installer
{
    public static function install(): void
    {
        $table_create_sql = \sprintf(
            'CREATE TABLE `%s` (
                `products_id`     INT      UNSIGNED NOT NULL,
                `products_length` SMALLINT UNSIGNED NOT NULL,
                `products_width`  SMALLINT UNSIGNED NOT NULL,
                `products_height` SMALLINT UNSIGNED NOT NULL,
                PRIMARY KEY (`products_id`)
            )
            COMMENT="Created during the installation of module: %s. Table will be removed when module is deinstalled in modified."',
            Constants::TABLE_MEASUREMENTS,
            \grandeljay_cao_product_measurements_product::class
        );

        \xtc_db_query($table_create_sql);
    }

    public static function uninstall(): void
    {
        $table_drop_sql = \sprintf(
            'DROP TABLE `%s`',
            Constants::TABLE_MEASUREMENTS
        );

        \xtc_db_query($table_drop_sql);
    }
}
