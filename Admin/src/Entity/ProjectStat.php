<?php

namespace PHPMaker2024\Gov_Nanay_Pineda\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2024\Gov_Nanay_Pineda\AbstractEntity;
use PHPMaker2024\Gov_Nanay_Pineda\AdvancedSecurity;
use PHPMaker2024\Gov_Nanay_Pineda\UserProfile;
use function PHPMaker2024\Gov_Nanay_Pineda\Config;
use function PHPMaker2024\Gov_Nanay_Pineda\EntityManager;
use function PHPMaker2024\Gov_Nanay_Pineda\RemoveXss;
use function PHPMaker2024\Gov_Nanay_Pineda\HtmlDecode;
use function PHPMaker2024\Gov_Nanay_Pineda\EncryptPassword;

/**
 * Entity class for "project_stats" table
 */
#[Entity]
#[Table(name: "project_stats")]
class ProjectStat extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "project_stats_id_seq")]
    private int $id;

    #[Column(name: "project_id", type: "integer", nullable: true)]
    private ?int $projectId;

    #[Column(name: "stat_label", type: "string")]
    private string $statLabel;

    #[Column(name: "stat_value", type: "string")]
    private string $statValue;

    #[Column(name: "stat_description", type: "string", nullable: true)]
    private ?string $statDescription;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): static
    {
        $this->id = $value;
        return $this;
    }

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function setProjectId(?int $value): static
    {
        $this->projectId = $value;
        return $this;
    }

    public function getStatLabel(): string
    {
        return HtmlDecode($this->statLabel);
    }

    public function setStatLabel(string $value): static
    {
        $this->statLabel = RemoveXss($value);
        return $this;
    }

    public function getStatValue(): string
    {
        return HtmlDecode($this->statValue);
    }

    public function setStatValue(string $value): static
    {
        $this->statValue = RemoveXss($value);
        return $this;
    }

    public function getStatDescription(): ?string
    {
        return HtmlDecode($this->statDescription);
    }

    public function setStatDescription(?string $value): static
    {
        $this->statDescription = RemoveXss($value);
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $value): static
    {
        $this->createdAt = $value;
        return $this;
    }
}
