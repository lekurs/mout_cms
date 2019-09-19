<?php


namespace App\Domain\Form\Admin\Users;


use App\Domain\DTO\Admin\Users\AddNewUserDTO;
use App\Domain\DTO\Interfaces\AddNewUserDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddNewUserForm extends AbstractType
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
            ->add('password', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Mot de passe *',
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Email',
                'required' => true,
            ])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Administrateur' => 'ROLE_ADMIN',
                    'Contributeur' => 'ROLE_SUPER_USER',
                    'Utilisateur' => 'ROLE_USER'
                ],
                'placeholder' => 'Choisissez le rang',
                'required' => true,
            ])
            ->add('online', ChoiceType::class, [
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    'En ligne' => true,
                    'Hors ligne' => false
                ],
            ])
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom',
                'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Prénom',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddNewUserDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new AddNewUserDTO(
                    $form->get('username')->getData(),
                    $form->get('password')->getData(),
                    $form->get('email')->getData(),
                    $form->get('role')->getData(),
                    $form->get('online')->getData(),
                    $form->get('name')->getData(),
                    $form->get('lastname')->getData()
                );
            }
        ]);
    }
}