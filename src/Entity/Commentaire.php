<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commenter = null;

    #[ORM\Column(length: 255)]
    private ?string $note = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'event')]
    private ?evenement $event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommenter(): ?string
    {
        return $this->commenter;
    }

    public function setCommenter(string $commenter): static
    {
        $this->commenter = $commenter;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getEvent(): ?evenement
    {
        return $this->event;
    }

    public function setEvent(?evenement $event): static
    {
        $this->event = $event;

        return $this;
    }
}
