<?php

/**
 *@author nicolaas[at]sunnysideup.co.nz
 *@description: adds functionality to controller for dev purposes only
 *
 **/


class TemplateoverviewPageExtension extends Extension
{
    protected $templateList = null;

    public function TemplateoverviewPage()
    {
        return TemplateoverviewPage::get()->First();
    }

    public function IncludeTemplateoverviewDevelopmentFooter()
    {
        if (Director::isDev()) {
            Requirements::javascript("templateoverview_advanced/javascript/TemplateoverviewExtension.js");
            Requirements::themedCSS("TemplateoverviewExtension", "templateoverview_advanced");
            return true;
        }
        return false;
    }

    public function NextTemplateoverviewPage()
    {
        $list = $this->TemplateList();
        $doIt = false;
        if ($list) {
            foreach ($list as $page) {
                if ($doIt) {
                    return $page;
                }
                if ($page->ClassName == $this->owner->ClassName) {
                    $doIt = true;
                }
            }
        }
    }

    public function PrevTemplateoverviewPage()
    {
        $list = $this->TemplateList();
        $doIt = false;
        if ($list) {
            foreach ($list as $page) {
                if ($page->ClassName == $this->owner->ClassName) {
                    $doIt = true;
                }
                if ($doIt && isset($previousPage)) {
                    return $previousPage;
                }
                $previousPage = $page;
            }
        }
    }

    public function TemplateList()
    {
        if (!$this->templateList) {
            $page = TemplateoverviewPage::get()->First();
            if ($page) {
                $this->templateList = $page->ListOfAllClasses();
            }
        }
        return $this->templateList;
    }

    public function TemplateDescriptionForThisClass()
    {
        return TemplateoverviewDescription::get()
            ->filter(array("ClassNameLink" => $this->owner->ClassName))
            ->First();
    }
}
