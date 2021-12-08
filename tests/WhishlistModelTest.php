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
    public function testDeleteWhishlistIdOk()
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
    public function testDeleteWhishlistIdNotExist()
    {
        $id = md5(5646546 . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdString()
    {
        $id = md5('asdasd' . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdEmptyOne()
    {
        $id = md5('' . 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdEmptyTwo()
    {
        $id = '';
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdObject()
    {
        $id = new stdClass();
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdBoolOne()
    {
        $id = true;
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdBoolTwo()
    {
        $id = md5(true.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdDouble()
    {
        $id = md5(143.0000000000.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdNullOne()
    {
        $id = md5(null.'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdNullTwo()
    {
        $id = null;
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdStringValueNumber()
    {
        $id = md5('143'. 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdNegative()
    {
        $id = md5('-143'. 'chuyen-de-web-2');
        $homeModel = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->deleteWhishList($id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testDeleteWhishlistIdArray()
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