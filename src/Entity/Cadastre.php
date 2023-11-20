<?php

namespace App\Entity;

use App\Repository\CadastreRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity(repositoryClass: CadastreRepository::class)]
class Cadastre implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'cadastre_id')]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $yearCadastreAdd = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?DateTimeInterface $actualizeAt = null;

    #[ORM\Column(length: 255)]
    private ?string $cadastreNumber = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(referencedColumnName: 'catalog_id', nullable: false, onDelete: 'restrict')]
    private ?Catalog $district = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(referencedColumnName: 'catalog_id', nullable: false, onDelete: 'restrict')]
    private ?Catalog $nomenclature = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $address = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(referencedColumnName: 'catalog_id', nullable: false, onDelete: 'restrict')]
    private ?Catalog $purpose = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $drillingNumber = null;

    #[ORM\Column(nullable: true)]
    private ?int $drillingStart = null;

    #[ORM\Column(nullable: true)]
    private ?int $drillingEnd = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $report = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 3, nullable: true)]
    private ?string $depth = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 3, nullable: true)]
    private ?string $mouth = null;

    #[ORM\Column(name: '`limit`', type: Types::DECIMAL, precision: 6, scale: 3, nullable: true)]
    private ?string $balance = null;

    #[ORM\Column(name: 'horizon_number_1', length: 5, nullable: true)]
    private ?string $horizonNumber1 = null;

    #[ORM\Column(name: 'horizon_number_2', length: 5, nullable: true)]
    private ?string $horizonNumber2 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?DateTimeInterface $testDate = null;

    #[ORM\Column]
    private ?int $noWater = null;

    #[ORM\ManyToMany(targetEntity: Catalog::class)]
    #[ORM\JoinTable(
        name: 'cadastre_found',
        joinColumns: [new ORM\JoinColumn(name: 'cadastre_id', referencedColumnName: 'cadastre_id', onDelete: 'cascade')],
        inverseJoinColumns: [new ORM\InverseJoinColumn(name: 'found_id', referencedColumnName: 'catalog_id', onDelete: 'restrict')]
    )]
    private Collection $founds;

    #[ORM\ManyToMany(targetEntity: Catalog::class)]
    #[ORM\JoinTable(
        name: 'cadastre_target',
        joinColumns: [new ORM\JoinColumn(name: 'cadastre_id', referencedColumnName: 'cadastre_id', onDelete: 'cascade')],
        inverseJoinColumns: [new ORM\InverseJoinColumn(name: 'target_id', referencedColumnName: 'catalog_id', onDelete: 'restrict')]
    )]
    private Collection $targets;

    public function __construct()
    {
        $this->founds = new ArrayCollection();
        $this->targets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearCadastreAdd(): ?int
    {
        return $this->yearCadastreAdd;
    }

    public function setYearCadastreAdd(int $yearCadastreAdd): static
    {
        $this->yearCadastreAdd = $yearCadastreAdd;

        return $this;
    }

    public function getActualizeAt(): ?DateTimeInterface
    {
        return $this->actualizeAt;
    }

    public function setActualizeAt(?DateTimeInterface $actualizeAt): static
    {
        $this->actualizeAt = $actualizeAt;

        return $this;
    }

    public function getCadastreNumber(): ?string
    {
        return $this->cadastreNumber;
    }

    public function setCadastreNumber(string $cadastreNumber): static
    {
        $this->cadastreNumber = $cadastreNumber;

        return $this;
    }

    public function getDistrict(): ?Catalog
    {
        return $this->district;
    }

    public function setDistrict(?Catalog $district): static
    {
        $this->district = $district;

        return $this;
    }

    public function getNomenclature(): ?Catalog
    {
        return $this->nomenclature;
    }

    public function setNomenclature(?Catalog $nomenclature): static
    {
        $this->nomenclature = $nomenclature;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPurpose(): ?Catalog
    {
        return $this->purpose;
    }

    public function setPurpose(?Catalog $purpose): static
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function getDrillingNumber(): ?string
    {
        return $this->drillingNumber;
    }

    public function setDrillingNumber(?string $drillingNumber): static
    {
        $this->drillingNumber = $drillingNumber;

        return $this;
    }

    public function getDrillingStart(): ?int
    {
        return $this->drillingStart;
    }

    public function setDrillingStart(?int $drillingStart): static
    {
        $this->drillingStart = $drillingStart;

        return $this;
    }

    public function getDrillingEnd(): ?int
    {
        return $this->drillingEnd;
    }

    public function setDrillingEnd(?int $drillingEnd): static
    {
        $this->drillingEnd = $drillingEnd;

        return $this;
    }

    public function getReport(): ?string
    {
        return $this->report;
    }

    public function setReport(?string $report): static
    {
        $this->report = $report;

        return $this;
    }

    public function getDepth(): ?string
    {
        return $this->depth;
    }

    public function setDepth(?string $depth): static
    {
        $this->depth = $depth;

        return $this;
    }

    public function getMouth(): ?string
    {
        return $this->mouth;
    }

    public function setMouth(?string $mouth): static
    {
        $this->mouth = $mouth;

        return $this;
    }

    public function getBalance(): ?string
    {
        return $this->balance;
    }

    public function setBalance(?string $balance): static
    {
        $this->balance = $balance;

        return $this;
    }

    public function getHorizonNumber1(): ?string
    {
        return $this->horizonNumber1;
    }

    public function setHorizonNumber1(?string $horizonNumber1): static
    {
        $this->horizonNumber1 = $horizonNumber1;

        return $this;
    }

    public function getHorizonNumber2(): ?string
    {
        return $this->horizonNumber2;
    }

    public function setHorizonNumber2(?string $horizonNumber2): static
    {
        $this->horizonNumber2 = $horizonNumber2;

        return $this;
    }

    public function getTestDate(): ?DateTimeInterface
    {
        return $this->testDate;
    }

    public function setTestDate(?DateTimeInterface $testDate): static
    {
        $this->testDate = $testDate;

        return $this;
    }

    public function getNoWater(): ?int
    {
        return $this->noWater;
    }

    public function setNoWater(int $noWater): static
    {
        $this->noWater = $noWater;

        return $this;
    }

    /**
     * @return Collection<int, Catalog>
     */
    public function getFounds(): Collection
    {
        return $this->founds;
    }

    public function addFound(Catalog $found): static
    {
        if (!$this->founds->contains($found)) {
            $this->founds->add($found);
        }

        return $this;
    }

    public function removeFound(Catalog $found): static
    {
        $this->founds->removeElement($found);

        return $this;
    }

    /**
     * @return Collection<int, Catalog>
     */
    public function getTargets(): Collection
    {
        return $this->targets;
    }

    public function addTarget(Catalog $target): static
    {
        if (!$this->targets->contains($target)) {
            $this->targets->add($target);
        }

        return $this;
    }

    public function removeTarget(Catalog $target): static
    {
        $this->targets->removeElement($target);

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'district' => $this->getDistrict(),
            'nomenclature' => $this->getNomenclature(),
            'purpose' => $this->getPurpose(),
            'year_cadastre_add' => $this->getYearCadastreAdd(),
            'actualize_at' => $this->getActualizeAt(),
            'cadastre_number' => $this->getCadastreNumber(),
            'address' => $this->getAddress(),
            'drilling_number' => $this->getDrillingNumber(),
            'drilling_start' => $this->getDrillingStart(),
            'drilling_end' => $this->getDrillingEnd(),
            'report' => $this->getReport(),
            'depth' => $this->getDepth(),
            'mouth' => $this->getMouth(),
            'balance' => $this->getBalance(),
            'horizon_number_1' => $this->getHorizonNumber1(),
            'horizon_number_2' => $this->getHorizonNumber2(),
            'test_date' => $this->getTestDate(),
            'no_water' => $this->getNoWater(),
            'founds' => $this->getFounds()->toArray(),
            'targets' => $this->getTargets()->toArray(),
        ];
    }
}
