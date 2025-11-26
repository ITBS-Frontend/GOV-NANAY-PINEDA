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
 * Entity class for "disaster_preparedness" table
 */
#[Entity]
#[Table(name: "disaster_preparedness")]
class DisasterPreparedness extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "disaster_preparedness_id_seq")]
    private int $id;

    #[Column(name: "disaster_type", type: "string")]
    private string $disasterType;

    #[Column(name: "preparedness_guide", type: "text")]
    private string $preparednessGuide;

    #[Column(name: "emergency_hotlines", type: "text", nullable: true)]
    private ?string $emergencyHotlines;

    #[Column(name: "evacuation_centers", type: "text", nullable: true)]
    private ?string $evacuationCenters;

    #[Column(name: "relief_procedures", type: "text", nullable: true)]
    private ?string $reliefProcedures;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

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

    public function getDisasterType(): string
    {
        return HtmlDecode($this->disasterType);
    }

    public function setDisasterType(string $value): static
    {
        $this->disasterType = RemoveXss($value);
        return $this;
    }

    public function getPreparednessGuide(): string
    {
        return HtmlDecode($this->preparednessGuide);
    }

    public function setPreparednessGuide(string $value): static
    {
        $this->preparednessGuide = RemoveXss($value);
        return $this;
    }

    public function getEmergencyHotlines(): ?string
    {
        return HtmlDecode($this->emergencyHotlines);
    }

    public function setEmergencyHotlines(?string $value): static
    {
        $this->emergencyHotlines = RemoveXss($value);
        return $this;
    }

    public function getEvacuationCenters(): ?string
    {
        return HtmlDecode($this->evacuationCenters);
    }

    public function setEvacuationCenters(?string $value): static
    {
        $this->evacuationCenters = RemoveXss($value);
        return $this;
    }

    public function getReliefProcedures(): ?string
    {
        return HtmlDecode($this->reliefProcedures);
    }

    public function setReliefProcedures(?string $value): static
    {
        $this->reliefProcedures = RemoveXss($value);
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
