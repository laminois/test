<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Support
 *
 * @ORM\Table(name="SUPPORT")
 * @ORM\Entity(repositoryClass="App\Repository\SupportRepository")
 *
 * @ApiResource(
 *     attributes={"force_eager"=false},
 *     normalizationContext={"groups"={"support.read"}},
 *     denormalizationContext={"groups"={"support.read","support.write"}},
 *     itemOperations={
 *      "get"={"force_eager"=true},
 *      "delete",
 *      "put"
 *     },
 *     collectionOperations={
 *      "get"={"force_eager"=true},
 *      "post"={"method"="POST"},
 *     }
 * )
 */
class Support
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"support.read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"support.read","support.write"})
     */
    private $libelle;

    /**
     *
     * @ORM\ManyToOne(targetEntity=TypeSupport::class, cascade={"persist"}, inversedBy="support")
     * @ORM\JoinColumn(name="id_type_support", referencedColumnName="ID_TYPE_SUPPORT", nullable=false)
     * @Groups({"support.read","support.write"})
     * @ApiSubresource(maxDepth=1)
     */
    private $typeSupport;

    public function __construct()
    {
        $this->typeSupport = new ArrayCollection();
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
     * @return Support
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /******************************/
    /* TypeSupport                */
    /******************************/


    public function getTypeSupport()
    {
        return $this->typeSupport;
    }
    public function addAccount(TypeSupport $typeSupport): self
    {
        if (!$this->typeSupport->contains($typeSupport)) {
            $this->typeSupport[] = $typeSupport;
        }
        return $this;
    }
    public function removeAccount(TypeSupport $typeSupport): self
    {
        if ($this->typeSupport->contains($typeSupport)) {
            $this->typeSupport>removeElement($typeSupport);
        }
        return $this;
    }

    public function setTypeSupport(TypeSupport $typeSupport): self
    {
        $this->typeSupport = $typeSupport;
        return $this;
    }
}
