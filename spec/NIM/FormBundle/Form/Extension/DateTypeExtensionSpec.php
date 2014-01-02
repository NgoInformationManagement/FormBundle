<?php

namespace spec\NIM\FormBundle\Form\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateTypeExtensionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Extension\DateTypeExtension');
    }

    public function it_should_extends_abstract_type_extension()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractTypeExtension');
    }

    public function it_should_build_the_view_by_default(FormView $view, FormInterface $form)
    {
        $this->buildView($view, $form, array());
    }
    public function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'placeholder'
        ));

        $resolver->setAllowedTypes(array(
            'placeholder' => array('string'),
        ));

        $this->setDefaultOptions($resolver);
    }

    public function it_should_have_collection_as_extended_type()
    {
        $this->getExtendedType()->shouldReturn('date');
    }
}
