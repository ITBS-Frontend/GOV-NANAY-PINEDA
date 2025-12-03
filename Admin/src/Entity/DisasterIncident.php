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
 * Entity class for "disaster_incidents" table
 */
#[Entity]
#[Table(name: "disaster_incidents")]
class DisasterIncident extends AbstractEntity
{
    #[Id]
    #[Column(type: "integer", unique: true)]
    #[GeneratedValue(strategy: "SEQUENCE")]
    #[SequenceGenerator(sequenceName: "disaster_incidents_id_seq")]
    private int $id;

    #[Column(name: "incident_name", type: "string", nullable: true)]
    private ?string $incidentName;

    #[Column(name: "occurrence_date", type: "date")]
    private DateTime $occurrenceDate;

    #[Column(name: "affected_areas", type: "text", nullable: true)]
    private ?string $affectedAreas;

    #[Column(type: "integer", nullable: true)]
    private ?int $casualties;

    #[Column(name: "damages_estimated", type: "decimal", nullable: true)]
    private ?string $damagesEstimated;

    #[Column(name: "response_actions", type: "text", nullable: true)]
    private ?string $responseActions;

    #[Column(name: "lessons_learned", type: "text", nullable: true)]
    private ?string $lessonsLearned;

    #[Column(name: "created_at", type: "datetime", nullable: true)]
    private ?DateTime $createdAt;

    #[Column(name: "incident_type_id", type: "integer", nullable: true)]
    private ?int $incidentTypeId;

    public function __construct()
    {
        $this->casualties = 0;
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

    public function getIncidentName(): ?string
    {
        return HtmlDecode($this->incidentName);
    }

    public function setIncidentName(?string $value): static
    {
        $this->incidentName = RemoveXss($value);
        return $this;
    }

    public function getOccurrenceDate(): DateTime
    {
        return $this->occurrenceDate;
    }

    public function setOccurrenceDate(DateTime $value): static
    {
        $this->occurrenceDate = $value;
        return $this;
    }

    public function getAffectedAreas(): ?string
    {
        return HtmlDecode($this->affectedAreas);
    }

    public function setAffectedAreas(?string $value): static
    {
        $this->affectedAreas = RemoveXss($value);
        return $this;
    }

    public function getCasualties(): ?int
    {
        return $this->casualties;
    }

    public function setCasualties(?int $value): static
    {
        $this->casualties = $value;
        return $this;
    }

    public function getDamagesEstimated(): ?string
    {
        return $this->damagesEstimated;
    }

    public function setDamagesEstimated(?string $value): static
    {
        $this->damagesEstimated = $value;
        return $this;
    }

    public function getResponseActions(): ?string
    {
        return HtmlDecode($this->responseActions);
    }

    public function setResponseActions(?string $value): static
    {
        $this->responseActions = RemoveXss($value);
        return $this;
    }

    public function getLessonsLearned(): ?string
    {
        return HtmlDecode($this->lessonsLearned);
    }

    public function setLessonsLearned(?string $value): static
    {
        $this->lessonsLearned = RemoveXss($value);
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

    public function getIncidentTypeId(): ?int
    {
        return $this->incidentTypeId;
    }

    public function setIncidentTypeId(?int $value): static
    {
        $this->incidentTypeId = $value;
        return $this;
    }
}
