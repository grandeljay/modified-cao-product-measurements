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

class grandeljay_cao_product_measurements_product extends StdModule
{
    public const VERSION = '0.1.0';

    public function __construct()
    {
        parent::__construct(Constants::MODULE_PRODUCT_NAME);

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
     * Extends the modified-shop product method `buildDataArray`.
     *
     * @param array  $product_data_smarty The product data with capitalised
     *                                    keys.
     * @param array  $product_data        The product data.
     * @param string $image               Unknown. Probably product image size.
     *
     * @return array
     */
    public function buildDataArray(array $product_data_smarty, array $product_data, string $image): array
    {
        if (!$this->getEnabled()) {
            return $product_data_smarty;
        }

        return $product_data_smarty;
    }
}
