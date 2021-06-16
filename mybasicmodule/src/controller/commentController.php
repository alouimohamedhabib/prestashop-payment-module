<?php

namespace Mybasicmodule\Controller;

use Symfony\Component\HttpFoundation\Response;

class CommentController
{
    public function indexAction()
    {
        return new Response("Hello world");
    }
}
