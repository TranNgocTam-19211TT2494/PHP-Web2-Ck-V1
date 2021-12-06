<?php

use PHPUnit\Framework\TestCase;

class TestGetOrderItemById extends TestCase
{
    /**
     * Test case Oki
     */
    public function testGetOrderItemByIdOk()
    {
        $homeModel = new HomeModel();
        $id = 9;
        $expected = 1;
        $homeModel->startTransaction();
        $order = $homeModel->getOrderItemById($id);
        $actual = $order[0]['quantity'];
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetOrderItemByIdNg()
    {
        $homeModel = new HomeModel();
        $id = 1000;
        $homeModel->startTransaction();
        $order = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        if (empty($order)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testGetOrderItemByIdIsEmpty()
    {
        $homeModel = new HomeModel();
        $id = "";
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testGetOrderItemByIdIsDouble()
    {
        $homeModel = new HomeModel();
        $id = 10.5;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testGetOrderItemByIdIsNegative()
    {
        $homeModel = new HomeModel();
        $id = -2;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testGetOrderItemByIdIsIsString()
    {
        $homeModel = new HomeModel();
        $id = '123';
        $expected = [];
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testGetOrderItemByIdIsIsArray()
    {
        $homeModel = new HomeModel();
        $id = [];
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testGetOrderItemByIdIsIsNull()
    {
        $homeModel = new HomeModel();
        $id = null;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testGetOrderItemByIdIsIsObject()
    {
        $homeModel = new HomeModel();
        $id = new HomeModel();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testGetOrderItemByIdIsIsBool()
    {
        $homeModel = new HomeModel();
        $id = true;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testGetOrderItemByIdIsSpecialCharacter()
    {
        $homeModel = new HomeModel();
        $id = '@@';
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getOrderItemById($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
