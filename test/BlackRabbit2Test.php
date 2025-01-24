<?php

namespace test;

require_once(__DIR__ . "/../src/BlackRabbit2.php");

use PHPUnit_Framework_TestCase;
use BlackRabbit2;

class BlackRabbit2Test extends PHPUnit_Framework_TestCase
{
    /** @var BlackRabbit2 */
    private $blackRabbit2;

    public function setUp()
    {
        parent::setUp();
        $this->blackRabbit2 = new BlackRabbit2();
    }

    //SECTION FILE !
    /**
     * @dataProvider cashProvider
     */
    public function testCash($expected, $amount){
        $this->assertEquals($expected, $this->blackRabbit2->findCashPayment($amount));
    }

    public function cashProvider(){
        $test1 = array(
            array("1" => 1, "2" => 0, "5" => 1, "10" => 0, "20" => 1, "50" => 0, "100" => 0),
            26
        );

        $test2 = array(
            array("1" => 0, "2" => 0, "5" => 0, "10" => 0, "20" => 0, "50" => 0, "100" => 0),
            0
        );

        $test3 = array(
            array("1" => 0, "2" => 2, "5" => 1, "10" => 1, "20" => 0, "50" => 0, "100" => 0),
            19
        );

        $test4 = array(
            array("1" => 0, "2" => 1, "5" => 0, "10" => 1, "20" => 1, "50" => 0, "100" => 0),
            32
        );

        $test5 = array(
            array("1" => 1, "2" => 1, "5" => 1, "10" => 1, "20" => 1, "50" => 1, "100" => 1),
            188
        );

        return array($test1,$test2, $test3, $test4, $test5);
    }
}
