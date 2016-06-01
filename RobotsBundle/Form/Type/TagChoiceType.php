<?php

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
        $tags = array('noindex', 'nofollow', 'none', 'noarchive', 'nosnippet', 'noodp', 'notranslate', 'noimageindex');

        $resolver
            ->setDefaults(array(
                'choices' => $tags,
                'multiple' => true,
            ))
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
