<?php
use PHPUnit\Framework\TestCase;

class WhishlistModelTest extends TestCase
{
    //getWhishlistByUserID
    public function testGetWhishlistByUserIdOk()
    {
        $userId = 46;
        $homeModel = new HomeModel();
        $actual = $homeModel->getWhishlistByUserID($userId);
        if(!empty($actual)){
        $this->assertTrue(true);
        }
    }
    public function testGetWhishlistByUserIdNotExist()
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
    public function testGetWhishlistByUserIdString()
    {
        $userId = 'asdasd';
        $homeModel = new HomeModel();
        $expected = false;
        $actual = $homeModel->getWhishlistByUserID($userId);
        $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdEmpty()
    {
    $userId = '';
    $homeModel = new HomeModel();
    $expected = false;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdObject()
    {
    $userId = new stdClass();
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdBool()
    {
    $userId = true;
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdDouble()
    {
    $userId = 46.00000000;
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdNull()
    {
    $userId = null;
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdStringValueNumber()
    {
    $userId = '46';
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdNegative()
    {
    $userId = -46;
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
    public function testGetWhishlistByUserIdArray()
    {
    $userId = ['use_id' => 46];
    $homeModel = new HomeModel();
    $expected = false ;
    $actual = $homeModel->getWhishlistByUserID($userId);
    $this->assertEquals($expected, $actual);
    }
}