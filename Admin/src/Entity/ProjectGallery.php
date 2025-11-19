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
 * Entity class for "project_gallery" table
 */
#[Entity]
#[Table(name: "project_gallery")]
class ProjectGallery extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "project_gallery_id_seq")]
    private int $id;

    #[Column(name: "project_id", type: "integer", nullable: true)]
    private ?int $projectId;

    #[Column(name: "image_path", type: "string")]
    private string $imagePath;

    #[Column(type: "string", nullable: true)]
    private ?string $caption;

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

    public function getProjectId(): ?int
    {
        return $this->projectId;
    }

    public function setProjectId(?int $value): static
    {
        $this->projectId = $value;
        return $this;
    }

    public function getImagePath(): string
    {
        return HtmlDecode($this->imagePath);
    }

    public function setImagePath(string $value): static
    {
        $this->imagePath = RemoveXss($value);
        return $this;
    }

    public function getCaption(): ?string
    {
        return HtmlDecode($this->caption);
    }

    public function setCaption(?string $value): static
    {
        $this->caption = RemoveXss($value);
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
