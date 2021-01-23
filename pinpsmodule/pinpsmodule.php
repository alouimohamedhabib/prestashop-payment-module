<?php

use Doctrine\ORM\Query\Expr\Math;

if (!defined('_PS_VERSION_')) {
    exit;
}


class PinPsModule extends Module
{

    public function __construct()
    {
        $this->name = 'pinpsmodule';
        $this->author = 'Aloui Mohamed Habib';
        $this->tab = 'front_office_features';
        $this->version = '1.0';
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->trans('Pintrest module button', [], 'Modules.pspinmodule.Admin');
        $this->description = $this->trans(
            'Add a pintrest button to the products',
            [],
            'Modules.pspinmodule.Admin'
        );
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
    }

    public function install()
    {
        return parent::install();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function hookActionFrontControllerSetMedia()
    {
        // Media::addJsDef([
        //     'pinpsshit' => "HELLLO ALL YOUTUBE"
        // ]);

        $this->context->controller->registerJavascript(
            'pin-js', 'http://assets.pinterest.com/js/pinit.js',
            ['server' => 'remote']
        );
    }

    public function hookDisplayAfterProductThumbs($params)
    {
        return '<a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark">Pintrest
        </a>';
    }
}
