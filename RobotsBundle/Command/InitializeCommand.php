<?php

/*
 * This file is part of the Worldia presentation bundle package.
 * (c) Christian Daguerre <cdaguerre@worldia.com>
 */

namespace Dag\Bundle\RobotsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class InitializeCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('dag:robots:initialize')
            ->setDescription('Initialize default rules in the application.')
            ->setHelp('The <info>%command.name%</info> command initializes default robot rules setup.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Initializing default robot rules.');

        $initializer = $this->getContainer()->get('dag.robots.rule_initializer');
        $initializer->initialize($output);

        $output->writeln('<info>Completed!</info>');
    }
}
