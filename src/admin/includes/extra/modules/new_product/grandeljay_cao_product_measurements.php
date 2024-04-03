<?php

/**
 * CAO Product Measurements
 *
 * @author  Jay Trees <modified-cao-product-measurements@grandels.email>
 * @link    https://github.com/grandeljay/modified-cao-product-measurements
 * @package GrandeljayCaoProductMeasurements
 */

namespace Grandeljay\CaoProductMeasurements;

if (\rth_is_module_disabled(Constants::MODULE_SHOPPING_CART_NAME)) {
    return;
}

if (!isset($_GET['pID'])) {
    return;
}

$language_filepath = \sprintf(
    \DIR_FS_CATALOG . 'lang/%s/modules/shopping_cart/%s.php',
    $_SESSION['language'],
    \grandeljay_cao_product_measurements_shopping_cart::class
);

require $language_filepath;

$products_id = $_GET['pID'];

$measurements_query = \xtc_db_query(
    \sprintf(
        'SELECT *
           FROM `%s`
          WHERE `products_id` = %d',
        Constants::TABLE_MEASUREMENTS,
        $products_id
    )
);
$measurements_data  = \xtc_db_fetch_array($measurements_query);

$products_length = $measurements_data['products_length'] ?? 0;
$products_width  = $measurements_data['products_width']  ?? 0;
$products_height = $measurements_data['products_height'] ?? 0;
?>

<div class="clear div_box mrg5" style="margin-top: 20px;">
    <table class="tableInput border0 measurements">
        <thead>
            <tr>
                <th colspan="2">
                    <?= $translations->get('ADMIN_TITLE'); ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <?php
                    $parameters = \http_build_query(
                        [
                            'set'    => 'product',
                            'module' => \grandeljay_cao_product_measurements_shopping_cart::class,
                        ]
                    );
                    $link       = \sprintf(
                        '<a href="%s">%s</a>',
                        \xtc_href_link(\FILENAME_MODULES, $parameters),
                        $translations->get('TEXT_TITLE')
                    );

                    echo \sprintf(
                        $translations->get('ADMIN_DESC'),
                        $link
                    );
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $translations->get('ADMIN_LENGTH') ?>
                </td>
                <td>
                    <input type="text" pattern="\d+" class="number" name="products_length" value="<?= $products_length ?>" readonly>
                    <?= $translations->get('ADMIN_CM') ?>
                </td>
            </tr>
            <tr>
                <td>
                <?= $translations->get('ADMIN_WIDTH') ?>
                </td>
                <td>
                    <input type="text" pattern="\d+" class="number" name="products_width" value="<?= $products_width ?>" readonly>
                    <?= $translations->get('ADMIN_CM') ?>
                </td>
            </tr>
            <tr>
                <td>
                <?= $translations->get('ADMIN_HEIGHT') ?>
                </td>
                <td>
                    <input type="text" pattern="\d+" class="number" name="products_height" value="<?= $products_height ?>" readonly>
                    <?= $translations->get('ADMIN_CM') ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php
