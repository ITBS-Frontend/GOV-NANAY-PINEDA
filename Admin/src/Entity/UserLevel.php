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
 * Entity class for "user_levels" table
 */
#[Entity]
#[Table(name: "user_levels")]
class UserLevel extends AbstractEntity
{
    #[Id]
    #[Column(name: "user_level_id", type: "integer", unique: true)]
    private int $userLevelId;

    #[Column(name: "user_level_name", type: "string")]
    private string $userLevelName;

    #[Column(type: "integer", nullable: true)]
    private ?int $hierarchy;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?DateTime $updatedAt;

    public function __construct()
    {
        $this->hierarchy = 0;
    }

    public function getUserLevelId(): int
    {
        return $this->userLevelId;
    }

    public function setUserLevelId(int $value): static
    {
        $this->userLevelId = $value;
        return $this;
    }

    public function getUserLevelName(): string
    {
        return HtmlDecode($this->userLevelName);
    }

    public function setUserLevelName(string $value): static
    {
        $this->userLevelName = RemoveXss($value);
        return $this;
    }

    public function getHierarchy(): ?int
    {
        return $this->hierarchy;
    }

    public function setHierarchy(?int $value): static
    {
        $this->hierarchy = $value;
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
