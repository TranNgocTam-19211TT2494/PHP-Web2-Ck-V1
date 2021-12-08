<?php
use PHPUnit\Framework\TestCase;

class WhishlistModelTest extends TestCase
{
    //getWhishlistByUserID
    public function testgetWhishlistByUserIdOk()
    {
        $userId = 46;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistByUserID($userId);
        if(!empty($actual)){
        $this->assertTrue(true);
        }
    }
    public function testgetWhishlistByUserIdNotExist()
    {
        $userId = 26151;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistByUserID($userId);
        if(empty($actual)){
        $this->assertTrue(true);
        }else{
        $this->assertTrue(false);
        }
    }
    public function testgetWhishlistByUserIdString()
    {
        $userId = 'asdasd';
        $homeModel = new HomeModel();
        $expected = false;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdEmpty()
    {
        $userId = '';
        $homeModel = new HomeModel();
        $expected = false;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdObject()
    {
        $userId = new stdClass();
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdBool()
    {
        $userId = true;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdDouble()
    {
        $userId = 46.00000000;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdNull()
    {
        $userId = null;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdStringValueNumber()
    {
        $userId = '46';
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdNegative()
    {
        $userId = -46;
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistByUserIdArray()
    {
        $userId = ['use_id' => 46];
        $homeModel = new HomeModel();
        $expected = false ;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    //deleteWhishList
    public function testdeleteWhishlistIdOk()
    {
        $id = md5(143 . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        if(!empty($actual)){
            $this->assertTrue(true);
        }
    }
    public function testdeleteWhishlistIdNotExist()
    {
        $id = md5(5646546 . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdString()
    {
        $id = md5('asdasd' . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdEmptyOne()
    {
        $id = md5('' . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdEmptyTwo()
    {
        $id = '';
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdObject()
    {
        $id = new stdClass();
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdBoolOne()
    {
        $id = true;
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdBoolTwo()
    {
        $id = md5(true.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdDouble()
    {
        $id = md5(143.0000000000.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdNullOne()
    {
        $id = md5(null.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdNullTwo()
    {
        $id = null;
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdStringValueNumber()
    {
        $id = md5('143'. 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdNegative()
    {
        $id = md5('-143'. 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testdeleteWhishlistIdArray()
    {
        $id = ['pro_id' => '143'];
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}