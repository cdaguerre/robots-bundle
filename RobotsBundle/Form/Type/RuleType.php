<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

namespace Dag\Bundle\RobotsBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;

class RuleType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('route')
            ->add('tags', TagChoiceType::class)
            ->add('hosts')
        ;
    }
}
