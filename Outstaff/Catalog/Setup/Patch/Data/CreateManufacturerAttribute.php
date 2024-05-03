<?php

namespace Outstaff\Catalog\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Validator\ValidateException;

/**
 * Patch for product attribute
 */
class CreateManufacturerAttribute implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected  $moduleDataSetup;
    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @param EavSetupFactory $eavSetupFactory
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        EavSetupFactory  $eavSetupFactory,
        ModuleDataSetupInterface $moduleDataSetup
    )
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @return $this|CreateManufacturerAttribute
     * @throws LocalizedException
     * @throws ValidateException
     */
    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup'=> $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            Product::ENTITY,
            'manufacturer',
            [
                'type' => 'varchar',
                'label' => 'Manufacturer',
                'input' => 'text',
                'required' => false,
                'visible_on_front' => true,
                'global' => ScopedAttributeInterface::SCOPE_STORE,
                'used_in_product_listing' => true,
            ]
        );

        return $this;
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
