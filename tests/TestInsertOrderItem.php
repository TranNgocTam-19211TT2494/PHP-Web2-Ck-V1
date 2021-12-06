<?php

use PHPUnit\Framework\TestCase;

class TestInsertOrderItem extends TestCase
{
    /**
     * Test case Oki
     */
    public function testInsertOrderItemOk()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = 3;
        $homeModel->startTransaction();
        $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertTrue(true);
    }
    /**
     * Test case Not good
     */
    public function testInsertOrderItemNg()
    {
        $homeModel = new HomeModel();
        $id = 1000;
        $orderID = 9;
        $productID = 90;
        $quantity = 3;
        if (!empty($data['id'])) {
            $actual = 0;
        } else {
            $homeModel->insertOrderItem($orderID, $productID, $quantity);
        }
        $actual = $homeModel->findOrderById($id);
        $homeModel->rollback();
        //var_dump($actual);die();
        if (empty($actual)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testInsertOrderItemIsDuplicate()
    {
        $homeModel = new HomeModel();
        $id_max = $homeModel->lastUserId();
        $orderID = 9;
        $productID = 90;
        $quantity = 3;
        $homeModel->startTransaction();
        $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $actual = $homeModel->lastUserId();
        $expected = $id_max;
        $this->assertEquals($expected, $actual);
    }
    // Test productID
    /**
     * Test case with productID is string
     */
    public function testInsertOrderItemWithProductIDIsString()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = "tien";
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is negative number
     */
    public function testInsertOrderItemWithProductIDIsNegNum()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = -5;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is double
     */
    public function testInsertOrderItemWithProductIDIsDouble()
    {
        $homeModel = new HomeModel();
        $orderID = 10;
        $productID = 3.5;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is empty
     */
    public function testInsertOrderItemWithProductIDIsEmpty()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = "";
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is null
     */
    public function testInsertOrderItemWithProductIDIsNull()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = null;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is array
     */
    public function testInsertOrderItemWithProductIDIsArray()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = [90, 21];
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is object
     */
    public function testInsertOrderItemWithProductIDIsObject()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = new HomeModel();
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with ProductID is boolean
     */
    public function testInsertOrderItemWithProductIDIsBool()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = true;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test orderID
    /**
     * Test case with orderID is string
     */
    public function testInsertOrderItemWithOrderIdIsString()
    {
        $homeModel = new HomeModel();
        $orderID = "tien";
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        // var_dump($actual);die();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is negative number
     */
    public function testInsertOrderItemWithOrderIdIsNegNum()
    {
        $homeModel = new HomeModel();
        $orderID = -5;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is double
     */
    public function testInsertOrderItemWithOrderIdIsDouble()
    {
        $homeModel = new HomeModel();
        $orderID = 10.5;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is empty
     */
    public function testInsertOrderItemWithOrderIdIsEmpty()
    {
        $homeModel = new HomeModel();
        $orderID = "";
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is null
     */
    public function testInsertOrderItemWithOrderIdIsNull()
    {
        $homeModel = new HomeModel();
        $orderID = null;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is array
     */
    public function testInsertOrderItemWithOrderIdIsArray()
    {
        $homeModel = new HomeModel();
        $orderID = [1, 2];
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is object
     */
    public function testInsertOrderItemWithOrderIdIsObject()
    {
        $homeModel = new HomeModel();
        $orderID = new HomeModel();
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with orderID is boolean
     */
    public function testInsertOrderItemWithOrderIdIsBool()
    {
        $homeModel = new HomeModel();
        $orderID = true;
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test quantity
    /**
     * Test case with Quantity is string
     */
    public function testInsertOrderItemWithQuantityIsString()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = "tien";
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is negative number
     */
    public function testInsertOrderItemWithQuantityIsNegNum()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = -10;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is double
     */
    public function testInsertOrderItemWithQuantityIsDouble()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = 3.5;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is empty
     */
    public function testInsertOrderItemWithQuantityIsEmpty()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = "";
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is null
     */
    public function testInsertOrderItemWithQuantityIsNull()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = null;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is array
     */
    public function testInsertOrderItemWithQuantityIsArray()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = [3, 4];
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is object
     */
    public function testInsertOrderItemWithQuantityIsObject()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = new HomeModel();
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case with Quantity is boolean
     */
    public function testInsertOrderItemWithQuantityIsBool()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = true;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test have orderID and productID
    /**
     * Test case empty quantity
     */
    public function testInsertOrderItemEmptyQuantity()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = 90;
        $quantity = "";
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test have orderID and quantity
    /**
     * Test case with orderID is string
     */
    public function testInsertOrderItemEmptyProductId()
    {
        $homeModel = new HomeModel();
        $orderID = 9;
        $productID = "";
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test have productID and quantity
    /**
     * Test case with orderID is string
     */
    public function testInsertOrderItemEmptyOrderId()
    {
        $homeModel = new HomeModel();
        $orderID = "";
        $productID = 90;
        $quantity = 3;
        $expected = "Invalid";
        $homeModel->startTransaction();
        $actual = $homeModel->insertOrderItem($orderID, $productID, $quantity);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
