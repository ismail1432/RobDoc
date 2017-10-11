<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\{
    AbstractType, Extension\Core\Type\EmailType, FormBuilderInterface
};
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', TextType::class,
                ['attr'=>
                    ['class'=>'validate']
                ],
                [
                    'label_attr'=>['data-error'=>'the author is not valid']
                ])
            ->add('recipient', EmailType::class,
                ['attr'=>
                    ['class'=>'validate']
                ],
                [
                    'label_attr'=>['data-error'=>'the email is not valid']
                ])
            ->add('subject', TextType::class,
                ['attr'=>
                    ['class'=>'validate']
                ],
                [
                    'label_attr'=>['data-error'=>'the subject is not valid']
                ])
            ->add('content', TextType::class,
                ['attr'=>
                    ['class'=>'validate']
                ],
                [
                    'label_attr'=>['data-error'=>'the content is not valid']
                ]);

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Message'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_message';
    }


}
