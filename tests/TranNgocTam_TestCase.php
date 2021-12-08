<?php
use PHPUnit\Framework\TestCase;

class TranNgocTam_TestCase extends TestCase
{
    /**
     * Test case Okie
     */
    public function testLoginOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'NgocTam24';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login('NgocTam24' , '23032001');
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual[0]['username']);
        
    }
     /**
     * Test case Not good
     */
    public function testLoginNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->login('NgocTam24' , '11111');
        //print_r($actual);
        $HomeModel->rollback();
        if (empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test Null 
    public function testLoginIsNull(){
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Null';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login(null , null);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
        
    }
    // Test Empty:
    public function testLoginIsEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Empty';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login("" , "");
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Array:
    public function testLoginIsArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Array';
        $arr = array(
            'tam',
            'tran'
        );
        $HomeModel->startTransaction();
        $actual = $HomeModel->login($arr , $arr);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Object:
    public function testLoginIsObject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Object';
        $obj = new HomeModel();
        $HomeModel->startTransaction();
        $actual = $HomeModel->login($obj , $obj);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Boolean:
    public function testLoginIsBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Boolean';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login(true , true);
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Number:
    public function testLoginIsNumber() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = 'Not Number';
        $HomeModel->startTransaction();
        $actual = $HomeModel->login(331 , "23032001");
        //print_r($actual);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }

    // ------------- Function CouponByID -------------- // ? 10 test case
    // Test Coupon Ok:
    public function testCouponByIdOk() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = '3Y6LM8VA';
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(51);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual[0]['zipcode']);
    }
    // Test Coupon Not good:
    public function testCouponByIdNg() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(1000);
        //print_r($actual); die();
        //$HomeModel->rollback();
        if(empty($actual)) {
            return $this->assertTrue(true);
        } else {
            return $this->assertTrue(false);
        }
    }
    // Test Coupon ID so thực:
    public function testCouponByIdDowble() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(9.7);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Negative:
    public function testCouponByIdNegative() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = [];
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(-51);
        //print_r($actual); die();
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon Empty:
    public function testCouponByIdNotEmpty() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID('');
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID tring:
    public function testCouponByIdNotString() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not String";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID('tam');
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Null:
    public function testCouponByIdNotNull() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Empty";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(NULL);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Array:
    public function testCouponByIdNotArray() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Array";
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(['a','b']);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Object:
    public function testCouponByIdNotObject() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Object";
        $obj = new HomeModel();
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID($obj);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    // Test Coupon ID Boolean:
    public function testCouponByIdNotBoolean() {
        $factory = new FactoryPattent();
        $HomeModel = $factory->make('home');
        $expected = "Not Boolean";
        
        $HomeModel->startTransaction();
        $actual = $HomeModel->getCouponByID(true);
        $HomeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    
}