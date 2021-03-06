<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\GraphQl\Model;

use Magento\Eav\Api\AttributeManagementInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Setup\EavSetup;

class EntityAttributeList
{
    /**
     * @var AttributeManagementInterface
     */
    private $management;

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @var EavSetup
     */
    private $eavSetup;

    /**
     * @param AttributeManagementInterface $management
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(
        AttributeManagementInterface $management,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->management =  $management;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavSetup = $this->eavSetupFactory->create();
    }

    public function getDefaultEntityAttributes(string $entityCode)
    {
        $defaultAttributeSetId = $this->eavSetup->getDefaultAttributeSetId($entityCode);
        return $this->management->getAttributes($entityCode, $defaultAttributeSetId);
    }
}
