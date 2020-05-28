<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Blocmodule::class, mappedBy="categories", orphanRemoval=true)
     */
    private $blocmodules;

    public function __construct()
    {
        $this->blocmodules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Blocmodule[]
     */
    public function getBlocmodules(): Collection
    {
        return $this->blocmodules;
    }

    public function addBlocmodule(Blocmodule $blocmodule): self
    {
        if (!$this->blocmodules->contains($blocmodule)) {
            $this->blocmodules[] = $blocmodule;
            $blocmodule->setCategories($this);
        }

        return $this;
    }

    public function removeBlocmodule(Blocmodule $blocmodule): self
    {
        if ($this->blocmodules->contains($blocmodule)) {
            $this->blocmodules->removeElement($blocmodule);
            // set the owning side to null (unless already changed)
            if ($blocmodule->getCategories() === $this) {
                $blocmodule->setCategories(null);
            }
        }

        return $this;
    }
}
