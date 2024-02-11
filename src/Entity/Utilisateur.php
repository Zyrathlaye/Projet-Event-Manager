<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_de_passe = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Commentaire::class)]
    private Collection $user;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Inscription::class)]
    private Collection $utilisateur;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->utilisateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Commentaire $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setUtilisateur($this);
        }

        return $this;
    }

    public function removeUser(Commentaire $user): static
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUtilisateur() === $this) {
                $user->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(Inscription $utilisateur): static
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur->add($utilisateur);
            $utilisateur->setUtilisateur($this);
        }

        return $this;
    }

    public function removeUtilisateur(Inscription $utilisateur): static
    {
        if ($this->utilisateur->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getUtilisateur() === $this) {
                $utilisateur->setUtilisateur(null);
            }
        }

        return $this;
    }
}
