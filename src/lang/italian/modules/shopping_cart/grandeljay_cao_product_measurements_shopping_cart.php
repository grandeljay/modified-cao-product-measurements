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

$translations = new Translations(__FILE__, Constants::MODULE_SHOPPING_CART_NAME);
$translations->add('TITLE', 'grandeljay - CAO Product Measurements');
$translations->add('TEXT_TITLE', 'CAO Product Measurements');

$translations->add('ADMIN_TITLE', 'Dimensioni');
$translations->add('ADMIN_DESC', 'Queste impostazioni provengono dal modulo %s.');
$translations->add('ADMIN_LENGTH', 'Lunghezza:');
$translations->add('ADMIN_WIDTH', 'Larghezza:');
$translations->add('ADMIN_HEIGHT', 'Altezza:');
$translations->add('ADMIN_CM', 'cm');

$translations->define();
