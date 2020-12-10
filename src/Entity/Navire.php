<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 */
class Navire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=7)
     * @Assert\Regex(pattern="/[1-9]{7}/",
     * message="Le numéro IMO doit comporter 7 chiffres"
     * )
     */
    private $imo;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(
     *                  min=3,
     *                  max=100
     * )
     */
    private $nomNavire;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\Regex(pattern="/[1-9]{9}/",
     * message="Le numéro MMSI doit comporter 9 chiffres"
     * )
     */
    private $mmsi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIMO(): ?int
    {
        return $this->imo;
    }

    public function setIMO(int $IMO): self
    {
        $this->imo = $imo;

        return $this;
    }

    public function getNomNavire(): ?string
    {
        return $this->nomNavire;
    }

    public function setNomNavire(string $nomNavire): self
    {
        $this->nomNavire = $nomNavire;

        return $this;
    }

    public function getMmsi(): ?string
    {
        return $this->mmsi;
    }

    public function setMmsi(string $mmsi): self
    {
        $this->mmsi = $mmsi;

        return $this;
    }
}
