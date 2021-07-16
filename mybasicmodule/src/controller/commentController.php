<?php

namespace Mybasicmodule\Controller;

use Mybasicmodule\Entity\CommentTest;
use Mybasicmodule\Form\CommentType;
use PrestaShopBundle\Controller\Admin\FrameworkBundleAdminController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends FrameworkBundleAdminController
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(CommentType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            // build the object
            $commntTest = new CommentTest();

            $commntTest->setName($form->get('name')->getData());
            $commntTest->setDescription($form->get('description')->getData());
            $commntTest->setprice($form->get('price')->getData());

            // persist the data
            $em->persist($commntTest);
            $em->flush();
            
        }

        return $this->render(
            "@Modules/mybasicmodule/views/templates/admin/comment.html.twig",
            [
                "test" => 123,
                "form" => $form->createView()
            ]
        );
    }
}
