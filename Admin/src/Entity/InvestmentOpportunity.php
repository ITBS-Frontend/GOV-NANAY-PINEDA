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
 * Entity class for "investment_opportunities" table
 */
#[Entity]
#[Table(name: "investment_opportunities")]
class InvestmentOpportunity extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "investment_opportunities_id_seq")]
    private int $id;

    #[Column(name: "opportunity_title", type: "string")]
    private string $opportunityTitle;

    #[Column(type: "string")]
    private string $sector;

    #[Column(type: "text")]
    private string $description;

    #[Column(type: "string", nullable: true)]
    private ?string $location;

    #[Column(name: "estimated_investment", type: "string", nullable: true)]
    private ?string $estimatedInvestment;

    #[Column(name: "potential_returns", type: "text", nullable: true)]
    private ?string $potentialReturns;

    #[Column(type: "text", nullable: true)]
    private ?string $incentives;

    #[Column(name: "contact_info", type: "text", nullable: true)]
    private ?string $contactInfo;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

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

    public function getOpportunityTitle(): string
    {
        return HtmlDecode($this->opportunityTitle);
    }

    public function setOpportunityTitle(string $value): static
    {
        $this->opportunityTitle = RemoveXss($value);
        return $this;
    }

    public function getSector(): string
    {
        return HtmlDecode($this->sector);
    }

    public function setSector(string $value): static
    {
        $this->sector = RemoveXss($value);
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

    public function getLocation(): ?string
    {
        return HtmlDecode($this->location);
    }

    public function setLocation(?string $value): static
    {
        $this->location = RemoveXss($value);
        return $this;
    }

    public function getEstimatedInvestment(): ?string
    {
        return HtmlDecode($this->estimatedInvestment);
    }

    public function setEstimatedInvestment(?string $value): static
    {
        $this->estimatedInvestment = RemoveXss($value);
        return $this;
    }

    public function getPotentialReturns(): ?string
    {
        return HtmlDecode($this->potentialReturns);
    }

    public function setPotentialReturns(?string $value): static
    {
        $this->potentialReturns = RemoveXss($value);
        return $this;
    }

    public function getIncentives(): ?string
    {
        return HtmlDecode($this->incentives);
    }

    public function setIncentives(?string $value): static
    {
        $this->incentives = RemoveXss($value);
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
