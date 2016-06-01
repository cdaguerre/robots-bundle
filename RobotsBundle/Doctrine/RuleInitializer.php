<?php

namespace Dag\Bundle\RobotsBundle\Doctrine;

use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\NonUniqueResultException;
use Dag\Component\Robots\Repository\RuleRepositoryInterface;

/**
 * @author Christian Daguerre <christian@daguer.re>
 */
class RuleInitializer
{
    /**
     * @var array
     */
    private $rules;

    /**
     * @var ObjectManager
     */
    private $ruleManager;

    /**
     * @var RuleRepositoryInterface
     */
    private $ruleRepository;

    public function __construct(array $rules, ObjectManager $ruleManager, RuleRepositoryInterface $ruleRepository)
    {
        $this->rules = $rules;
        $this->ruleManager = $ruleManager;
        $this->ruleRepository = $ruleRepository;
    }

    public function initialize(OutputInterface $output = null)
    {
        try {
            $this->initializeRules($output);
        } catch (NonUniqueResultException $exception) {
            if ($output) {
                $output->writeln('Rules already initialized');
            }
        }
    }

    protected function initializeRules(OutputInterface $output = null)
    {
        foreach ($this->rules as $host => $rules) {
            if (null === $rule = $this->ruleRepository->findOneBy(array('route' => $data['route']))) {
                $rule = $this->ruleRepository->createNew();
                $rule->setRoute($data['route']);
                $rule->setHosts($data['hosts']);
                $rule->setTags($data['tags']);
                if ($output) {
                    $output->writeln(sprintf(
                        'Adding rule "<comment>%s</comment>". (<info>Tags: %s, Hosts: %s</info>)',
                        $data['route'],
                        implode(', ', $data['tags']),
                        implode(', ', $data['hosts'])
                    ));
                }
            }

            $this->ruleManager->persist($rule);
        }

        $this->ruleManager->flush();
    }
}
