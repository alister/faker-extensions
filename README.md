# Faker extensions

[![Build Status](https://travis-ci.org/alister/faker-extensions.svg?branch=master)](https://travis-ci.org/alister/faker-extensions)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alister/faker-extensions/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alister/faker-extensions/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/53c05854638521361000009b/badge.svg?style=flat)](https://www.versioneye.com/user/projects/53c05854638521361000009b)

## Available extensions

* Skills - available as array (via skills($qty)) and skillsString($qty)
* LondonDistricts - returns single london district name
  - source: http://en.wikipedia.org/wiki/List_of_areas_of_London

## Use

    use Alister\Faker\Provider\LondonDistricts;

    // and in the code:
    $faker = Faker\Factory::create('en_GB');
    $faker->addProvider(new FakeSkills($faker));
    $faker->addProvider(new LondonDistricts($faker));

They can also be used via the [BazingaFakerBundle](https://github.com/willdurand/BazingaFakerBundle)

    faker.provider.london_districts:
        class: Alister\Faker\Provider\LondonDistricts
        arguments: [@faker.generator]
        tags:
            - { name: bazinga_faker.provider }
