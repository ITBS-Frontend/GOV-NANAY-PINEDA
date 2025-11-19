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
 * Entity class for "projects" table
 */
#[Entity]
#[Table(name: "projects")]
class Project extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "projects_id_seq")]
    private int $id;

    #[Column(type: "string")]
    private string $title;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(name: "category_id", type: "integer", nullable: true)]
    private ?int $categoryId;

    #[Column(name: "project_number", type: "integer", nullable: true)]
    private ?int $projectNumber;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

    #[Column(name: "is_featured", type: "boolean", nullable: true)]
    private ?bool $isFeatured;

    #[Column(name: "project_date", type: "date", nullable: true)]
    private ?DateTime $projectDate;

    #[Column(name: "budget_amount", type: "decimal", nullable: true)]
    private ?string $budgetAmount;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "full_description", type: "text", nullable: true)]
    private ?string $fullDescription;

    #[Column(type: "text", nullable: true)]
    private ?string $objectives;

    #[Column(type: "text", nullable: true)]
    private ?string $impact;

    #[Column(type: "string", nullable: true)]
    private ?string $location;

    #[Column(name: "start_date", type: "date", nullable: true)]
    private ?DateTime $startDate;

    #[Column(name: "end_date", type: "date", nullable: true)]
    private ?DateTime $endDate;

    #[Column(type: "string", nullable: true)]
    private ?string $status;

    public function __construct()
    {
        $this->status = "completed";
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

    public function getTitle(): string
    {
        return HtmlDecode($this->title);
    }

    public function setTitle(string $value): static
    {
        $this->title = RemoveXss($value);
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

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $value): static
    {
        $this->categoryId = $value;
        return $this;
    }

    public function getProjectNumber(): ?int
    {
        return $this->projectNumber;
    }

    public function setProjectNumber(?int $value): static
    {
        $this->projectNumber = $value;
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

    public function getIsFeatured(): ?bool
    {
        return $this->isFeatured;
    }

    public function setIsFeatured(?bool $value): static
    {
        $this->isFeatured = $value;
        return $this;
    }

    public function getProjectDate(): ?DateTime
    {
        return $this->projectDate;
    }

    public function setProjectDate(?DateTime $value): static
    {
        $this->projectDate = $value;
        return $this;
    }

    public function getBudgetAmount(): ?string
    {
        return $this->budgetAmount;
    }

    public function setBudgetAmount(?string $value): static
    {
        $this->budgetAmount = $value;
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

    public function getFullDescription(): ?string
    {
        return HtmlDecode($this->fullDescription);
    }

    public function setFullDescription(?string $value): static
    {
        $this->fullDescription = RemoveXss($value);
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

    public function getImpact(): ?string
    {
        return HtmlDecode($this->impact);
    }

    public function setImpact(?string $value): static
    {
        $this->impact = RemoveXss($value);
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

    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(?DateTime $value): static
    {
        $this->startDate = $value;
        return $this;
    }

    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(?DateTime $value): static
    {
        $this->endDate = $value;
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
}
