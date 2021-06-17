<?php

namespace Mybasicmodule\Controller;

use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends FrameworkBundleAdminController
{
    public function indexAction()
    {
        return $this->render("@Modules/mybasicmodule/views/templates/admin/comment.html.twig");
    }
}
