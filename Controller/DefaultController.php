<?php

namespace Claudusd\SecureChatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClaudusdSecureChatBundle:Default:index.html.twig', array('name' => $name));
    }
}
