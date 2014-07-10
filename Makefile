all: lint

lint:
    ant lint

test:
    echo nothing to test yet
    #mkdir -p build build/pdepend/.cache/
    #chmod -R 777 build/
    #make cache-install
    #ant
    #vendor/bin/phpunit --list-groups src test app

#phpcs:
#   vendor/bin/phpcs -a --standard=PSR1,PSR2 --extensions=php src/ tests
    
# Run composer, with HHVM
hhvm-composer-update:
    hhvm -v ResourceLimit.SocketDefaultTimeout=30 -v Http.SlowQueryThreshold=30000 /usr/local/bin/composer update

composer-update:
    composer update
