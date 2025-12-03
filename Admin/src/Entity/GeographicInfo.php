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
 * Entity class for "geographic_info" table
 */
#[Entity]
#[Table(name: "geographic_info")]
class GeographicInfo extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "geographic_info_id_seq")]
    private int $id;

    #[Column(type: "string")]
    private string $name;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(type: "string", nullable: true)]
    private ?string $coordinates;

    #[Column(name: "area_sqkm", type: "decimal", nullable: true)]
    private ?string $areaSqkm;

    #[Column(type: "integer", nullable: true)]
    private ?int $population;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "info_type_id", type: "integer", nullable: true)]
    private ?int $infoTypeId;

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

    public function getDescription(): ?string
    {
        return HtmlDecode($this->description);
    }

    public function setDescription(?string $value): static
    {
        $this->description = RemoveXss($value);
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

    public function getAreaSqkm(): ?string
    {
        return $this->areaSqkm;
    }

    public function setAreaSqkm(?string $value): static
    {
        $this->areaSqkm = $value;
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

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $value): static
    {
        $this->createdAt = $value;
        return $this;
    }

    public function getInfoTypeId(): ?int
    {
        return $this->infoTypeId;
    }

    public function setInfoTypeId(?int $value): static
    {
        $this->infoTypeId = $value;
        return $this;
    }
}
