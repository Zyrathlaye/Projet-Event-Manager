<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Commentaire::class)]
    private Collection $event;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: Inscription::class)]
    private Collection $evenement;

    public function __construct()
    {
        $this->event = new ArrayCollection();
        $this->evenement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(Commentaire $event): static
    {
        if (!$this->event->contains($event)) {
            $this->event->add($event);
            $event->setEvent($this);
        }

        return $this;
    }

    public function removeEvent(Commentaire $event): static
    {
        if ($this->event->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getEvent() === $this) {
                $event->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getEvenement(): Collection
    {
        return $this->evenement;
    }

    public function addEvenement(Inscription $evenement): static
    {
        if (!$this->evenement->contains($evenement)) {
            $this->evenement->add($evenement);
            $evenement->setEvent($this);
        }

        return $this;
    }

    public function removeEvenement(Inscription $evenement): static
    {
        if ($this->evenement->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getEvent() === $this) {
                $evenement->setEvent(null);
            }
        }

        return $this;
    }
}
