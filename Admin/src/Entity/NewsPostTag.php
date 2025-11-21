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
 * Entity class for "news_post_tags" table
 */
#[Entity]
#[Table(name: "news_post_tags")]
class NewsPostTag extends AbstractEntity
{
    #[Id]
    #[Column(name: "post_id", type: "integer")]
    private int $postId;

    #[Id]
    #[Column(name: "tag_id", type: "integer")]
    private int $tagId;

    public function __construct(int $postId, int $tagId)
    {
        $this->postId = $postId;
        $this->tagId = $tagId;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function setPostId(int $value): static
    {
        $this->postId = $value;
        return $this;
    }

    public function getTagId(): int
    {
        return $this->tagId;
    }

    public function setTagId(int $value): static
    {
        $this->tagId = $value;
        return $this;
    }
}
