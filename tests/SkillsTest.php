<?php

namespace Alister\Faker\Tests\Provider;

use Alister\Faker\Provider\Skills;
use Faker\Generator;

class SkillsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Skills
     */
    protected $skObj;

    /**
     * Sets up the fixture, for example, opens a network connection.
     *
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->skObj = new Skills(new Generator());
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skills
     */
    public function testSkills()
    {
        $res = $this->skObj->skills(3);
        $this->assertInternalType('array', $res);
        $this->assertCount(3, $res);
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     */
    public function testSkillsString()
    {
        // 3 items, 2 commas to seperate them - x,y,z
        $res = $this->skObj->skillsString(3);
        $this->assertInternalType('string', $res);
        $this->assertEquals(2, substr_count($res, ','));

        // 1 item, zero commas to seperate them
        $res = $this->skObj->skillsString();
        $this->assertInternalType('string', $res);
        $this->assertEquals(0, substr_count($res, ','));
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     */
    public function testSkillsStringHopefullyAll()
    {
        $numInSkillsArray = count(Skills::$skills);
        $this->assertGreaterThanOrEqual(20, $numInSkillsArray);
        $res = $this->skObj->skillsString($numInSkillsArray);
        $this->assertContains('symfony2', $res, "Expected to get 'symfony2' somewhere");
    }

    /**
     * @expectedException \LengthException
     */
    public function testGettingMoreSkillsThanExist()
    {
        $qty = 1 + count(Skills::$skills);
        $this->skObj->skillsString($qty);
    }
}
