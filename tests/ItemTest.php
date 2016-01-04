<?php

class ItemTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetName()
    {
        // Arrange
        $item = new Item();
        $item->setName('john');
        $expectedResult = 'john';
        // Act
        $result = $item->getName();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetAllergyPhoto()
    {
        // Arrange
        $item = new Item();
        $item->setPhoto('pic.jpeg');
        $expectedResult = 'pic.jpeg';
        // Act
        $result = $item->getPhoto();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetDescription()
    {
        // Arrange
        $item = new Item();
        $item->setDescription('this is an item description');
        $expectedResult = 'this is an item description';
        // Act
        $result = $item->getDescription();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetPrice()
    {
        // Arrange
        $item = new Item();
        $item->setPrice(2.5);
        $expectedResult = 2.5;
        // Act
        $result = $item->getPrice();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetCalories()
    {
        // Arrange
        $item = new Item();
        $item->setCalories(180);
        $expectedResult = 180;
        // Act
        $result = $item->getCalories();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetAllergyInformation()
    {
        // Arrange
        $item = new Item();
        $item->setAllergyInformation('contains nuts');
        $expectedResult = 'contains nuts';
        // Act
        $result = $item->getAllergyInformation();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetAllergyCategory()
    {
        // Arrange
        $item = new Item();
        $item->setCategory(1);
        $expectedResult = 1;
        // Act
        $result = $item->getCategory();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

}