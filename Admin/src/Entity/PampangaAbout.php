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
 * Entity class for "pampanga_about" table
 */
#[Entity]
#[Table(name: "pampanga_about")]
class PampangaAbout extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "pampanga_about_id_seq")]
    private int $id;

    #[Column(name: "preview_text", type: "text", nullable: true)]
    private ?string $previewText;

    #[Column(name: "main_image", type: "string", nullable: true)]
    private ?string $mainImage;

    #[Column(name: "showcase_image_1", type: "string", nullable: true)]
    private ?string $showcaseImage1;

    #[Column(name: "showcase_image_2", type: "string", nullable: true)]
    private ?string $showcaseImage2;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): static
    {
        $this->id = $value;
        return $this;
    }

    public function getPreviewText(): ?string
    {
        return HtmlDecode($this->previewText);
    }

    public function setPreviewText(?string $value): static
    {
        $this->previewText = RemoveXss($value);
        return $this;
    }

    public function getMainImage(): ?string
    {
        return HtmlDecode($this->mainImage);
    }

    public function setMainImage(?string $value): static
    {
        $this->mainImage = RemoveXss($value);
        return $this;
    }

    public function getShowcaseImage1(): ?string
    {
        return HtmlDecode($this->showcaseImage1);
    }

    public function setShowcaseImage1(?string $value): static
    {
        $this->showcaseImage1 = RemoveXss($value);
        return $this;
    }

    public function getShowcaseImage2(): ?string
    {
        return HtmlDecode($this->showcaseImage2);
    }

    public function setShowcaseImage2(?string $value): static
    {
        $this->showcaseImage2 = RemoveXss($value);
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

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $value): static
    {
        $this->updatedAt = $value;
        return $this;
    }
}
