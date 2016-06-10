<?php

/*
 * This file is part of the robots-bundle package.
 *
 * (c) Christian Daguerre <christian@daguer.re>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Dag\Bundle\RobotsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class TagChoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $tags = ['noindex', 'nofollow', 'none', 'noarchive', 'nosnippet', 'noodp', 'notranslate', 'noimageindex'];

        $resolver
            ->setDefaults([
                'choices' => $tags,
                'multiple' => true,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dag_robots_tag_choice';
    }
}
