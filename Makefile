	.PHONY helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -F helpers/ModelHelper -M
	php artisan ide-helper:meta
