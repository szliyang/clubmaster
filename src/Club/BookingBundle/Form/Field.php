<?php

namespace Club\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Field extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder->add('name');
    $builder->add('information');
    $builder->add('open', 'jquery_date', array(
        'widget' => 'single_text'
    ));
    $builder->add('close', 'jquery_date', array(
        'widget' => 'single_text',
        'required' => false
    ));
    $builder->add('location');
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Club\BookingBundle\Entity\Field'
    ));
  }

  public function getName()
  {
    return 'admin_field';
  }
}
