<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="user_login")
     */
    public function LoginAction()
    {
        // replace this example code with whatever you need
        return $this->render('login/login.html.twig');
    }

}
