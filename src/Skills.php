<?php
namespace Alister\Faker\Provider;

use \Faker\Provider\Base as FakerBase;

class Skills extends FakerBase
{
    static $skills = array(
        'agile', 'android', 'angular.js', 'apache', 'api', 'backbone.js',
        'bootstrap', 'less', 'scss', 'c#', 'c++',
        'cassandra', 'chef', 'ci', 'clojure', 'concurrency', 'css',
        'database', 'dba', 'developer', 'devops', 'django', 'drupal',
        'engineer', 'frontend', 'games', 'github', 'hadoop', 'hibernate',
        'html5', 'ios', 'java', 'javascript', 'lamp', 'linux', 'low-latency',
        'mobile', 'mongodb', 'mysql', 'nginx', 'node-js', 'nosql',
        'objective-c', 'php', 'postgresql', 'puppet', 'python', 'redis',
        'rest', 'ruby', 'ruby-on-rails', 'scala', 'scalability', 'scaling',
        'spring', 'sql-server', 'symfony', 'symfony2', 'sysadmin', 'systems', 
        'tdd', 'telecomms', 'testing', 'tomcat', 'unix', 'ux', 'varnish', 
        'wpf', 'xcode', 'zend', 'zf2',
    );

    /**
     * Generate fake 'skills', from a list
     * @example 'zf2' or ['css', 'redis']
     */
    public static function skills($qty = 1)
    {
        return self::randomElements(self::$skills, $qty);
        shuffle($skills);
        return array_slice($skills, 0, $qty);
    }

    public function skillsString($qty = 1)
    {
        return implode(',', $this->skills($qty));
    }
}
