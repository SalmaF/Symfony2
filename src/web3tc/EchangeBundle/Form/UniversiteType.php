<?php

namespace web3tc\EchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UniversiteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array('attr' => array( 'class' => 'control-label' )))
            ->add('presentation', 'textarea', array('attr' => array( 'class' => 'control-label' )))
            ->add('ville', 'entity', array('class' => 'web3tcEchangeBundle:Ville',
                                                 'property' => 'nom',
                                                 'multiple' => false))
/*            ->add('pays', 'entity', array('class' => 'web3tcEchangeBundle:Pays',
                                                 'property' => 'nom',
                                                 'multiple' => false))
*/        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'web3tc\EchangeBundle\Entity\Universite'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web3tc_echangebundle_universite';
    }
}
