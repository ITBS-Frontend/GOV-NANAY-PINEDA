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
 * Entity class for "tourism_activities" table
 */
#[Entity]
#[Table(name: "tourism_activities")]
class TourismActivity extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "tourism_activities_id_seq")]
    private int $id;

    #[Column(name: "destination_id", type: "integer", nullable: true)]
    private ?int $destinationId;

    #[Column(name: "activity_name", type: "string")]
    private string $activityName;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(type: "string", nullable: true)]
    private ?string $duration;

    #[Column(name: "display_order", type: "integer", nullable: true)]
    private ?int $displayOrder;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "difficulty_level_id", type: "integer", nullable: true)]
    private ?int $difficultyLevelId;

    public function __construct()
    {
        $this->displayOrder = 0;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): static
    {
        $this->id = $value;
        return $this;
    }

    public function getDestinationId(): ?int
    {
        return $this->destinationId;
    }

    public function setDestinationId(?int $value): static
    {
        $this->destinationId = $value;
        return $this;
    }

    public function getActivityName(): string
    {
        return HtmlDecode($this->activityName);
    }

    public function setActivityName(string $value): static
    {
        $this->activityName = RemoveXss($value);
        return $this;
    }

    public function getDescription(): ?string
    {
        return HtmlDecode($this->description);
    }

    public function setDescription(?string $value): static
    {
        $this->description = RemoveXss($value);
        return $this;
    }

    public function getDuration(): ?string
    {
        return HtmlDecode($this->duration);
    }

    public function setDuration(?string $value): static
    {
        $this->duration = RemoveXss($value);
        return $this;
    }

    public function getDisplayOrder(): ?int
    {
        return $this->displayOrder;
    }

    public function setDisplayOrder(?int $value): static
    {
        $this->displayOrder = $value;
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

    public function getDifficultyLevelId(): ?int
    {
        return $this->difficultyLevelId;
    }

    public function setDifficultyLevelId(?int $value): static
    {
        $this->difficultyLevelId = $value;
        return $this;
    }
}
