install:
		composer install


brain-games:
		php ./bin/brain-games


validate:
		composer validate


lint:
		composer run-script phpcs