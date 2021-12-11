<?php

namespace App\Entity;

use App\Repository\ProductApplicationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=ProductApplicationsRepository::class)
 */
class ProductApplications
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=225)
     */
    private $product_name;

    /**
     * @ORM\Column(type="string", length=225)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=225)
     */
    private $deliverytime;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $photoname;

    /** 
    * @ORM\Column(name="expires_at", type="datetime")
    */
    private $expiresAt;

    /**
    * @ORM\Column(name="starting_price", type="integer")
    */
    private $starting_price;

    /**
     * @ORM\OneToMany(targetEntity=OfferApplications::class, mappedBy="product_id", fetch="EAGER")
     */
    private $offers;

    /**
     * @ORM\ManyToOne(targetEntity=Currency::class, inversedBy="product", fetch="EAGER")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity=ProductStatus::class, inversedBy="product")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDeliveryTime(): ?string
    {
        return $this->deliverytime;
    }

    public function setDeliveryTime(string $deliverytime): self
    {
        $this->deliverytime = $deliverytime;

        return $this;
    }

    public function getphotoname(): ?string
    {
        return $this->photoname;
    }

    public function setphotoname(?string $photoname): self
    {
        $this->photoname = $photoname;

        return $this;
    }

    public function setExpiresAt(\DateTime $expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    public function getStartingPrice(): ?int
    {
        return $this->starting_price;
    }

    public function setStartingPrice(?int $starting_price): self
    {
        $this->starting_price = $starting_price;

        return $this;
    }

    public function getImagePath()
    {
        return 'images/'.$this->getphotoname();
    }

    /**
     * @return Collection|OfferApplications[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(OfferApplications $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setProduct($this);
        }

        return $this;
    }

    public function removeOffer(OfferApplications $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getProduct() === $this) {
                $offer->setProduct(null);
            }
        }

        return $this;
    }

    public function getCurrency(): ?Currency
    {
        return $this->currency;
    }

    public function setCurrency(?Currency $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getStatus(): ?ProductStatus
    {
        return $this->status;
    }

    public function setStatus(?ProductStatus $status): self
    {
        $this->status = $status;

        return $this;
    }
}
