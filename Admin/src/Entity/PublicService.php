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
 * Entity class for "public_services" table
 */
#[Entity]
#[Table(name: "public_services")]
class PublicService extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "public_services_id_seq")]
    private int $id;

    #[Column(name: "category_id", type: "integer", nullable: true)]
    private ?int $categoryId;

    #[Column(name: "service_name", type: "string")]
    private string $serviceName;

    #[Column(type: "text", nullable: true)]
    private ?string $description;

    #[Column(type: "text", nullable: true)]
    private ?string $requirements;

    #[Column(name: "process_steps", type: "text", nullable: true)]
    private ?string $processSteps;

    #[Column(name: "processing_time", type: "string", nullable: true)]
    private ?string $processingTime;

    #[Column(type: "string", nullable: true)]
    private ?string $fees;

    #[Column(name: "contact_info", type: "text", nullable: true)]
    private ?string $contactInfo;

    #[Column(name: "online_link", type: "string", nullable: true)]
    private ?string $onlineLink;

    #[Column(name: "display_order", type: "integer", nullable: true)]
    private ?int $displayOrder;

    #[Column(name: "is_active", type: "boolean", nullable: true)]
    private ?bool $isActive;

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

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    public function setCategoryId(?int $value): static
    {
        $this->categoryId = $value;
        return $this;
    }

    public function getServiceName(): string
    {
        return HtmlDecode($this->serviceName);
    }

    public function setServiceName(string $value): static
    {
        $this->serviceName = RemoveXss($value);
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

    public function getRequirements(): ?string
    {
        return HtmlDecode($this->requirements);
    }

    public function setRequirements(?string $value): static
    {
        $this->requirements = RemoveXss($value);
        return $this;
    }

    public function getProcessSteps(): ?string
    {
        return HtmlDecode($this->processSteps);
    }

    public function setProcessSteps(?string $value): static
    {
        $this->processSteps = RemoveXss($value);
        return $this;
    }

    public function getProcessingTime(): ?string
    {
        return HtmlDecode($this->processingTime);
    }

    public function setProcessingTime(?string $value): static
    {
        $this->processingTime = RemoveXss($value);
        return $this;
    }

    public function getFees(): ?string
    {
        return HtmlDecode($this->fees);
    }

    public function setFees(?string $value): static
    {
        $this->fees = RemoveXss($value);
        return $this;
    }

    public function getContactInfo(): ?string
    {
        return HtmlDecode($this->contactInfo);
    }

    public function setContactInfo(?string $value): static
    {
        $this->contactInfo = RemoveXss($value);
        return $this;
    }

    public function getOnlineLink(): ?string
    {
        return HtmlDecode($this->onlineLink);
    }

    public function setOnlineLink(?string $value): static
    {
        $this->onlineLink = RemoveXss($value);
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
