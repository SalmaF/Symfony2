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
            ->add('nomEleve',       'text')
            ->add('prenomEleve',        'text')
            ->add('anneeEnCours',       'choice')
            ->add('dureeDuSejour',      'choice')
            ->add('departement',        'text')
            ->add('universite',     'text')
            ->add('cours',  'collection', array('type' => new CoursType(),
                                                'allow_add'    => true,
                                                'allow_delete' => true))
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
