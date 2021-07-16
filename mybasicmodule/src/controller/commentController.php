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

            $commntTest->setName("The name two");
            $commntTest->setDescription("The long description");
            $commntTest->setprice(90);


            // persist the data
            $em->persist($commntTest);
            $em->flush();
            
            dump($form->getData());
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
