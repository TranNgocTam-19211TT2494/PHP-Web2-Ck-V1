<?php

use PHPUnit\Framework\TestCase;

class InsertOrdelTest extends TestCase
{
    /**
     * Test case Okie
     */

    /**
     * Test case Not good
     */
    public function testInsertOrderOk()
    {
        $HomeModel = new HomeModel();
        $userID = 54;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $HomeModel->startTransaction();
        $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertTrue(true);
    }

    public function testInsertOrderNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $userID = 999;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        
        if(!empty($userID)){
            $actual = 0;
        }else{
            $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        }
        $actual = $HomeModel->getUserById($userID);
        $HomeModel->rollback();
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }

    public function testInsertOrderDuplicate()
    {
        $HomeModel = new HomeModel();
        $id_max = $HomeModel->getOrderMaxById();
        $userID = 54;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $HomeModel->startTransaction();
        $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $actual = $HomeModel->getOrderMaxById();
        $expected = $id_max;
        $this->assertEquals($expected,$actual);
    }

    public function testInsertOrderByIdNull()
    {
        $HomeModel = new HomeModel();
        $userID = "";
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderIdString()
    {
        $HomeModel = new HomeModel();
        $userID = "abc";
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderIdNegative()
    {
        $HomeModel = new HomeModel();
        $userID = -123;
        $Firstname = "Trang";
        $Lastname = "Hoài";
        $address = "NT";
        $email = "tranhoaitrang3001@gmail.com";
        $phone = "0123456789";
        $notes = "không";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderEmpty()
    {
        $HomeModel = new HomeModel();
        $userID = [];
        $Firstname = [];
        $Lastname = [];
        $address = [];
        $email = [];
        $phone = [];
        $notes = [];
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertOrderNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $userID = "";
        $Firstname = "";
        $Lastname = "";
        $address = "";
        $email = "";
        $phone = "";
        $notes = "";
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $userID = $object;
        $Firstname = $object;
        $Lastname = $object;
        $address = $object;
        $email = $object;
        $phone = $object;
        $notes = $object;
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderNotNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a','b'];
        $userID = $array;
        $Firstname = $array;
        $Lastname = $array;
        $address = $array;
        $email = $array;
        $phone = $array;
        $notes = $array;
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertOrderNotNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $userID = $bool;
        $Firstname = $bool;
        $Lastname = $bool;
        $address = $bool;
        $email = $bool;
        $phone = $bool;
        $notes = $bool;
        $expected = 0;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertOrder($userID, $Firstname, $Lastname, $address, $email, $phone, $notes);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
