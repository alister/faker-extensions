# Faker extensions

[![Build Status](https://travis-ci.org/alister/faker-extensions.svg?branch=master)](https://travis-ci.org/alister/faker-extensions) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/7ab3ad50-7e5c-48b7-8c96-7fd21234769d/mini.png)](https://insight.sensiolabs.com/projects/7ab3ad50-7e5c-48b7-8c96-7fd21234769d) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alister/faker-extensions/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alister/faker-extensions/?branch=master)
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Falister%2Ffaker-extensions.svg?type=shield)](https://app.fossa.io/projects/git%2Bgithub.com%2Falister%2Ffaker-extensions?ref=badge_shield)

[![Latest Stable Version](https://poser.pugx.org/alister/faker-extensions/v/stable.svg)](https://packagist.org/packages/alister/faker-extensions) [![Total Downloads](https://poser.pugx.org/alister/faker-extensions/downloads.svg)](https://packagist.org/packages/alister/faker-extensions) [![Latest Unstable Version](https://poser.pugx.org/alister/faker-extensions/v/unstable.svg)](https://packagist.org/packages/alister/faker-extensions) [![License](https://poser.pugx.org/alister/faker-extensions/license.svg)](https://packagist.org/packages/alister/faker-extensions)

## Available extensions

* Skills - available as array (via skills($qty)) and skillsString($qty)
* LondonDistricts - returns a single london district name
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


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Falister%2Ffaker-extensions.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Falister%2Ffaker-extensions?ref=badge_large)