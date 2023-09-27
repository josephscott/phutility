SHELL = bash
.DEFAULT_GOAL := all

.PHONY: all
all: lint phpstan

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
