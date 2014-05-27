<?php

namespace web3tc\EchangeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentairesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('contenu')
            ->add('ville')
            ->add('universite')
            ->add('pays')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'web3tc\EchangeBundle\Entity\Commentaires'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'web3tc_echangebundle_commentaires';
    }
}
