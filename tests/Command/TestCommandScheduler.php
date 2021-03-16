<?php


namespace EDC\CommandSchedulerBundle\Tests\Command;


use EDC\CommandSchedulerBundle\Cron\JobScheduler;
use EDC\CommandSchedulerBundle\Entity\Job;

class TestCommandScheduler implements JobScheduler
{
    public function getCommands(): array
    {
        return [TestCommand::COMMAND_NAME];
    }

    public function shouldSchedule(string $command, \DateTime $lastRunAt): bool
    {
        return true;
    }

    public function createJob(string $command, \DateTime $lastRunAt): Job
    {
        return new Job(TestCommand::COMMAND_NAME);
    }

}