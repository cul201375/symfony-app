<?php

namespace App\Entity;

use App\Repository\PokedexRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokedexRepository::class)]
class Pokedex
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'pokedexes')]
    #[ORM\JoinColumn(nullable: false)]
    private $idUser;

    #[ORM\ManyToMany(targetEntity: PokedexPokemon::class, mappedBy: 'idpokedex')]
    private $pokedexPokemon;

    public function __construct()
    {
        $this->pokedexPokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return Collection<int, PokedexPokemon>
     */
    public function getPokedexPokemon(): Collection
    {
        return $this->pokedexPokemon;
    }

    public function addPokedexPokemon(PokedexPokemon $pokedexPokemon): self
    {
        if (!$this->pokedexPokemon->contains($pokedexPokemon)) {
            $this->pokedexPokemon[] = $pokedexPokemon;
            $pokedexPokemon->addIdpokedex($this);
        }

        return $this;
    }

    public function removePokedexPokemon(PokedexPokemon $pokedexPokemon): self
    {
        if ($this->pokedexPokemon->removeElement($pokedexPokemon)) {
            $pokedexPokemon->removeIdpokedex($this);
        }

        return $this;
    }

}
