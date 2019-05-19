<?php
namespace App\SurveyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SurveyForm extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class)
            ->add('country', TextType::class)
            ->add('bath_shower', ChoiceType::class, [
                'choices' => [
                    'Bath' => 'bath',
                    'Shower' => 'shower',
                ],
                'label' => 'Do you prefer to take a bath or a shower?',
            ])
            ->add('toilet_flush', ChoiceType::class, [
                'choices' => [
                    'Single Flush' => 'single_flush',
                    'Dual Flush' => 'dual_flush',
                ],
                'label' => 'Do you have a single flush or a dual flush toilet?'
            ])
            ->add('wash', ChoiceType::class, [
                'choices' => [
                    'Yes' => 'yes',
                    'No' => 'no',
                ],
                'label' => 'Do you use a washing up bowl when washing up?'
            ])
            ->add('garden_water', ChoiceType::class, [
                'choices' => [
                    'Hose Pipe' => 'hose_pipe',
                    'Watering Can' => 'watering_can',
                    'No Garden' => 'no_garden'
                ],
                'label' => 'How do you water your garden?'
            ])
            ->add('Submit', SubmitType::class);
    }
}
