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
 * Entity class for "environmental_programs" table
 */
#[Entity]
#[Table(name: "environmental_programs")]
class EnvironmentalProgram extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "environmental_programs_id_seq")]
    private int $id;

    #[Column(name: "program_name", type: "string")]
    private string $programName;

    #[Column(type: "text")]
    private string $description;

    #[Column(type: "text", nullable: true)]
    private ?string $objectives;

    #[Column(name: "coverage_area", type: "string", nullable: true)]
    private ?string $coverageArea;

    #[Column(name: "implementation_date", type: "date", nullable: true)]
    private ?DateTime $implementationDate;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "program_type_id", type: "integer", nullable: true)]
    private ?int $programTypeId;

    #[Column(name: "status_id", type: "integer", nullable: true)]
    private ?int $statusId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): static
    {
        $this->id = $value;
        return $this;
    }

    public function getProgramName(): string
    {
        return HtmlDecode($this->programName);
    }

    public function setProgramName(string $value): static
    {
        $this->programName = RemoveXss($value);
        return $this;
    }

    public function getDescription(): string
    {
        return HtmlDecode($this->description);
    }

    public function setDescription(string $value): static
    {
        $this->description = RemoveXss($value);
        return $this;
    }

    public function getObjectives(): ?string
    {
        return HtmlDecode($this->objectives);
    }

    public function setObjectives(?string $value): static
    {
        $this->objectives = RemoveXss($value);
        return $this;
    }

    public function getCoverageArea(): ?string
    {
        return HtmlDecode($this->coverageArea);
    }

    public function setCoverageArea(?string $value): static
    {
        $this->coverageArea = RemoveXss($value);
        return $this;
    }

    public function getImplementationDate(): ?DateTime
    {
        return $this->implementationDate;
    }

    public function setImplementationDate(?DateTime $value): static
    {
        $this->implementationDate = $value;
        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return HtmlDecode($this->featuredImage);
    }

    public function setFeaturedImage(?string $value): static
    {
        $this->featuredImage = RemoveXss($value);
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

    public function getProgramTypeId(): ?int
    {
        return $this->programTypeId;
    }

    public function setProgramTypeId(?int $value): static
    {
        $this->programTypeId = $value;
        return $this;
    }

    public function getStatusId(): ?int
    {
        return $this->statusId;
    }

    public function setStatusId(?int $value): static
    {
        $this->statusId = $value;
        return $this;
    }
}
