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
 * Entity class for "news_posts" table
 */
#[Entity]
#[Table(name: "news_posts")]
class NewsPost extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "news_posts_id_seq")]
    private int $id;

    #[Column(type: "string")]
    private string $title;

    #[Column(type: "string", unique: true)]
    private string $slug;

    #[Column(type: "text", nullable: true)]
    private ?string $excerpt;

    #[Column(type: "text")]
    private string $content;

    #[Column(name: "category_id", type: "integer", nullable: true)]
    private ?int $categoryId;

    #[Column(name: "news_type_id", type: "integer", nullable: true)]
    private ?int $newsTypeId;

    #[Column(name: "featured_image", type: "string", nullable: true)]
    private ?string $featuredImage;

    #[Column(name: "author_name", type: "string", nullable: true)]
    private ?string $authorName;

    #[Column(name: "is_featured", type: "boolean", nullable: true)]
    private ?bool $isFeatured;

    #[Column(name: "is_published", type: "boolean", nullable: true)]
    private ?bool $isPublished;

    #[Column(name: "published_date", type: "datetime", nullable: true)]
    private ?DateTime $publishedDate;

    #[Column(name: "views_count", type: "integer", nullable: true)]
    private ?int $viewsCount;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?DateTime $updatedAt;

    public function __construct()
    {
        $this->authorName = "office of gov. lilia pineda";
        $this->viewsCount = 0;
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

    public function getTitle(): string
    {
        return HtmlDecode($this->title);
    }

    public function setTitle(string $value): static
    {
        $this->title = RemoveXss($value);
        return $this;
    }

    public function getSlug(): string
    {
        return HtmlDecode($this->slug);
    }

    public function setSlug(string $value): static
    {
        $this->slug = RemoveXss($value);
        return $this;
    }

    public function getExcerpt(): ?string
    {
        return HtmlDecode($this->excerpt);
    }

    public function setExcerpt(?string $value): static
    {
        $this->excerpt = RemoveXss($value);
        return $this;
    }

    public function getContent(): string
    {
        return HtmlDecode($this->content);
    }

    public function setContent(string $value): static
    {
        $this->content = RemoveXss($value);
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

    public function getNewsTypeId(): ?int
    {
        return $this->newsTypeId;
    }

    public function setNewsTypeId(?int $value): static
    {
        $this->newsTypeId = $value;
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

    public function getAuthorName(): ?string
    {
        return HtmlDecode($this->authorName);
    }

    public function setAuthorName(?string $value): static
    {
        $this->authorName = RemoveXss($value);
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

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(?bool $value): static
    {
        $this->isPublished = $value;
        return $this;
    }

    public function getPublishedDate(): ?DateTime
    {
        return $this->publishedDate;
    }

    public function setPublishedDate(?DateTime $value): static
    {
        $this->publishedDate = $value;
        return $this;
    }

    public function getViewsCount(): ?int
    {
        return $this->viewsCount;
    }

    public function setViewsCount(?int $value): static
    {
        $this->viewsCount = $value;
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
