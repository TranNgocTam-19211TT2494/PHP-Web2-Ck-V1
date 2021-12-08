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
    public function testgetWhishlistExistOk()
    {
        $userId = 46;
        $productId = 92;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        if(!empty($actual)){
            $this->assertTrue(true);
        }
    }
    public function testgetWhishlistExistUserIdNotExist()
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
    public function testgetWhishlistExistUserIdString()
    {
        $userId = 'ádsad';
        $productId = 96;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdEmpty()
    {
        $userId = '';
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdObject()
    {
        $userId = new stdClass();
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdBool()
    {
        $userId = true;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdDouble()
    {
        $userId = 46.000000000000;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdNull()
    {
        $userId = null;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdStringValueNumber()
    {
        $userId = '46';
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdNegative()
    {
        $userId = -46;
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistUserIdArray()
    {
        $userId = ['user_id' => 46];
        $productId = 90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdNotExist()
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
    public function testgetWhishlistExistProductIdString()
    {
        $userId = 46;
        $productId = 'adgb';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdEmpty()
    {
        $userId = 46;
        $productId = '';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdObject()
    {
        $userId = 46;
        $productId = new stdClass();
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdBool()
    {
        $userId = 46;
        $productId = true;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdDouble()
    {
        $userId = 46;
        $productId = 90.00000000000000000;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdNull()
    {
        $userId = 46;
        $productId = null;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdStringValueNumber()
    {
        $userId = 46;
        $productId = '90';
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdNegative()
    {
        $userId = 46;
        $productId = -90;
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }
    public function testgetWhishlistExistProductIdArray()
    {
        $userId = 46;
        $productId = ['pro_id' => 90];
        $expected = false;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistExist($userId,$productId);
        $this->assertEquals($expected, $actual);
    }

}