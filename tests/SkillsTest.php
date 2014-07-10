<?php
namespace Alister\Faker\Tests\Provider;

use Alister\Faker\Provider\Skills;
use Faker\Generator;

class SkillsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Skills
     */
    protected $s;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->s = new Skills(new Generator);
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skills
     */
    public function testSkills()
    {
        $x = $this->s->skills(3);
        $this->assertInternalType('array', $x);
        $this->assertCount(3, $x);
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     */
    public function testSkillsString()
    {
        // 3 items, 2 commas to seperate them - x,y,z
        $x = $this->s->skillsString(3);
        $this->assertInternalType('string', $x);
        $this->assertEquals(2, substr_count($x, ','));

        // 1 item, zero commas to seperate them
        $x = $this->s->skillsString();
        $this->assertInternalType('string', $x);
        $this->assertEquals(0, substr_count($x, ','));
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     */
    public function testSkillsStringHopefullyAll()
    {
        $x = $this->s->skillsString(count(Skills::$skills));
        $this->assertContains('symfony2', $x, "Expected to get 'symfony2' somewhere");
    }

    /**
     * @expectedException \LengthException
     */
    public function testGettingMoreSkillsThanExist()
    {
        $qty = 1 + count(Skills::$skills);
        $this->s->skillsString($qty);
    }
}
