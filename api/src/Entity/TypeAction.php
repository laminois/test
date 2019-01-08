<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TypeActionRepository")
 */
class TypeAction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="ID_TYPE_ACTION", type="integer")
     * @Groups({"action.write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"action.read"})
     */
    private $libelle;

    /**
     * @var Action
     *
     * @ORM\OneToMany(targetEntity=Action::class, cascade={"persist"}, fetch="EXTRA_LAZY", mappedBy="type_action")
     * @ORM\JoinColumn(name="action", referencedColumnName="ID_ACTION")
     * @Groups({"action.write"})
     */
    private $action;

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
     * @return TypeAction
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Action
     */
    public function getAction()
    {
        return $this->action;
    }
}
