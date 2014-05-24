<?php

namespace web3tc\EchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoursType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero','text', array('attr' => array( 'class' => 'col-sm-2 control-label' )))
            ->add('titre','text', array('attr' => array( 'class' => 'col-sm-2 control-label' )))
            ->add('semestre','choice', array('choices' => array( '1' => 'Semestre 1',
                                                                 '2' => 'Semestre 2',
                                                                 'A' => 'Année' )))
            ->add('credits','number', array('attr' => array( 'class' => 'col-sm-2 control-label' )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => NULL
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web3tc_echangebundle_cours';
    }
}
