<?php

namespace Craft;

class IpFieldType extends BaseFieldType
{
	public function getName()
	{
		return Craft::t('IP');
	}
    
    public function defineContentAttribute()
    {
        return AttributeType::Number;
    }

	public function getInputHtml($name, $value)
	{
		$inputId = craft()->templates->formatInputId($name);
		return craft()->templates->render('ip/_fieldtype/index', array(
			"name"   => $name,
			"id"     => $inputId,
			"value"  => $value
		));
	}
    
    public function prepValueFromPost($value)
    {
        return ip2long($value);
    }
    
    public function prepValue($value)
    {
        return long2ip($value);
    }
}
