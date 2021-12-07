<?php

use PHPUnit\Framework\TestCase;

class UpdateSumTest extends TestCase
{
    /**
     * Test case Okie
     */

    /**
     * Test case Not good
     */
    public function testUpdateSumOk()
    {
        $HomeModel = new HomeModel();
        $OrderID = 3;
        $Sum = 2;
       
        $HomeModel->startTransaction();
        $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertTrue(true);
    }

    public function testUpdateSumNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $OrderID = 3;
        $Sum = 2;
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testUpdateSumDuplicate()
    {
        $HomeModel = new HomeModel();
        $id_max = $HomeModel->getOrderMaxById();
        $OrderID = 3;
        $Sum = 2;
        $HomeModel->startTransaction();
        $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $actual = $HomeModel->getOrderMaxById();
        $expected = $id_max;
        $this->assertEquals($expected,$actual);
    }

    public function testUpdateSumByIdNull()
    {
        $HomeModel = new HomeModel();
        $OrderID = "";
        $Sum = 2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateSumByIdString()
    {
        $HomeModel = new HomeModel();
        $OrderID = "abc";
        $Sum = 2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumBySumString()
    {
        $HomeModel = new HomeModel();
        $OrderID = 3;
        $Sum = "abc";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumByIdNegative()
    {
        $HomeModel = new HomeModel();
        $OrderID = -3;
        $Sum = 2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateSumBySumNegative()
    {
        $HomeModel = new HomeModel();
        $OrderID = 3;
        $Sum = -2;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumEmpty()
    {
        $HomeModel = new HomeModel();
        $OrderID = [];
        $Sum = [];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testUpdateSumNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $OrderID = "";
        $Sum = "";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $OrderID = $object;
        $Sum = $object;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumNotNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a','b'];
        $OrderID = $array;
        $Sum = $array;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testUpdateSumNotNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $OrderID = $bool;
        $Sum = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->updateSum($OrderID, $Sum);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
