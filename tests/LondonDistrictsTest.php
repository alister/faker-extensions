<?php

namespace Alister\Faker\Tests\Provider;

use Alister\Faker\Provider\LondonDistricts;
use Faker\Generator;

class LondonDistrictsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LondonDistricts
     */
    protected $l;

    /**
     * Sets up the fixture, for example, opens a network connection.
     *
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->l = new LondonDistricts(new Generator());
    }

    /**
     * @covers Alister\Faker\Provider\LondonDistricts::londondistricts
     */
    public function testLondondistricts()
    {
        $this->assertInternalType('string', $this->l->londondistricts());
    }
}
