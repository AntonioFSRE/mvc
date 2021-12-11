<?php

namespace App\Entity;

use App\Repository\OfferStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OfferStatusRepository::class)
 */
class OfferStatus
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="offer_status", type="string", length=225)
     */
    private $offer_status;

    /**
     * @ORM\OneToMany(targetEntity=OfferApplications::class, mappedBy="status")
     */
    private $offer;

    public function __construct()
    {
        $this->offer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferStatus(): ?string
    {
        return $this->offer_status;
    }

    public function setOfferStatus(string $offer_status): self
    {
        $this->offer_status = $offer_status;

        return $this;
    }

    /**
     * @return Collection|OfferApplications[]
     */
    public function getOffer(): Collection
    {
        return $this->offer;
    }

    public function addOffer(OfferApplications $offer): self
    {
        if (!$this->offer->contains($offer)) {
            $this->offer[] = $offer;
            $offer->setStatus($this);
        }

        return $this;
    }

    public function removeOffer(OfferApplications $offer): self
    {
        if ($this->offer->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getStatus() === $this) {
                $offer->setStatus(null);
            }
        }

        return $this;
    }
}