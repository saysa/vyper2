<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FaqController extends Controller
{
    /**
     * @return array
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
}
