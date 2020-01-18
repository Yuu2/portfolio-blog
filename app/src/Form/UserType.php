<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * updated 2019.12.31
 * @author Yuu2
 */
class UserType extends AbstractType {
  
  /**
   * @access public
   * @param FormBuilderInterface $builder
   * @param array $options
   * @return void
   */
  public function buildForm(FormBuilderInterface $builder, array $options) {
  
    $builder
      ->add('email', EmailType::class, array(
        'label' => 'email',
      ))

      ->add('password', RepeatedType::class, array(
        'type' => PasswordType::class,
        'first_options'  => ['label' => 'Password'],
        'second_options' => ['label' => 'Repeat Password'],
      ))
      ->add('submit', SubmitType::class);
    ;
  }

  /**
   * @access public
   * @param OptionResolver $resolver
   * @return void
   */
  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
        'data_class' => User::class,
        'csrf_protection' => true
    ]);
  }
}