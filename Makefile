install:
		composer install


brain-games:
		php ./bin/brain-games


brain-even:
		php ./bin/brain-even


validate:
		composer validate


lint:
		composer run-script phpcs


start-game:
		php ./bin/brain-games
		php ./bin/brain-even