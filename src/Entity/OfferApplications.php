<?php

namespace App\Entity;

use App\Repository\OfferApplicationsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=OfferApplicationsRepository::class)
 */
class OfferApplications
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $offer;

    /** 
    * @ORM\Column(name="time", type="datetime")
    */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity=ProductApplications::class, inversedBy="offers", fetch="EAGER")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $product_id;

    /**
     * @ORM\ManyToOne(targetEntity=Currency::class, inversedBy="offer", fetch="EAGER")
     * @ORM\JoinColumn(name="currency_id", referencedColumnName="id")
     */
    private $currency;

    /**
     * @ORM\ManyToOne(targetEntity=OfferStatus::class, inversedBy="offer", fetch="EAGER")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="offer", fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffer(): ?int
    {
        return $this->offer;
    }

    public function setOffer(?int $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

    public function setTime(\DateTime $time)
    {
        $this->time = $time;

        return $this;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getProduct(): ?ProductApplications
    {
        return $this->product_id;
    }

    public function setProduct(?ProductApplications $product_id): self
    {
        $this->product_id = $product_id;

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

    public function getStatus(): ?OfferStatus
    {
        return $this->status;
    }

    public function setStatus(?OfferStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
