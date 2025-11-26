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
 * Entity class for "municipalities" table
 */
#[Entity]
#[Table(name: "municipalities")]
class Municipality extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "municipalities_id_seq")]
    private int $id;

    #[Column(type: "string", unique: true)]
    private string $name;

    #[Column(type: "integer", nullable: true)]
    private ?int $population;

    #[Column(name: "area_sqkm", type: "decimal", nullable: true)]
    private ?string $areaSqkm;

    #[Column(type: "string", nullable: true)]
    private ?string $coordinates;

    #[Column(name: "mayor_name", type: "string", nullable: true)]
    private ?string $mayorName;

    #[Column(name: "contact_number", type: "string", nullable: true)]
    private ?string $contactNumber;

    #[Column(type: "string", nullable: true)]
    private ?string $email;

    #[Column(name: "display_order", type: "integer", nullable: true)]
    private ?int $displayOrder;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

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

    public function getName(): string
    {
        return HtmlDecode($this->name);
    }

    public function setName(string $value): static
    {
        $this->name = RemoveXss($value);
        return $this;
    }

    public function getPopulation(): ?int
    {
        return $this->population;
    }

    public function setPopulation(?int $value): static
    {
        $this->population = $value;
        return $this;
    }

    public function getAreaSqkm(): ?string
    {
        return $this->areaSqkm;
    }

    public function setAreaSqkm(?string $value): static
    {
        $this->areaSqkm = $value;
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

    public function getMayorName(): ?string
    {
        return HtmlDecode($this->mayorName);
    }

    public function setMayorName(?string $value): static
    {
        $this->mayorName = RemoveXss($value);
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
}
