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
    //insertWhishList pro_id = 92 user_id = 25
    public function testinsertWhishlistOk()
    {
        $pro_id = md5(92 . 'chuyen-de-web-2');
        $user_id = 25;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        if(!empty($actual)){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testinsertWhishlistProductIdNotExist()
    {
        $pro_id = md5(9999990 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdString()
    {
        $pro_id = md5('asdasd' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdEmptyOne()
    {
        $pro_id = md5('' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdEmptyTwo()
    {
        $pro_id = '';
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdObject()
    {
        $pro_id = new stdClass();
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdBoolOne()
    {
        $pro_id = true;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdBoolTwo()
    {
        $pro_id = md5(true . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdDouble()
    {
        $pro_id = md5(92.00000000 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdNullOne()
    {
        $pro_id = null;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdNullTwo()
    {
        $pro_id = md5(null . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdStringValueNumber()
    {
        $pro_id = md5('92' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdNegative()
    {
        $pro_id = md5(-90 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistProductIdArray()
    {
        $pro_id = ['pro_id' => '90'];
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    public function testinsertWhishlistUserIdNotExist()
    {
        $pro_id = md5(90 . 'chuyen-de-web-2');
        $user_id = 21231235;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdString()
    {
        $pro_id = md5('asdasd' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdEmptyOne()
    {
        $pro_id = md5('' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdEmptyTwo()
    {
        $pro_id = '';
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdObject()
    {
        $pro_id = new stdClass();
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdBoolOne()
    {
        $pro_id = true;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdBoolTwo()
    {
        $pro_id = md5(true . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdDouble()
    {
        $pro_id = md5(92.00000000 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdNullOne()
    {
        $pro_id = null;
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdNullTwo()
    {
        $pro_id = md5(null . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdStringValueNumber()
    {
        $pro_id = md5('92' . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = true;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdNegative()
    {
        $pro_id = md5(-90 . 'chuyen-de-web-2');
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testinsertWhishlistUserIdArray()
    {
        $pro_id = ['pro_id' => '90'];
        $user_id = 25;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}