<?php

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testSetGetUsername()
    {
        // Arrange
        $user = new User();
        $user->setUsername('john');
        $expectedResult = 'john';
        // Act
        $result = $user->getUsername();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

    public function testSetGetPassword()
    {
        // Arrange
        $user = new User();
        $user->setPassword('top secret');
        $expectedResult = 'top secret';
        // Act
        $result = $user->getPassword();
        // Assert
        $this->assertEquals($result, $expectedResult);
    }

}