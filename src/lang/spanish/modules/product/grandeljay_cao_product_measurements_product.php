<?php

/**
 * CAO Product Measurements
 *
 * @author  Jay Trees <modified-cao-product-measurements@grandels.email>
 * @link    https://github.com/grandeljay/modified-cao-product-measurements
 * @package GrandeljayCaoProductMeasurements
 */

namespace Grandeljay\CaoProductMeasurements;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_PRODUCT_NAME);
$translations->add('TITLE', 'grandeljay - CAO Product Measurements');
$translations->add('TEXT_TITLE', 'CAO Product Measurements');

$translations->add('ADMIN_TITLE', 'Dimensiones');
$translations->add('ADMIN_DESC', 'Estos ajustes proceden del módulo %s.');
$translations->add('ADMIN_LENGTH', 'Longitud:');
$translations->add('ADMIN_WIDTH', 'Anchura:');
$translations->add('ADMIN_HEIGHT', 'Altura:');
$translations->add('ADMIN_CM', 'cm');

$translations->define();
