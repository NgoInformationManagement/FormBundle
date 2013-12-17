<?php

/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NIM\FormBundle\Form\Type;

use NIM\FormBundle\Form\FormToolsTrait;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EyeconColorpickerType extends AbstractType
{
    use FormToolsTrait;

    const JQUERY_PROTOTYPE_NAME = 'colorpicker';

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $this->addAttributeToFormView($view, 'render_type', self::JQUERY_PROTOTYPE_NAME);
        $this->addDataAttributeToFormView($view, 'plugin-name', self::JQUERY_PROTOTYPE_NAME);

        $this->addDataAttributeToFormViewFromOptions($view, $options, 'eventName');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'color');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'flat');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'livePreview');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'onShow');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'onBeforeShow');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'onHide');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'onChange');
        $this->addDataAttributeToFormViewFromOptions($view, $options, 'onSubmit');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
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
        ));

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
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'text';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'colorpicker';
    }
}
