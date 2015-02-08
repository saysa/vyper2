<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VyperSiteBundle:Default:index.html.twig', array('name' => $name));
    }
}