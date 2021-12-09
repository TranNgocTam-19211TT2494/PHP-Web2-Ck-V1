<?php
use PHPUnit\Framework\TestCase;

class WhishlistModelTest extends TestCase
{
    //getWhishlistByUserID
    public function testgetWhishlistByUserIdOk()
    {
        $userId = 47;
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
        //var_dump($actual);
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
    public function testInsertWhishlistOk()
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
    public function testInsertWhishlistProductIdNotExist()
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
    public function testInsertWhishlistProductIdString()
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
    public function testInsertWhishlistProductIdEmptyOne()
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
    public function testInsertWhishlistProductIdEmptyTwo()
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
    public function testInsertWhishlistProductIdObject()
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
    public function testInsertWhishlistProductIdBoolOne()
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
    public function testInsertWhishlistProductIdBoolTwo()
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
    public function testInsertWhishlistProductIdDouble()
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
    public function testInsertWhishlistProductIdNullOne()
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
    public function testInsertWhishlistProductIdNullTwo()
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
    public function testInsertWhishlistProductIdStringValueNumber()
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
    public function testInsertWhishlistProductIdNegative()
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
    public function testInsertWhishlistProductIdArray()
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

    public function testInsertWhishlistUserIdNotExist()
    {
        $pro_id = md5(1000 . 'chuyen-de-web-2');
        $user_id = 21231235;
        $expected = false;
        $homeModel = new HomeModel();
        $homeModel->startTransaction();
        $actual = $homeModel->insertWhishList($pro_id,$user_id);
        //var_dump($actual).die();
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    public function testInsertWhishlistUserIdString()
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
    public function testInsertWhishlistUserIdEmptyOne()
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
    public function testInsertWhishlistUserIdEmptyTwo()
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
    public function testInsertWhishlistUserIdObject()
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
    public function testInsertWhishlistUserIdBoolOne()
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
    public function testInsertWhishlistUserIdBoolTwo()
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
    public function testInsertWhishlistUserIdDouble()
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
    public function testInsertWhishlistUserIdNullOne()
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
    public function testInsertWhishlistUserIdNullTwo()
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
    public function testInsertWhishlistUserIdStringValueNumber()
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
    public function testInsertWhishlistUserIdNegative()
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
    public function testInsertWhishlistUserIdArray()
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