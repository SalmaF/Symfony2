<?php

namespace web3tc\EchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContratEtudeType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEleve', 'text', array('attr' => array( 'class' => 'control-label' )))
            ->add('prenomEleve', 'text', array('attr' => array( 'class' => 'control-label' )))
            ->add('anneeEnCours','choice', array('attr' => array( 'class' => 'form-control' )))
            ->add('dureeDuSejour', 'choice', array('attr' => array( 'class' => 'form-control' )))
            ->add('departement', 'choice', array('attr' => array( 'class' => 'form-control' )))
            ->add('universite',new UniversiteType())
            ->add('cours', new CoursType())
            //->add('cours',  new CoursType(),array(
              //                                  'allow_add'    => true,
                //                                'allow_delete' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'web3tc\EchangeBundle\Entity\ContratEtude',
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web3tc_echangebundle_contratetude';
    }
}
