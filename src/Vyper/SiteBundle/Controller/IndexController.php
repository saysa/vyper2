<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Vyper\SiteBundle\Form\NewsletterForm;

class IndexController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @Template
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new NewsletterForm);

        if ($request->getMethod() == 'POST') {
            $form->submit($request);
            if ($form->isValid()) {

                $name = $_POST['newsletter']['name'];
                $from = $_POST['newsletter']['email'];
                #$dest = $_POST['objet'] . '@japanfm.fr';
                $dest = 'cyrielle@vyper-jmusic.com';

                $corps = '
                Nom : ' . $name . '<br />
                E-Mail : ' . $from . '<br />

                ';

                $message = \Swift_Message::newInstance()
                    ->setSubject('Inscription newsletter VYPER')
                    ->setFrom($from)
                    ->setTo($dest)
                    ->setBody($corps, 'text/html');

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('info', 'Merci, d\accorder votre confiance à VYPER!');
            }
        }

        return array('form' => $form->createView());
    }
}
