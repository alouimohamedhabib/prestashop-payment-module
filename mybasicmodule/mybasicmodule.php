<?php

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://devdocs.prestashop.com/ for more information.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 */

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;

if (!defined('_PS_VERSION_')) {
    exit;
}

// the main class

class MyBasicModule extends Module implements WidgetInterface
{

    private $templateFile;
    // constructor

    public function __construct()
    {
        $this->name = "mybasicmodule";
        $this->tab  = "front_office_features";
        $this->version = "1.0";
        $this->author = "ALOUI Mohamed Habib";
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            "min" => "1.6",
            "max" => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l("My very first module");
        $this->description = $this->l("This is a great testing module");
        $this->confirmUninstall = $this->l("Are crazy , you are going to unistall a great module!");
        $this->templateFile = "module:mybasicmodule/views/templates/hook/footer.tpl";
    }


    // install method
    public function install()
    {
        return parent::install()
            && $this->registerHook('registerGDPRConsent')
            &&  $this->dbInstall();
    }

    // uninstall method
    public function uninstall(): Bool
    {
        return parent::uninstall();
    }

    // sql install

    public function dbInstall()
    {
        // sql query that create certain table
        return true;
    }

    // public function hookdisplayFooter($params)
    // {

    //     $this->context->smarty->assign([
    //         'myparamtest' => "Mohamed habib ALOUI",
    //         'idcart' => $this->context->cart->id
    //     ]);
    //     return $this->display(__FILE__, 'views/templates/hook/footer.tpl');
    // }


    public function renderWidget($hookName, array $configuration)
    {
        if ($hookName === 'displayNavFullWidth') {
            return "Hello this is an exception form the displayNavFullWidth hook";
        }
        if (!$this->isCached($this->templateFile, $this->getCacheId($this->name))) {
            $this->context->smarty->assign($this->getWidgetVariables($hookName, $configuration));
        }
        return $this->fetch("module:mybasicmodule/views/templates/hook/footer.tpl");
    }

    public function getWidgetVariables($hookName, array $configuration)
    {
        return [
            'idcart' => $this->context->cart->id,
            'myparamtest' => "Prestashop developer"
        ];
    }

    // configuration page

    public function getContent()
    {

        $message = null;

        if (Tools::getValue("courserating")) {
            Configuration::updateValue('COURSE_RATING', Tools::getValue("courserating"));
            $message = "Form saved correctly";
        }

        // field: courserating
        $courserating = Configuration::get('COURSE_RATING');
        $this->context->smarty->assign(
            [
                'courserating' => $courserating,
                'message' => $message
            ]
        );
        return $this->fetch("module:mybasicmodule/views/templates/admin/configuration.tpl");
    }
}
