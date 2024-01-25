# PHPUnit experimental project

Requires:
 - PHP installed in local machine
 - composer installed in local machine

## Run test

### Run all test cases
- Clone this project
- Install dependencies
```
composer install
```

Note: If you add more classes or change the class name, you have to re-generate the `autoload` file by running: `composer dump-autoload`

- Run test

On MacOS or Linux:

```
composer test_unix
```

On Windows:

```
composer test_win
```

### Run a specific test case
- Run as following command:
```
./vendor/bin/phpunit <filename> 

e.g 
./vendor/bin/phpunit test/00_hello_phpunit/HelloPHPUnitTest.php 
```

## Code structure

- All production code is put in folder `src` 

  - Each case will have a separate folder (e.g 00_hello_phpunit, ...)
  - In each folder, File `main.js` is where the code in that folder is used as examples.
    - You can run those files by command: `php -f <file_name>`
    - E.g: `php -f src/02_test_double/GameServer/main.php`
  
- All test code is put in folder `test`

## Reference documents

- [Juan Treminio's blog](https://jtreminio.com/blog/unit-testing-tutorial-part-v-mock-methods-and-overriding-constructors/)
- [PHPUnit manual](https://phpunit.readthedocs.io/en/9.1/index.html) 

Indeed, PHPUnit munual lacks many documentations, Juan Treminio's notes give us many more information about mocking objects, I own him a big thanks.

## Register CircleCI project

I've already included the `.circleci/config.yml` file to make it easier for you to integrate this project into CircleCI to perform continuous integration for every changes happen in source code. All you have to do is:

- Go to [circleci.dev.cybozu.co.jp](https://circleci.dev.cybozu.co.jp/)
- Go to `ADD PROJECTS` panel and register this repository to CircleCI
  - You can refer document here: [Introduction to CircleCI](https://sharedoc.atlassian.net/wiki/x/owDXGw).
- Done! CircleCI is taking care of your source code.