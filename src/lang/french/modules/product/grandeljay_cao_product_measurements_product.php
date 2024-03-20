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

$translations->add('ADMIN_TITLE', 'Dimensions');
$translations->add('ADMIN_DESC', 'Ces réglages proviennent du module %s.');
$translations->add('ADMIN_LENGTH', 'longueur :');
$translations->add('ADMIN_WIDTH', 'largeur :');
$translations->add('ADMIN_HEIGHT', 'hauteur :');
$translations->add('ADMIN_CM', 'cm');

$translations->define();
