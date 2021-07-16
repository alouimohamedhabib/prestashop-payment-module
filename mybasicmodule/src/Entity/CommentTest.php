<?php

namespace Mybasicmodule\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class CommentTest
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $price;
    public function getprice()
    {
        return $this->price;
    }

    public function setprice($value)
    {
        $this->price = $value;
    }

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

}
