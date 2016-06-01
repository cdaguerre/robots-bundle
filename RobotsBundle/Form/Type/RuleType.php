<?php

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
            ->add('tags', 'dag_robots_tag_choice')
            ->add('hosts')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'dag_robots_robot_rule';
    }
}
