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
 * Entity class for "quick_facts" table
 */
#[Entity]
#[Table(name: "quick_facts")]
class QuickFact extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "quick_facts_id_seq")]
    private int $id;

    #[Column(type: "string", nullable: true)]
    private ?string $icon;

    #[Column(type: "string", nullable: true)]
    private ?string $title;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(name: "display_order", type: "integer", nullable: true)]
    private ?int $displayOrder;

    #[Column(name: "is_active", type: "boolean", nullable: true)]
    private ?bool $isActive;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): static
    {
        $this->id = $value;
        return $this;
    }

    public function getIcon(): ?string
    {
        return HtmlDecode($this->icon);
    }

    public function setIcon(?string $value): static
    {
        $this->icon = RemoveXss($value);
        return $this;
    }

    public function getTitle(): ?string
    {
        return HtmlDecode($this->title);
    }

    public function setTitle(?string $value): static
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

    public function getDisplayOrder(): ?int
    {
        return $this->displayOrder;
    }

    public function setDisplayOrder(?int $value): static
    {
        $this->displayOrder = $value;
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
}
