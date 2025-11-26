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
 * Entity class for "health_programs" table
 */
#[Entity]
#[Table(name: "health_programs")]
class HealthProgram extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "health_programs_id_seq")]
    private int $id;

    #[Column(name: "program_name", type: "string")]
    private string $programName;

    #[Column(type: "text")]
    private string $description;

    #[Column(type: "text", nullable: true)]
    private ?string $objectives;

    #[Column(name: "target_beneficiaries", type: "string", nullable: true)]
    private ?string $targetBeneficiaries;

    #[Column(name: "coverage_area", type: "string", nullable: true)]
    private ?string $coverageArea;

    #[Column(name: "implementation_date", type: "date", nullable: true)]
    private ?DateTime $implementationDate;

    #[Column(type: "string", nullable: true)]
    private ?string $status;

    #[Column(name: "contact_info", type: "text", nullable: true)]
    private ?string $contactInfo;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

    #[Column(name: "is_active", type: "boolean", nullable: true)]
    private ?bool $isActive;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    public function __construct()
    {
        $this->status = "active";
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

    public function getTargetBeneficiaries(): ?string
    {
        return HtmlDecode($this->targetBeneficiaries);
    }

    public function setTargetBeneficiaries(?string $value): static
    {
        $this->targetBeneficiaries = RemoveXss($value);
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

    public function getStatus(): ?string
    {
        return HtmlDecode($this->status);
    }

    public function setStatus(?string $value): static
    {
        $this->status = RemoveXss($value);
        return $this;
    }

    public function getContactInfo(): ?string
    {
        return HtmlDecode($this->contactInfo);
    }

    public function setContactInfo(?string $value): static
    {
        $this->contactInfo = RemoveXss($value);
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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $value): static
    {
        $this->isActive = $value;
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
