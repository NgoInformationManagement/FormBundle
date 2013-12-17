<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\NIM\FormBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EyeconColorpickerTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('NIM\FormBundle\Form\Type\EyeconColorpickerType');
    }

    function it_should_extend_abstract_type()
    {
        $this->shouldHaveType('Symfony\Component\Form\AbstractType');
    }

    function it_should_configure_the_resolver(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'eventName',
            'color',
            'flat',
            'livePreview',
            'onShow',
            'onBeforeShow',
            'onHide',
            'onChange',
            'onSubmit',
        ))->shouldBeCalled();

        $resolver->setAllowedTypes(array(
            'eventName' => array('string'),
            'color' => array('string'),
            'flat' => array('bool'),
            'livePreview' => array('bool'),
            'onShow' => array('string'),
            'onBeforeShow' => array('string'),
            'onHide' => array('string'),
            'onChange' => array('string'),
            'onSubmit' => array('string'),
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_have_text_as_parent()
    {
        $this->getParent()->shouldReturn('text');
    }

    function it_should_have_colorpicker_as_name()
    {
        $this->getName()->shouldReturn('colorpicker');
    }
}
