<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * TypeSupport
 *
 * @ORM\Table(name="TYPE_SUPPORT")
 * @ORM\Entity(repositoryClass="App\Repository\TypeSupportRepository")
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"typeSupport"}},
 * )
 */
class TypeSupport
{
    /**
     * @var int
     *
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="ID_TYPE_SUPPORT",type="integer", unique=true)
     * @Groups({"typeSupport","support.write"})
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Groups({"support.read","typeSupport"})
     */
    private $libelle;

    /**
     * @var Support
     *
     * @ORM\OneToMany(targetEntity=Support::class, cascade={"persist"}, fetch="EXTRA_LAZY", mappedBy="type_support")
     * @ORM\JoinColumn(name="support", referencedColumnName="id")
     * @Groups({"support.write"})
     */
    private $support;

    public function __construct()
    {

    }

    public function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     * @return TypeSupport
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getSupport()
    {
        return $this->support;
    }
}
