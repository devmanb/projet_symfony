<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MissionRepository")
 */
class Mission
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="missions")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="missions")
     */
    private $user_client;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Rapport", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $rapport;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Site", inversedBy="missions",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $site;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Terme", inversedBy="missions")
     */
    private $terme;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->terme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    public function getUserClient(): ?User
    {
        return $this->user_client;
    }

    public function setUserClient(?User $user_client): self
    {
        $this->user_client = $user_client;

        return $this;
    }

    public function getRapport(): ?Rapport
    {
        return $this->rapport;
    }

    public function setRapport(Rapport $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): self
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return Collection|Terme[]
     */
    public function getTerme(): Collection
    {
        return $this->terme;
    }

    public function addTerme(Terme $terme): self
    {
        if (!$this->terme->contains($terme)) {
            $this->terme[] = $terme;
        }

        return $this;
    }

    public function removeTerme(Terme $terme): self
    {
        if ($this->terme->contains($terme)) {
            $this->terme->removeElement($terme);
        }

        return $this;
    }
}
