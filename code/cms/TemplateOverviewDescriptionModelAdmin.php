<?php
/**
 *@author nicolaas[at]sunnysideup.co.nz
 *@description model admin for template overview
 **/

class TemplateoverviewDescriptionModelAdmin extends ModelAdmin
{
    public $showImportForm = false;

    private static $managed_models = array("TemplateoverviewDescription");

    private static $url_segment = 'templates';

    private static $menu_title = 'Templates';

    public static function get_full_url_segment($action = null)
    {
        $obj = singleton("TemplateoverviewDescriptionModelAdmin");
        return $obj->Link($action);
    }
}
