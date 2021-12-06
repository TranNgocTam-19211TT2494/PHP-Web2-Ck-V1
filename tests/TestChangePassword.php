<?php

use PHPUnit\Framework\TestCase;

class TestChangePassword extends TestCase
{
    /**
     * Test case Oki
     */
    public function testChangePasswordOk()
    {
        $homeModel = new HomeModel();
        $userName = 'tien';
        $password = '333333';
        $expected = true;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testChangePasswordNg()
    {
        $homeModel = new HomeModel();
        $userName = "";
        $password = "aaa";
        $homeModel->startTransaction();
        $user = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case password has length < 6
     */
    public function testChangePasswordLengthLessThanSix()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = "asda";
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is null
     */
    public function testChangePasswordWithPasswordNull()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = "";
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is array
     */
    public function testChangePasswordWithPasswordArray()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = [];
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is object
     */
    public function testChangePasswordWithPasswordObject()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = new HomeModel();
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case password is boolean
     */
    public function testChangePasswordWithPasswordBoolean()
    {
        $homeModel = new HomeModel();
        $userName = "tien";
        $password = true;
        $expected = false;
        $homeModel->startTransaction();
        $actual = $homeModel->changePassword($userName, $password);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
