<?php

namespace web3tc\EchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContratEtudeBisType extends AbstractType
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
            ->add('anneeEnCours','choice', array('choices' => array( '3' => '3ème année',
                                                                       '4' => '4ème année')))
            ->add('dureeDuSejour','choice', array('choices' => array( '1' => 'Semestre 1',
                                                                       '2' => 'Semestre 2',
                                                                       'A' => 'Année')))
            ->add('departement', 'entity', array('class' => 'web3tcEchangeBundle:Departement',
                                                 'property' => 'nom',
                                                 'multiple' => false))
            ->add('universite','entity', array('class' => 'web3tcEchangeBundle:Universite',
                                                 'property' => 'nom',
                                                 'multiple' => false,
            ))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'web3tc\EchangeBundle\Entity\ContratEtude'
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
