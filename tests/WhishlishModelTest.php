<?php
use PHPUnit\Framework\TestCase;

class WhishlishModelTest extends TestCase
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
   
}