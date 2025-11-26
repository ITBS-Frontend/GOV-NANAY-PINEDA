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
 * Entity class for "tourism_destinations" table
 */
#[Entity]
#[Table(name: "tourism_destinations")]
class TourismDestination extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "tourism_destinations_id_seq")]
    private int $id;

    #[Column(name: "category_id", type: "integer", nullable: true)]
    private ?int $categoryId;

    #[Column(type: "string")]
    private string $name;

    #[Column(type: "text")]
    private string $description;

    #[Column(name: "full_description", type: "text", nullable: true)]
    private ?string $fullDescription;

    #[Column(type: "string")]
    private string $municipality;

    #[Column(type: "text", nullable: true)]
    private ?string $address;

    #[Column(type: "string", nullable: true)]
    private ?string $coordinates;

    #[Column(name: "entry_fee", type: "string", nullable: true)]
    private ?string $entryFee;

    #[Column(name: "operating_hours", type: "string", nullable: true)]
    private ?string $operatingHours;

    #[Column(name: "best_time_to_visit", type: "string", nullable: true)]
    private ?string $bestTimeToVisit;

    #[Column(name: "how_to_get_there", type: "text", nullable: true)]
    private ?string $howToGetThere;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

    #[Column(name: "is_featured", type: "boolean", nullable: true)]
    private ?bool $isFeatured;

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

    public function getName(): string
    {
        return HtmlDecode($this->name);
    }

    public function setName(string $value): static
    {
        $this->name = RemoveXss($value);
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

    public function getFullDescription(): ?string
    {
        return HtmlDecode($this->fullDescription);
    }

    public function setFullDescription(?string $value): static
    {
        $this->fullDescription = RemoveXss($value);
        return $this;
    }

    public function getMunicipality(): string
    {
        return HtmlDecode($this->municipality);
    }

    public function setMunicipality(string $value): static
    {
        $this->municipality = RemoveXss($value);
        return $this;
    }

    public function getAddress(): ?string
    {
        return HtmlDecode($this->address);
    }

    public function setAddress(?string $value): static
    {
        $this->address = RemoveXss($value);
        return $this;
    }

    public function getCoordinates(): ?string
    {
        return HtmlDecode($this->coordinates);
    }

    public function setCoordinates(?string $value): static
    {
        $this->coordinates = RemoveXss($value);
        return $this;
    }

    public function getEntryFee(): ?string
    {
        return HtmlDecode($this->entryFee);
    }

    public function setEntryFee(?string $value): static
    {
        $this->entryFee = RemoveXss($value);
        return $this;
    }

    public function getOperatingHours(): ?string
    {
        return HtmlDecode($this->operatingHours);
    }

    public function setOperatingHours(?string $value): static
    {
        $this->operatingHours = RemoveXss($value);
        return $this;
    }

    public function getBestTimeToVisit(): ?string
    {
        return HtmlDecode($this->bestTimeToVisit);
    }

    public function setBestTimeToVisit(?string $value): static
    {
        $this->bestTimeToVisit = RemoveXss($value);
        return $this;
    }

    public function getHowToGetThere(): ?string
    {
        return HtmlDecode($this->howToGetThere);
    }

    public function setHowToGetThere(?string $value): static
    {
        $this->howToGetThere = RemoveXss($value);
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
