<?php

namespace Alister\Faker\Tests\Provider;

use Alister\Faker\Provider\Skills;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

class SkillsTest extends TestCase
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
    protected function setUp(): void
    {
        $this->skObj = new Skills(new Generator());
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skills
     */
    public function testSkills(): void
    {
        $res = $this->skObj->skills(3);
        $this->assertIsArray($res);
        $this->assertCount(3, $res);
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     */
    public function testSkillsString(): void
    {
        // 3 items, 2 commas to seperate them - x,y,z
        $res = $this->skObj->skillsString(3);
        $this->assertIsString($res);
        $this->assertEquals(2, substr_count($res, ','));

        // 1 item, zero commas to seperate them
        $res = $this->skObj->skillsString();
        $this->assertIsString($res);
        $this->assertEquals(0, substr_count($res, ','));
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     */
    public function testSkillsStringHopefullyAll(): void
    {
        $numInSkillsArray = count(Skills::$skills);
        $this->assertGreaterThanOrEqual(20, $numInSkillsArray);
        $res = $this->skObj->skillsString($numInSkillsArray);
        $this->assertStringContainsString('symfony2', $res, "Expected to get 'symfony2' somewhere");
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skills
     */
    public function testRandomBetween(): void
    {
        $res = $this->skObj->skills(1, count(Skills::$skills));
        $this->assertGreaterThanOrEqual(2, $res, 'expected to get more than one (but is random!)');
    }

    /**
     * @covers Alister\Faker\Provider\Skills::skillsString
     * @covers Alister\Faker\Provider\Skills::skills
     */
    public function testRandomOnlyWhenMaxIsGtZero(): void
    {
        $res = $this->skObj->skillsString(3, 0);    // x,y,z - 2 commas
        $this->assertEquals(2, substr_count($res, ','));

        $res = $this->skObj->skills(3, 0);
        $this->assertCount(3, $res, 'Should only get 3, if Max > 0');
        $res = $this->skObj->skills(3);
        $this->assertCount(3, $res, 'Should only get 3, if Max > 0');
        $res = $this->skObj->skills(3, -1);
        $this->assertCount(3, $res, 'Should only get 3, if Max > 0');
    }

    public function testGettingMoreSkillsThanExist(): void
    {
        $this->expectException('LengthException');
        $qty = 1 + count(Skills::$skills);
        $this->skObj->skillsString($qty);
    }
}
