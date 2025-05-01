<?php

namespace test;

require_once(__DIR__ . "/../src/BlackRabbit3.php");

use PHPUnit_Framework_TestCase;
use BlackRabbit3;

class BlackRabbit3Test extends PHPUnit_Framework_TestCase {
    /** @var BlackRabbit3 */
    private $blackRabbit3;

    public function setUp() {
        parent::setUp();
        $this->blackRabbit3 = new BlackRabbit3();

    }

    //SECTION FILE !
    /**
     * @dataProvider multiplyProvider
     */
    public function testMultiply($expected, $amount, $multiplier)
    {
        $this->assertEquals($expected, $this->blackRabbit3->multiplyBy($amount, $multiplier));
    }

    public function multiplyProvider()
    {
        return array(
            // Tests that are expected to pass
            array(4, 2, 2), // 2 * 2 = 4
            array(6, 3, 2), // 3 * 2 = 6

            // New test to reveal flaws
            array(14, 7, 2),
            array(0.9, 0.45, 2)
        );
    }
}
