<?php

namespace test;

require_once(__DIR__ . "/../src/BlackRabbit3.php");

use PHPUnit_Framework_TestCase;
use BlackRabbit3;

class BlackRabbit3Test extends PHPUnit_Framework_TestCase
{
    /** @var BlackRabbit3 */
    private $blackRabbit3;

    public function setUp()
    {
        parent::setUp();
        $this->blackRabbit3 = new BlackRabbit3();

    }

    //SECTION FILE !
    /**
     * @dataProvider multiplyProvider
     */
    public function testMultiply($expected, $amount, $multiplier) {
        $this->assertEquals($expected, $this->blackRabbit3->multiplyBy($amount, $multiplier));
    }

    # Updated arrays to make the test fail on purpose
    public function multiplyProvider() {
        return array (
            array(100, 10, 10), # Should work as intended
            array(10, 5, 2) # Should make the method fail
        );
    }


}
