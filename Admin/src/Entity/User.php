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
 * Entity class for "users" table
 */
#[Entity]
#[Table(name: "users")]
class User extends AbstractEntity
{
    #[Id]
    #[Column(name: "user_id", type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "users_user_id_seq")]
    private int $userId;

    #[Column(type: "string", unique: true)]
    private string $username;

    #[Column(type: "string")]
    private string $password;

    #[Column(type: "string", unique: true, nullable: true)]
    private ?string $email;

    #[Column(name: "first_name", type: "string", nullable: true)]
    private ?string $firstName;

    #[Column(name: "last_name", type: "string", nullable: true)]
    private ?string $lastName;

    #[Column(name: "user_level_id", type: "integer", nullable: true)]
    private ?int $userLevelId;

    #[Column(type: "boolean", nullable: true)]
    private ?bool $activated;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "updated_at", type: "datetime", nullable: true)]
    private ?DateTime $updatedAt;

    public function __construct()
    {
        $this->userLevelId = 0;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $value): static
    {
        $this->userId = $value;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $value): static
    {
        $this->username = $value;
        return $this;
    }

    public function getPassword(): string
    {
        return HtmlDecode($this->password);
    }

    public function setPassword(string $value): static
    {
        $this->password = RemoveXss($value);
        return $this;
    }

    public function getEmail(): ?string
    {
        return HtmlDecode($this->email);
    }

    public function setEmail(?string $value): static
    {
        $this->email = RemoveXss($value);
        return $this;
    }

    public function getFirstName(): ?string
    {
        return HtmlDecode($this->firstName);
    }

    public function setFirstName(?string $value): static
    {
        $this->firstName = RemoveXss($value);
        return $this;
    }

    public function getLastName(): ?string
    {
        return HtmlDecode($this->lastName);
    }

    public function setLastName(?string $value): static
    {
        $this->lastName = RemoveXss($value);
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

    public function getActivated(): ?bool
    {
        return $this->activated;
    }

    public function setActivated(?bool $value): static
    {
        $this->activated = $value;
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

    // Get login arguments
    public function getLoginArguments(): array
    {
        return [
            "userName" => $this->get('username'),
            "userId" => $this->get('user_id'),
            "parentUserId" => null,
            "userLevel" => $this->get('user_level_id') ?? AdvancedSecurity::ANONYMOUS_USER_LEVEL_ID,
            "userPrimaryKey" => $this->get('user_id'),
        ];
    }
}
