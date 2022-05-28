<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $pokemon_name;

    #[ORM\Column(type: 'string', length: 255)]
    private $base_form;

    #[ORM\Column(type: 'string', length: 255)]
    private $shiny_form;

    #[ORM\Column(type: 'json')]
    private $abilities = [];

    #[ORM\Column(type: 'string', length: 255)]
    private $region;

    #[ORM\Column(type: 'string', length: 400)]
    private $front_img;

    #[ORM\Column(type: 'string', length: 400)]
    private $back_img;

    #[ORM\Column(type: 'integer')]
    private $base_xp;

    #[ORM\Column(type: 'integer')]
    private $base_hp;

    #[ORM\Column(type: 'json')]
    private $evolutions = [];

    #[ORM\ManyToOne(targetEntity: gender::class, inversedBy: 'pokemon')]
    #[ORM\JoinColumn(nullable: false)]
    private $genero;

    #[ORM\ManyToMany(targetEntity: PokedexPokemon::class, mappedBy: 'idpokemon')]
    private $pokedexPokemon;

    public function __construct()
    {
        $this->pokedexPokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemonName(): ?string
    {
        return $this->pokemon_name;
    }

    public function setPokemonName(string $pokemon_name): self
    {
        $this->pokemon_name = $pokemon_name;

        return $this;
    }

    public function getBaseForm(): ?string
    {
        return $this->base_form;
    }

    public function setBaseForm(string $base_form): self
    {
        $this->base_form = $base_form;

        return $this;
    }

    public function getShinyForm(): ?string
    {
        return $this->shiny_form;
    }

    public function setShinyForm(string $shiny_form): self
    {
        $this->shiny_form = $shiny_form;

        return $this;
    }

    public function getAbilities(): ?array
    {
        return $this->abilities;
    }

    public function setAbilities(string $abilities): self
    {
        $this->abilities = $abilities;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getFrontImg(): ?string
    {
        return $this->front_img;
    }

    public function setFrontImg(string $front_img): self
    {
        $this->front_img = $front_img;

        return $this;
    }

    public function getBackImg(): ?string
    {
        return $this->back_img;
    }

    public function setBackImg(string $back_img): self
    {
        $this->back_img = $back_img;

        return $this;
    }

    public function getBaseXp(): ?int
    {
        return $this->base_xp;
    }

    public function setBaseXp(int $base_xp): self
    {
        $this->base_xp = $base_xp;

        return $this;
    }

    public function getBaseHp(): ?int
    {
        return $this->base_hp;
    }

    public function setBaseHp(int $base_hp): self
    {
        $this->base_hp = $base_hp;

        return $this;
    }

    public function getEvolutions(): ?array
    {
        return $this->evolutions;
    }

    public function setEvolutions(array $evolutions): self
    {
        $this->evolutions = $evolutions;

        return $this;
    }

    public function getGenero(): ?gender
    {
        return $this->genero;
    }

    public function setGenero(?gender $genero): self
    {
        $this->genero = $genero;

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
            $pokedexPokemon->addIdpokemon($this);
        }

        return $this;
    }

    public function removePokedexPokemon(PokedexPokemon $pokedexPokemon): self
    {
        if ($this->pokedexPokemon->removeElement($pokedexPokemon)) {
            $pokedexPokemon->removeIdpokemon($this);
        }

        return $this;
    }
}
