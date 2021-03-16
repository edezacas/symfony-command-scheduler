<?php


namespace EDC\CommandSchedulerBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Class CronJob
 * @package EDC\CommandSchedulerBundle\Entity
 *
 * @ORM\Table(name = "edc_cron_jobs")
 * @ORM\Entity()
 */
class CronJob
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type = "string", length = 200, unique = true) */
    private $command;

    /** @ORM\Column(type = "datetime", name = "lastRunAt") */
    private $lastRunAt;

    public function __construct($command)
    {
        $this->command = $command;
        $this->lastRunAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @return \DateTime
     */
    public function getLastRunAt(): \DateTime
    {
        return $this->lastRunAt;
    }
}