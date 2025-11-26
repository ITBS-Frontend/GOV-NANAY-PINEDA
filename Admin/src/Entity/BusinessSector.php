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
 * Entity class for "business_sectors" table
 */
#[Entity]
#[Table(name: "business_sectors")]
class BusinessSector extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "business_sectors_id_seq")]
    private int $id;

    #[Column(name: "sector_name", type: "string")]
    private string $sectorName;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(name: "number_of_establishments", type: "integer", nullable: true)]
    private ?int $numberOfEstablishments;

    #[Column(name: "employment_generated", type: "integer", nullable: true)]
    private ?int $employmentGenerated;

    #[Column(name: "contribution_to_gdp", type: "decimal", nullable: true)]
    private ?string $contributionToGdp;

    #[Column(name: "icon_class", type: "string", nullable: true)]
    private ?string $iconClass;

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

    public function getSectorName(): string
    {
        return HtmlDecode($this->sectorName);
    }

    public function setSectorName(string $value): static
    {
        $this->sectorName = RemoveXss($value);
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

    public function getNumberOfEstablishments(): ?int
    {
        return $this->numberOfEstablishments;
    }

    public function setNumberOfEstablishments(?int $value): static
    {
        $this->numberOfEstablishments = $value;
        return $this;
    }

    public function getEmploymentGenerated(): ?int
    {
        return $this->employmentGenerated;
    }

    public function setEmploymentGenerated(?int $value): static
    {
        $this->employmentGenerated = $value;
        return $this;
    }

    public function getContributionToGdp(): ?string
    {
        return $this->contributionToGdp;
    }

    public function setContributionToGdp(?string $value): static
    {
        $this->contributionToGdp = $value;
        return $this;
    }

    public function getIconClass(): ?string
    {
        return HtmlDecode($this->iconClass);
    }

    public function setIconClass(?string $value): static
    {
        $this->iconClass = RemoveXss($value);
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
