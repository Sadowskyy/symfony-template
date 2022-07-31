ci:
	vendor/bin/phpstan analyse src --level 9
	bin/phpunit

test:
	bin/phpunit