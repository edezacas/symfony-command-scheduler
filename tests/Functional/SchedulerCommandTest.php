<?php


namespace EDC\CommandSchedulerBundle\Tests\Functional;


use EDC\CommandSchedulerBundle\Entity\CronJob;
use EDC\CommandSchedulerBundle\Tests\Command\TestCommand;

class SchedulerCommandTest extends BaseTest
{

    public function testExecute()
    {
        // the output of the command in the console
        $output = $this->executeSchedulerTest();

        $this->assertStringContainsString(TestCommand::COMMAND_NAME, $output);
    }

    public function testSchedule()
    {
        $lastRunAt = new \DateTime();
        $this->executeSchedulerTest();

        /** @var CronJob $commandCronJob */
        $commandCronJob = $this->getEm()->getRepository(CronJob::class)->findOneBy(
            ['command' => TestCommand::COMMAND_NAME]
        );


        $this->assertNotNull($commandCronJob);
        $this->assertNotNull($commandCronJob->getLastRunAt());
        $this->assertEquals($lastRunAt->format('Y-m-d H:m:s'), $commandCronJob->getLastRunAt()->format('Y-m-d H:m:s'));
    }
}