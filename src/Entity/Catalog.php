<?php

namespace App\Entity;

use App\Repository\CatalogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CatalogRepository::class)]
class Catalog implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'catalog_id')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    #[ORM\JoinColumn(referencedColumnName: 'catalog_id', onDelete: 'restrict')]
    private ?self $parent = null;

    #[ORM\Column]
    #[Assert\Choice(choices: self::TYPES)]
    #[Assert\NotBlank]
    private ?int $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $title = null;

    public const TYPE_FOUND = 1;

    public const TYPE_REGION = 2;

    public const TYPE_DISTRICT = 3;

    public const TYPE_NOMENCLATURE = 4;

    public const TYPE_PURPOSE = 5;

    public const TYPE_USING = 6;

    public const TYPES = [
        self::TYPE_FOUND,
        self::TYPE_REGION,
        self::TYPE_DISTRICT,
        self::TYPE_NOMENCLATURE,
        self::TYPE_PURPOSE,
        self::TYPE_USING,
    ];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'parent' => $this->getParent(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
        ];
    }
}
