<?php

namespace App\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Information
 *
 * @ORM\Table(name="information", indexes={@ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class SurveyEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="bath_shower", type="string", length=50, nullable=false)
     */
    private $bathShower;

    /**
     * @var string
     *
     * @ORM\Column(name="toilet_flush", type="string", length=50, nullable=false)
     */
    private $toiletFlush;

    /**
     * @var string
     *
     * @ORM\Column(name="wash", type="string", length=50, nullable=false)
     */
    private $wash;

    /**
     * @var string
     *
     * @ORM\Column(name="garden_water", type="string", length=50, nullable=false)
     */
    private $gardenWater;

    /**
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * @return string $bathShower
     */
    public function getBathShower()
    {
        return $this->bathShower;
    }
    
    /**
     * @param string $bathShower
     */
    public function setBathShower($bathShower)
    {
        $this->bathShower = $bathShower;
    }
    
    /**
     * @return string $toiletFlush
     */
    public function getToiletFlush()
    {
        return $this->toiletFlush;
    }
    
    /**
     * @param string $toiletFlush
     */
    public function setToiletFlush($toiletFlush)
    {
        $this->toiletFlush = $toiletFlush;
    }
    
    /**
     * @return string $wash
     */
    public function getWash()
    {
        return $this->wash;
    }
    
    /**
     * @param string $wash
     */
    public function setWash($wash)
    {
        $this->wash = $wash;
    }
    
    /**
     * @return string $gardenWater
     */
    public function getGardenWater()
    {
        return $this->gardenWater;
    }
    
    /**
     * @param string $gardenWater
     */
    public function setGardenWater($gardenWater)
    {
        $this->gardenWater = $gardenWater;
    }   
}
