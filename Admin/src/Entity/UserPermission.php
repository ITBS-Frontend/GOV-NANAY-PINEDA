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
 * Entity class for "user_permissions" table
 */
#[Entity]
#[Table(name: "user_permissions")]
class UserPermission extends AbstractEntity
{
    #[Id]
    #[Column(name: "permission_id", type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "user_permissions_permission_id_seq")]
    private int $permissionId;

    #[Column(name: "user_level_id", type: "integer", nullable: true)]
    private ?int $userLevelId;

    #[Column(name: "table_name", type: "string")]
    private string $tableName;

    #[Column(type: "integer", nullable: true)]
    private ?int $permission;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    public function __construct()
    {
        $this->permission = 0;
    }

    public function getPermissionId(): int
    {
        return $this->permissionId;
    }

    public function setPermissionId(int $value): static
    {
        $this->permissionId = $value;
        return $this;
    }

    public function getUserLevelId(): ?int
    {
        return $this->userLevelId;
    }

    public function setUserLevelId(?int $value): static
    {
        $this->userLevelId = $value;
        return $this;
    }

    public function getTableName(): string
    {
        return HtmlDecode($this->tableName);
    }

    public function setTableName(string $value): static
    {
        $this->tableName = RemoveXss($value);
        return $this;
    }

    public function getPermission(): ?int
    {
        return $this->permission;
    }

    public function setPermission(?int $value): static
    {
        $this->permission = $value;
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
