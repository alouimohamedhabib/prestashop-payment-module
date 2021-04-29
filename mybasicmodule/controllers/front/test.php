<?php


class MyBasicModuleTestModuleFrontController extends ModuleFrontController
{
    public   $template = "module:mybasicmodule/views/templates/front/test.tpl";

    public function initContent()
    {
        parent::initContent();
        $this->setTemplate($this->template);
    }
}
