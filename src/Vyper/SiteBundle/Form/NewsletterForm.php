<?php
/**
 * Created by PhpStorm.
 * User: saysa
 * Date: 10/03/15
 * Time: 22:08
 */

namespace Vyper\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsletterForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('attr' => array('placeholder' => 'Votre nom')))
            ->add('email', 'email', array('attr' => array('placeholder' => 'Adresse E-Mail')))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'newsletter';
    }
} 