<?php

use PHPUnit\Framework\TestCase;

class TestGetCheckoutsByUserId extends TestCase
{
    /**
     * Test case Oki
     */
    public function testGetCheckoutsByUserIdOk()
    {
        $homeModel = new HomeModel();
        $id = 50;
        $expected = 50;
        $homeModel->startTransaction();
        $user = $homeModel->getCheckoutsByUserId($id);
        $actual = $user[0]['user_id'];
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetCheckoutsByUserIdNg()
    {
        $homeModel = new HomeModel();
        $id = 1000;
        $homeModel->startTransaction();
        $user = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testGetCheckoutsByUserIdIsEmpty()
    {
        $homeModel = new HomeModel();
        $id = "";
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testGetCheckoutsByUserIdIsDouble()
    {
        $homeModel = new HomeModel();
        $id = 10.5;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testGetCheckoutsByUserIdIsNegative()
    {
        $homeModel = new HomeModel();
        $id = -2;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testGetCheckoutsByUserIdIsIsString()
    {
        $homeModel = new HomeModel();
        $id = '123';
        $expected = [];
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testGetCheckoutsByUserIdIsIsArray()
    {
        $homeModel = new HomeModel();
        $id = [];
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testGetCheckoutsByUserIdIsIsNull()
    {
        $homeModel = new HomeModel();
        $id = null;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testGetCheckoutsByUserIdIsIsObject()
    {
        $homeModel = new HomeModel();
        $id = new HomeModel();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testGetCheckoutsByUserIdIsIsBool()
    {
        $homeModel = new HomeModel();
        $id = true;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testGetCheckoutsByUserIdIsSpecialCharacter()
    {
        $homeModel = new HomeModel();
        $id = '@@';
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getCheckoutsByUserId($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
