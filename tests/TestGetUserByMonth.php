<?php

use PHPUnit\Framework\TestCase;

class TestGetUserByMonth extends TestCase
{
    /**
     * Test case Oki
     */
    public function testGetUserByMonthOk()
    {
        $homeModel = new HomeModel();
        $month = 11;
        $expected = "Tam";
        $homeModel->startTransaction();
        $user = $homeModel->getUserByMonth($month);
        $actual = $user[0]['username'];
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case Not good
     */
    public function testGetUserByMonthNg()
    {
        $homeModel = new HomeModel();
        $month = 13;
        $homeModel->startTransaction();
        $user = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        if (empty($user)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }
    /**
     * Test case id is double
     */
    public function testGetUserByMonthIsEmpty()
    {
        $homeModel = new HomeModel();
        $month = "";
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is double
     */
    public function testGetUserByMonthIsDouble()
    {
        $homeModel = new HomeModel();
        $month = 10.5;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is negative number
     */
    public function testGetUserByMonthIsNegative()
    {
        $homeModel = new HomeModel();
        $month = -2;
        $homeModel->startTransaction();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is string
     */
    public function testGetUserByMonthIsIsString()
    {
        $homeModel = new HomeModel();
        $month = '123';
        $expected = [];
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is array
     */
    public function testGetUserByMonthIsIsArray()
    {
        $homeModel = new HomeModel();
        $month = [];
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is null
     */
    public function testGetUserByMonthIsIsNull()
    {
        $homeModel = new HomeModel();
        $month = null;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is object
     */
    public function testGetUserByMonthIsIsObject()
    {
        $homeModel = new HomeModel();
        $month = new HomeModel();
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is bool(true/false)
     */
    public function testGetUserByMonthIsIsBool()
    {
        $homeModel = new HomeModel();
        $month = true;
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
    /**
     * Test case id is special characters(@,#)
     */
    public function testGetUserByMonthIsSpecialCharacter()
    {
        $homeModel = new HomeModel();
        $month = '@@';
        $expected = 'Not invalid';
        $homeModel->startTransaction();
        $actual = $homeModel->getUserByMonth($month);
        $homeModel->rollback();
        $this->assertEquals($expected, $actual);
    }
}
