<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActionRepository")
 * @ApiResource(
 *     attributes={"force_eager"=false},
 *     normalizationContext={"groups"={"action.read"}},
 *     denormalizationContext={"groups"={"action.read","action.write"}},
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
 *
 * @ApiFilter(SearchFilter::class, properties={"typeAction" : "exact"})
 */
class Action
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="ID_ACTION", type="integer")
     * @Groups({"action.read"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     * @Groups({"action.read","action.write"})
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="priorite", type="integer", nullable=true)
     * @Groups({"action.read","action.write"})
     */
    private $priorite;

    /**
     * @var TypeAction
     *
     * @ORM\ManyToOne(targetEntity=TypeAction::class, cascade={"persist"}, inversedBy="action")
     * @ORM\JoinColumn(name="ID_TYPE_ACTION", referencedColumnName="ID_TYPE_ACTION", nullable=false)
     * @Groups({"action.read","action.write"})
     */
    private $typeAction;

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
     * @return Action
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPriorite(): ?int
    {
        return $this->priorite;
    }

    /**
     * @param int|null $priorite
     * @return Action
     */
    public function setPriorite(?int $priorite): self
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * @return TypeAction|null
     */
    public function getTypeAction(): ?TypeAction
    {
        return $this->typeAction;
    }

    /**
     * @param TypeAction|null $typeAction
     * @return Action
     */
    public function setTypeAction(?TypeAction $typeAction): self
    {
        $this->typeAction = $typeAction;

        return $this;
    }

    
}
