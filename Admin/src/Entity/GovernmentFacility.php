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
 * Entity class for "government_facilities" table
 */
#[Entity]
#[Table(name: "government_facilities")]
class GovernmentFacility extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "government_facilities_id_seq")]
    private int $id;

    #[Column(type: "string")]
    private string $name;

    #[Column(type: "text")]
    private string $address;

    #[Column(type: "string", nullable: true)]
    private ?string $municipality;

    #[Column(name: "contact_number", type: "string", nullable: true)]
    private ?string $contactNumber;

    #[Column(type: "string", nullable: true)]
    private ?string $email;

    #[Column(name: "operating_hours", type: "string", nullable: true)]
    private ?string $operatingHours;

    #[Column(name: "services_offered", type: "text", nullable: true)]
    private ?string $servicesOffered;

    #[Column(type: "string", nullable: true)]
    private ?string $coordinates;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

    #[Column(name: "is_active", type: "boolean", nullable: true)]
    private ?bool $isActive;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "facility_type_id", type: "integer", nullable: true)]
    private ?int $facilityTypeId;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): static
    {
        $this->id = $value;
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

    public function getAddress(): string
    {
        return HtmlDecode($this->address);
    }

    public function setAddress(string $value): static
    {
        $this->address = RemoveXss($value);
        return $this;
    }

    public function getMunicipality(): ?string
    {
        return HtmlDecode($this->municipality);
    }

    public function setMunicipality(?string $value): static
    {
        $this->municipality = RemoveXss($value);
        return $this;
    }

    public function getContactNumber(): ?string
    {
        return HtmlDecode($this->contactNumber);
    }

    public function setContactNumber(?string $value): static
    {
        $this->contactNumber = RemoveXss($value);
        return $this;
    }

    public function getEmail(): ?string
    {
        return HtmlDecode($this->email);
    }

    public function setEmail(?string $value): static
    {
        $this->email = RemoveXss($value);
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

    public function getServicesOffered(): ?string
    {
        return HtmlDecode($this->servicesOffered);
    }

    public function setServicesOffered(?string $value): static
    {
        $this->servicesOffered = RemoveXss($value);
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

    public function getFacilityTypeId(): ?int
    {
        return $this->facilityTypeId;
    }

    public function setFacilityTypeId(?int $value): static
    {
        $this->facilityTypeId = $value;
        return $this;
    }
}
