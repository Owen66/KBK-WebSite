<?php

use Doctrine\Common\Collections\ArrayCollection;

class Item
{
    protected $id;
    protected $name;
    protected $photo;
    protected $description;
    protected $price;
    protected $calories;
    protected $allergyInformation;
    protected $category;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getCalories()
    {
        return $this->calories;
    }

    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    public function getAllergyInformation()
    {
        return $this->allergyInformation;
    }

    public function setAllergyInformation($allergyInformation)
    {
        $this->allergyInformation = $allergyInformation;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
}