<?php


namespace App\Domain\Form\Admin\Login;


use App\Domain\DTO\Admin\Login\LoginFormDTO;
use App\Domain\DTO\Interfaces\LoginFormDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom d\'utilisateur *',
                'required' => true,
            ])
            ->add('password', PasswordType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Mot de passe *',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LoginFormDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new LoginFormDTO(
                    $form->get('username')->getData(),
                    $form->get('password')->getData()
                );
            }
            ]);
    }
}