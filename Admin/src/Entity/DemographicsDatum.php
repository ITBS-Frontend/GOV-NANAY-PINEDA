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
 * Entity class for "demographics_data" table
 */
#[Entity]
#[Table(name: "demographics_data")]
class DemographicsDatum extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "demographics_data_id_seq")]
    private int $id;

    #[Column(type: "string")]
    private string $label;

    #[Column(type: "string")]
    private string $value;

    #[Column(type: "integer")]
    private int $year;

    #[Column(type: "string", nullable: true)]
    private ?string $source;

    #[Column(name: "display_order", type: "integer", nullable: true)]
    private ?int $displayOrder;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "data_type_id", type: "integer", nullable: true)]
    private ?int $dataTypeId;

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

    public function getLabel(): string
    {
        return HtmlDecode($this->label);
    }

    public function setLabel(string $value): static
    {
        $this->label = RemoveXss($value);
        return $this;
    }

    public function getValue(): string
    {
        return HtmlDecode($this->value);
    }

    public function setValue(string $value): static
    {
        $this->value = RemoveXss($value);
        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $value): static
    {
        $this->year = $value;
        return $this;
    }

    public function getSource(): ?string
    {
        return HtmlDecode($this->source);
    }

    public function setSource(?string $value): static
    {
        $this->source = RemoveXss($value);
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

    public function getDataTypeId(): ?int
    {
        return $this->dataTypeId;
    }

    public function setDataTypeId(?int $value): static
    {
        $this->dataTypeId = $value;
        return $this;
    }
}
