<?php

/**
 *@author nicolaas[at]sunnysideup.co.nz
 *@description: adds functionality to controller for dev purposes only
 *
 **/


class TemplateoverviewPageDecorator extends SiteTreeExtension
{
    public function updateSettingsFields(FieldList $fields)
    {
        if ($this->owner->hasMethod('getHowToMakeThisTemplateWorkArray')) {
            $array = $this->owner->getHowToMakeThisTemplateWorkArray();
            if (is_array($array) && count($array)) {
                $fields->addFieldToTab("Root.Help", new LiteralField(
                    "HowToMakeThisPageWork",
                    '<h3 id="HowToMakeThisPageWorkHeader">'._t("TemplateoverviewPageDecorator.HOWTOMAKEITWORKHEADER", "How to make this page work").'</h3>'
                        .'<ul id="HowToMakeThisPageWorkList"><li>'.implode("</li><li>", $array).'</li></ul>'
                ));
            }
        }
        $obj = TemplateoverviewDescription::get()
            ->filter(array("ClassNameLink" => $this->owner->ClassName))
            ->First();
        if ($obj) {
            $fields->addFieldToTab("Root.Help", new LiteralField("MoreHelp", $obj->renderWith("TemplateoverviewPageCMSDetail")));
        }
    }
}
