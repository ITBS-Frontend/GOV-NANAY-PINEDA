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
 * Entity class for "political_journey" table
 */
#[Entity]
#[Table(name: "political_journey")]
class PoliticalJourney extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "political_journey_id_seq")]
    private int $id;

    #[Column(name: "position_title", type: "string")]
    private string $positionTitle;

    #[Column(name: "start_year", type: "integer")]
    private int $startYear;

    #[Column(name: "end_year", type: "integer", nullable: true)]
    private ?int $endYear;

    #[Column(name: "duration_display", type: "string", nullable: true)]
    private ?string $durationDisplay;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(name: "is_current", type: "boolean", nullable: true)]
    private ?bool $isCurrent;

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

    public function getPositionTitle(): string
    {
        return HtmlDecode($this->positionTitle);
    }

    public function setPositionTitle(string $value): static
    {
        $this->positionTitle = RemoveXss($value);
        return $this;
    }

    public function getStartYear(): int
    {
        return $this->startYear;
    }

    public function setStartYear(int $value): static
    {
        $this->startYear = $value;
        return $this;
    }

    public function getEndYear(): ?int
    {
        return $this->endYear;
    }

    public function setEndYear(?int $value): static
    {
        $this->endYear = $value;
        return $this;
    }

    public function getDurationDisplay(): ?string
    {
        return HtmlDecode($this->durationDisplay);
    }

    public function setDurationDisplay(?string $value): static
    {
        $this->durationDisplay = RemoveXss($value);
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

    public function getIsCurrent(): ?bool
    {
        return $this->isCurrent;
    }

    public function setIsCurrent(?bool $value): static
    {
        $this->isCurrent = $value;
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
