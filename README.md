The Meetup ListBuilder is a command line tool for searching groups and events by zip code using Meetup's public-facing API.

## Setup

This app was built on the following libraries with Composer package manager (version 1.2.4):

=========================
PHP version: 5.6.29
PHPUnit version: 5.5.7
=========================

Note: As a short-term solution, this repo uses API keys in code that would ultimately be replaced with environmental variables.

## Using ListBuilder

ListBuilder can be run from the command line through the repository's 'runner.php' file. Successful requests take two parameters: a search type ('event' or 'group') and a five-digit zip code. 

Error handling is in place for invalid requests and queries that don't return group or event (a possibility in less dense places). 

Below is a list of valid and invalid requests.

### Valid requests:

- php runner.php group 44070
- php runner.php event 80302

### Invalid requests: 

- php runner.php events 44070
- php runner.php event 7702
- php runner.php group 445212
- php runner.php event

## Running Tests

This repo includes a fully passing test suite of its five classes. Tests are stored in the subfolder '/tests' and should be run individually using PHPunit's '--debug' command. 

Run individual test files from the command line using the following command:

- phpunit --debug tests/<file>.php

Because of different user's variable file paths to PHPUnit, no config file is set up to autoload all required files, and thus running to the entire test suite at once is not possible.

