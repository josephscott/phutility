SHELL = bash
.DEFAULT_GOAL := all

.PHONY: all
all: style lint phpstan pest

.PHONY: style
style:
	@echo
	@echo "--> PHP CS Fixer"
	vendor/bin/php-cs-fixer fix -v
	@echo

.PHONY: lint
lint:
	@echo
	@echo "--> Lint"
	php -l src/numberseries.php
	@echo

.PHONY: phpstan
phpstan:
	@echo
	@echo "--> PHPStan"
	./vendor/bin/phpstan
	@echo

.PHONY: pest
pest:
	@echo
	@echo "--> Pest tests"
	./vendor/bin/pest
	@echo
