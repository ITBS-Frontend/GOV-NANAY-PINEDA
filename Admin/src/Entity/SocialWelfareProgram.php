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
 * Entity class for "social_welfare_programs" table
 */
#[Entity]
#[Table(name: "social_welfare_programs")]
class SocialWelfareProgram extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "social_welfare_programs_id_seq")]
    private int $id;

    #[Column(name: "category_id", type: "integer", nullable: true)]
    private ?int $categoryId;

    #[Column(name: "program_name", type: "string")]
    private string $programName;

    #[Column(type: "text")]
    private string $description;

    #[Column(name: "eligibility_criteria", type: "text", nullable: true)]
    private ?string $eligibilityCriteria;

    #[Column(type: "text", nullable: true)]
    private ?string $benefits;

    #[Column(name: "how_to_apply", type: "text", nullable: true)]
    private ?string $howToApply;

    #[Column(name: "required_documents", type: "text", nullable: true)]
    private ?string $requiredDocuments;

    #[Column(name: "contact_info", type: "text", nullable: true)]
    private ?string $contactInfo;

    #[Column(name: "is_active", type: "boolean", nullable: true)]
    private ?bool $isActive;

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

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $value): static
    {
        $this->categoryId = $value;
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

    public function getEligibilityCriteria(): ?string
    {
        return HtmlDecode($this->eligibilityCriteria);
    }

    public function setEligibilityCriteria(?string $value): static
    {
        $this->eligibilityCriteria = RemoveXss($value);
        return $this;
    }

    public function getBenefits(): ?string
    {
        return HtmlDecode($this->benefits);
    }

    public function setBenefits(?string $value): static
    {
        $this->benefits = RemoveXss($value);
        return $this;
    }

    public function getHowToApply(): ?string
    {
        return HtmlDecode($this->howToApply);
    }

    public function setHowToApply(?string $value): static
    {
        $this->howToApply = RemoveXss($value);
        return $this;
    }

    public function getRequiredDocuments(): ?string
    {
        return HtmlDecode($this->requiredDocuments);
    }

    public function setRequiredDocuments(?string $value): static
    {
        $this->requiredDocuments = RemoveXss($value);
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
