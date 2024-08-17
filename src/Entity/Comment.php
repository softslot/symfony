<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Carbon\CarbonImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'comments')]
#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private int $id;

    #[ORM\Column(name: 'message', type: Types::TEXT)]
    private string $message;

    #[ORM\Column(name: 'post_id')]
    private int $post_id;

    #[ORM\Column(name: 'created_at', type: Types::DATETIME_MUTABLE, nullable: false)]
    private CarbonImmutable $createdAt;

    #[ORM\Column(name: 'updated_at', type: Types::DATETIME_MUTABLE, nullable: false)]
    private CarbonImmutable $updatedAt;

    #[ORM\Column(name: 'deleted_at', type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?CarbonImmutable $deletedAt = null;

    public function __construct(
        string $message,
        int $post_id,
        ?CarbonImmutable $createdAt = null,
        ?CarbonImmutable $updatedAt = null,
    ) {
        $this->message = $message;
        $this->post_id = $post_id;
        $this->createdAt = $createdAt ?? CarbonImmutable::now();
        $this->updatedAt = $updatedAt ?? CarbonImmutable::now();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getPostId(): int
    {
        return $this->post_id;
    }

    public function getCreatedAt(): CarbonImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): CarbonImmutable
    {
        return $this->updatedAt;
    }

    public function getDeletedAt(): ?CarbonImmutable
    {
        return $this->deletedAt;
    }
}
