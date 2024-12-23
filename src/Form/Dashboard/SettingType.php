<?php
/**
 * @project tpc-online
 * @author hoepjhsha
 * @email hiepnguyen3624@gmail.com
 * @date 23/12/2024
 * @time 19:44
 */

namespace App\Form\Dashboard;

use App\Entity\Setting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter name',
                ],
            ])
            ->add('code', TextType::class, [
                'label' => 'Code',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter code',
                ],
            ])
            ->add('data', TextType::class, [
                'label' => 'Data',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enter data',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->resolve([
            'data_class' => Setting::class
        ]);
    }
}