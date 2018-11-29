install:
	composer install

lint:
	composer run-script phpcs -- --standard=PSR12 src bin

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src bin

reload:
	composer dump-autoload -o

push:
	git add *
	git commit -m '$(commit)'
	git push

release:
	git tag v1.0.$(ver)
	git push origin v1.0.$(ver)
