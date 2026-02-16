<?php

namespace OSVCustomMeta\Contexts;

use Ceres\Contexts\SingleItemContext;
use IO\Helper\ContextInterface;

class CustomSingleItemContext extends SingleItemContext implements ContextInterface
{
    const PROP_TITLE_ID = 288;
    const PROP_DESC_ID  = 289;

    public function init($params)
    {
        parent::init($params);

        $itemData = $this->item['documents'][0]['data'] ?? [];
        $variationProperties = $itemData['variationProperties'] ?? [];

        $customTitle = $this->getPropertyValueById($variationProperties, self::PROP_TITLE_ID);
        $customDesc  = $this->getPropertyValueById($variationProperties, self::PROP_DESC_ID);

        if (!empty($customTitle)) {
            $this->item['documents'][0]['data']['texts']['title'] = $customTitle;
        }

        if (!empty($customDesc)) {
            $this->item['documents'][0]['data']['texts']['metaDescription'] = $customDesc;
        }
    }

    private function getPropertyValueById(array $variationPropertyGroups, int $propertyId): string
    {
        foreach ($variationPropertyGroups as $propertyGroup) {
            foreach ($propertyGroup['properties'] ?? [] as $property) {
                if ($property['id'] == $propertyId) {
                    return (string)($property['values']['value'] ?? '');
                }
            }
        }
        return '';
    }
}
