install:
		composer install


brain-games:
		php ./bin/brain-games


brain-even:
		php ./bin/brain-even


brain-calc:
		php ./bin/brain-calc


validate:
		composer validate


lint:
		composer run-script phpcs