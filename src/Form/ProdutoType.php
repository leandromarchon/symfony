<?php

namespace App\Form;

use App\Entity\Produto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, array(
                'label' => "Nome",
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('preco', TextType::class, array(
                'label' => 'Preço',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('descricao', TextareaType::class, array(
                'label' => 'Descrição',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('enviar', SubmitType::class, array(
                'label' => 'Salvar',
                'attr' => array(
                    'class' => 'btn btn-primary mt-5'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
