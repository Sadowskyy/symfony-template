ci:
	vendor/bin/phpstan analyse src --level 9
	bin/console --env=test dev:test-db:init
	bin/phpunit -d memory_limit=512M

test:
	bin/console --env=test dev:test-db:init
	bin/phpunit