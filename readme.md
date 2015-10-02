# NBrowserKit example

This is a demo of [NBrowserKit](https://github.com/VaclavSir/NBrowserKit), which is an integration of BrowserKit into Nette Framework.

This example is based on [Nette Sandbox](https://github.com/nette/sandbox), a pre-packaged and pre-configured Nette Framework application that one can use as the skeleton for a new applications.

## Look at the example test

It's located at [tests/ExampleTest.phpt](https://github.com/VaclavSir/NBrowserKit-example/blob/master/tests/ExampleTest.phpt).

## Installing

### Install dependencies using Composer:

	composer install

### Initialize the database

By default, it connects to `mysql://127.0.0.1/test`. If you want a different host or database name, edit `app/config/config.local.neon`.

Create the users table in the database:

	CREATE TABLE `users` (
		`id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
		`username` VARCHAR(255) NOT NULL,
		`password` VARCHAR(255) NOT NULL,
		`role` VARCHAR(255) NOT NULL,
		UNIQUE KEY `unq_username` (`username`)
	) ENGINE = 'InnoDB', COLLATE 'utf8_czech_ci';
	INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
	(1,	'foo',	'$2y$10$vGy6tDDa.CXNwtinrqzudubf0ZYmU6NWtjqFKMNZ7RLrgy045OF7G',	'');

## Run Tests

	vendor/bin/tester tests

## License

- NBrowserKit: MIT
- NBrowserKit Example: WTFPL
- Nette: New BSD License or GPL 2.0 or 3.0 (http://nette.org/license)
- Adminer: Apache License 2.0 or GPL 2 (http://www.adminer.org)
