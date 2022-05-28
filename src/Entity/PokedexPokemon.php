<?php

namespace App\Entity;

use App\Repository\PokedexPokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokedexPokemonRepository::class)]
class PokedexPokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToMany(targetEntity: Pokedex::class, inversedBy: 'pokedexPokemon')]
    private $idpokedex;

    #[ORM\ManyToMany(targetEntity: Pokemon::class, inversedBy: 'pokedexPokemon')]
    private $idpokemon;

    public function __construct()
    {
        $this->idpokedex = new ArrayCollection();
        $this->idpokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, pokedex>
     */
    public function getIdpokedex(): Collection
    {
        return $this->idpokedex;
    }

    public function addIdpokedex(pokedex $idpokedex): self
    {
        if (!$this->idpokedex->contains($idpokedex)) {
            $this->idpokedex[] = $idpokedex;
        }

        return $this;
    }

    public function removeIdpokedex(pokedex $idpokedex): self
    {
        $this->idpokedex->removeElement($idpokedex);

        return $this;
    }

    /**
     * @return Collection<int, pokemon>
     */
    public function getIdpokemon(): Collection
    {
        return $this->idpokemon;
    }

    public function addIdpokemon(pokemon $idpokemon): self
    {
        if (!$this->idpokemon->contains($idpokemon)) {
            $this->idpokemon[] = $idpokemon;
        }

        return $this;
    }

    public function removeIdpokemon(pokemon $idpokemon): self
    {
        $this->idpokemon->removeElement($idpokemon);

        return $this;
    }
}
