<?php


namespace EDC\CommandSchedulerBundle\Tests\Functional;


use EDC\CommandSchedulerBundle\Entity\CronJob;
use EDC\CommandSchedulerBundle\Entity\Job;
use EDC\CommandSchedulerBundle\Tests\Command\TestCommand;

class RunnerCommandTest extends BaseTest
{

    public function testFinishedRun()
    {
        $this->executeSchedulerTest();

        $output = $this->executeRunnerTest();

        /** @var Job $job */
        $job = $this->getEm()->getRepository(Job::class)->findAll();

        var_dump($output);

        var_dump("adasdds");

        $this->assertNotNull($job);
    }
}