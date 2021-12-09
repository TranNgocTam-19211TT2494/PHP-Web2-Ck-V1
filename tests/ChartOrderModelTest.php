<?php
use PHPUnit\Framework\TestCase;

class ChartOrderModelTest extends TestCase
{
    // getAllOrderByMonth moth = 12
    public function testGetAllOrderByMonthOk()
    {
        $homeModel = new HomeModel();
        $actual = $homeModel->getAllOrderByMonth(12);
        if(!empty($actual)){
          $this->assertTrue(true);
        }else{
          $this->assertTrue(false);
        }
    }
    public function testGetAllOrderByMonthNotExist()
    {
        $homeModel = new HomeModel();
        $actual = $homeModel->getAllOrderByMonth(15);
        if(empty($actual)){
          $this->assertTrue(true);
        }
    }
    public function testGetAllOrderByMonthNotString()
    {
        $homeModel = new HomeModel();
        $moth = "ass";
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthEmpty()
    {
        $homeModel = new HomeModel();
        $moth = "";
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthObject()
    {
        $homeModel = new HomeModel();
        $moth = new stdClass();
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthBool()
    {
        $homeModel = new HomeModel();
        $moth = true;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthDouble()
    {
        $homeModel = new HomeModel();
        $moth = 12.000000000;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthNull()
    {
        $homeModel = new HomeModel();
        $moth = null;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthStringValueNumber()
    {
        $homeModel = new HomeModel();
        $moth = '12';
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthNegative()
    {
        $homeModel = new HomeModel();
        $moth = -12;
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
    public function testGetAllOrderByMonthArray()
    {
        $homeModel = new HomeModel();
        $moth = ['month' => 12];
        $expected = false;
        $actual = $homeModel->getAllOrderByMonth($moth);
        $this->assertEquals($expected, $actual);
    }
   
}