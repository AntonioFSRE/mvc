<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CurrencyRepository::class)
 */
class Currency
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currency;

    /**
     * @ORM\OneToMany(targetEntity=OfferApplications::class, mappedBy="currency", fetch="EAGER")
     */
    private $offer;

    /**
     * @ORM\OneToMany(targetEntity=ProductApplications::class, mappedBy="currency", fetch="EAGER")
     */
    private $product;

    public function __construct()
    {
        $this->offer = new ArrayCollection();
        $this->product = new ArrayCollection();
    }

    public function __toString(){ 
        return $this->currency;
     }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

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
            $offer->setCurrency($this);
        }

        return $this;
    }

    public function removeOffer(OfferApplications $offer): self
    {
        if ($this->offer->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getCurrency() === $this) {
                $offer->setCurrency(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ProductApplications[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(ProductApplications $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setCurrency($this);
        }

        return $this;
    }

    public function removeProduct(ProductApplications $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCurrency() === $this) {
                $product->setCurrency(null);
            }
        }

        return $this;
    }
}
