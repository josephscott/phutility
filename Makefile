SHELL = bash
.DEFAULT_GOAL := all

.PHONY: all
all: lint

.PHONY: lint
lint:
	@echo
	@echo "--> Lint"
	php -l src/numberseries.php
	@echo
