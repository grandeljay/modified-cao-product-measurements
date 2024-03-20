<?php

/**
 * CAO Product Measurements
 *
 * @author  Jay Trees <modified-cao-product-measurements@grandels.email>
 * @link    https://github.com/grandeljay/modified-cao-product-measurements
 * @package GrandeljayCaoProductMeasurements
 */

namespace Grandeljay\CaoProductMeasurements;

class Cao
{
    public static function productsUpdate(): void
    {
        if (!isset($_POST['action']) || 'products_update' !== $_POST['action']) {
            return;
        }

        if (!isset($_POST['pID'])) {
            return;
        }

        $products_id     = $_POST['pID'];
        $products_length = $_POST['products_length'] ?? 0;
        $products_width  = $_POST['products_width']  ?? 0;
        $products_height = $_POST['products_height'] ?? 0;

        \xtc_db_query(
            \sprintf(
                'REPLACE INTO `%1$s`
                       VALUES (%2$d, %3$d, %4$d, %5$d)',
                Constants::TABLE_MEASUREMENTS,
                $products_id,
                $products_length,
                $products_width,
                $products_height
            )
        );
    }
}
