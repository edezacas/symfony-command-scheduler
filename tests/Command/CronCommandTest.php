<?php


namespace EDC\CommandSchedulerBundle\Tests\Command;


use EDC\CommandSchedulerBundle\Cron\CronCommand;
use EDC\CommandSchedulerBundle\Entity\Job;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronCommandTest extends Command implements CronCommand
{
    protected static $defaultName = 'edc-test-cron-command';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName(self::getDefaultName())
            ->setDescription('Simple test cron command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return 0;
    }


    public function createCronJob(\DateTime $lastRunAt): Job
    {
        return new Job(CronCommandTest::getDefaultName());
    }

    public function shouldBeScheduled(\DateTime $lastRunAt): bool
    {
        return true;
    }

}