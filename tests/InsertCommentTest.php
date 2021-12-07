<?php

use PHPUnit\Framework\TestCase;

class InsertCommentTest extends TestCase
{
    /**
     * Test case Okie
     */

    /**
     * Test case Not good
     */
    public function testInsertCommentOk()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $HomeModel->startTransaction();
        $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertTrue(true);
    }

    public function testInsertCommentByUserIdNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $lgUserID = 999;
        $id = 999;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        
        if(!empty($userID)){
            $actual = false;
        }else{
            $HomeModel->insertComment($lgUserID, $id, $data);
        }
        $actual = $HomeModel->getUserById($lgUserID);
        $HomeModel->rollback();
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testInsertCommentByProductIdNg()
    {
        $HomeModel = new HomeModel();
        $HomeModel->startTransaction();
        $lgUserID = 47;
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        
        if(!empty($userID)){
            $actual = false;
        }else{
            $HomeModel->insertComment($lgUserID, $id, $data);
        }
        $actual = $HomeModel->firstProductDetail($id);
        $HomeModel->rollback();
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }


    public function testInsertCommentByIdNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "";
        $id = "";
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByUserIdString()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "abc";
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentByProductIdString()
    {
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = "abc";
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentUserIdNegative()
    {
        $HomeModel = new HomeModel();
        $HomeModel = new HomeModel();
        $lgUserID = -47;
        $id = 100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentProductIdNegative()
    {
        $HomeModel = new HomeModel();
        $HomeModel = new HomeModel();
        $lgUserID = 47;
        $id = -100;
        $data = [
            'name' => 'Trang',
            'content' => 'tuyệt'
        ];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentEmpty()
    {
        $HomeModel = new HomeModel();
        $lgUserID = [];
        $id = [];
        $data = [];
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertCommentNotEmtyNull()
    {
        $HomeModel = new HomeModel();
        $lgUserID = "";
        $id = "";
        $data = "";
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentNotNotObject()
    {
        $HomeModel = new HomeModel();
        $object = new Coupon();
        $lgUserID = $object;
        $id = $object;
        $data = $object;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentNotNotArray()
    {
        $HomeModel = new HomeModel();
        $array = ['a','b'];
        $lgUserID = $array;
        $id = $array;
        $data = $array;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testInsertCommentNotNotBool()
    {
        $HomeModel = new HomeModel();
        $bool = true;
        $lgUserID = $bool;
        $id = $bool;
        $data = $bool;
        $expected = false;
        $HomeModel->startTransaction();
        $actual = $HomeModel->insertComment($lgUserID, $id, $data);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
