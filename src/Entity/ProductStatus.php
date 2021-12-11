<?php

namespace App\Entity;

use App\Repository\ProductStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductStatusRepository::class)
 */
class ProductStatus
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
    private $product_status;

    /**
     * @ORM\OneToMany(targetEntity=ProductApplications::class, mappedBy="status")
     */
    private $product;

    public function __construct()
    {
        $this->product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductStatus(): ?string
    {
        return $this->product_status;
    }

    public function setProductStatus(string $product_status): self
    {
        $this->product_status = $product_status;

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
            $product->setStatus($this);
        }

        return $this;
    }

    public function removeProduct(ProductApplications $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getStatus() === $this) {
                $product->setStatus(null);
            }
        }

        return $this;
    }
}