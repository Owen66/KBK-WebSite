<?php

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetTitle()
    {
        // Arrange
        $c = new Category();
        $c->setTitle('drinks');
        $expectedResult = 'drinks';
        // Act
        $result = $c->getTitle();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetSummary()
    {
        // Arrange
        $c = new Category();
        $c->setSummary('this is a summary');
        $expectedResult = 'this is a summary';
        // Act
        $result = $c->getSummary();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testAddGetItems()
    {
        // Arrange
        $c = new Category();
        $i = new Item();
        $c->addItem($i);
        $expectedResult = true;
        // Act
        $result = $c->getItems()->count() > 0;
        // Assert
        $this->assertEquals($result, $expectedResult);
    }
}