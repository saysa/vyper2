<?php

namespace Vyper\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Vyper\SiteBundle\Form\ContactForm;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     * @Template
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new ContactForm);

        if ($request->getMethod() == 'POST') {
            $form->submit($request);
            if ($form->isValid()) {

                $name = $_POST['contact']['lastname'] . " " . $_POST['contact']['firstname'];
                $from = $_POST['contact']['email'];
                $text = $_POST['contact']['message'];
                $dest = 'cyrielle@vyper-jmusic.com';

                $corps = '
                Nom : ' . $name . '<br />
                E-Mail : ' . $from . '<br />
                Site Internet : ' . $_POST['contact']['website'] . '<br />
                Message : ' . $text . '<br />

                ';

                $message = \Swift_Message::newInstance()
                    ->setSubject('Message site web VYPER')
                    ->setFrom($from)
                    ->setTo($dest)
                    ->setBody($corps, 'text/html');

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('info', 'Merci, votre message a bien été envoyé!');
            }
        }

        return array('form' => $form->createView());
    }
}
