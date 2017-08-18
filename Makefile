all: tidy lint test

lint:
	ant php-lint-ci

test: security full-test

full-test:
	ant

phpcs:
	vendor/bin/phpcs -a --standard=PSR2 --extensions=php src/ tests

composer-update:
	composer update

tidy:
	find . -type d -name 'vendor' -prune -o  \( -perm /ugo=x -iname '*.md' -o -iname '*php' -o -iname '.*yml' -o -iname '*json' -o -name 'LICENSE' -o -name '*.xml' \) -print | xargs chmod -x

security:
	vendor/bin/security-checker   security:check
