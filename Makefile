SHELL = bash
.DEFAULT_GOAL := all

.PHONY: all
all: lint phpstan pest

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
