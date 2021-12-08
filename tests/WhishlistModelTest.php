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
    //getWhishlistExist
    public function testGetWhishlistExistOk()
    {
        $userId = 46;
        $productId = 92;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(!empty($actual)){
            $this->assertTrue(true);
        }
    }
    public function testGetWhishlistExistUserIdNotExist()
    {
        $userId = 13213;
        $productId = 90;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistExistUserIdString()
    {
        $userId = 'ádsad';
        $productId = 96;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdEmpty()
    {
        $userId = '';
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdObject()
    {
        $userId = new stdClass();
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdBool()
    {
        $userId = true;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdDouble()
    {
        $userId = 46.000000000000;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdNull()
    {
        $userId = null;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdStringValueNumber()
    {
        $userId = '46';
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdNegative()
    {
        $userId = -46;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistUserIdArray()
    {
        $userId = ['user_id' => 46];
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdNotExist()
    {
        $userId = 46;
        $productId = 21313321;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testGetWhishlistExistProductIdString()
    {
        $userId = 46;
        $productId = 'adgb';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdEmpty()
    {
        $userId = 46;
        $productId = '';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdObject()
    {
        $userId = 46;
        $productId = new stdClass();
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdBool()
    {
        $userId = 46;
        $productId = true;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdDouble()
    {
        $userId = 46;
        $productId = 90.00000000000000000;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdNull()
    {
        $userId = 46;
        $productId = null;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdStringValueNumber()
    {
        $userId = 46;
        $productId = '90';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdNegative()
    {
        $userId = 46;
        $productId = -90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistExistProductIdArray()
    {
        $userId = 46;
        $productId = ['pro_id' => 90];
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }

}