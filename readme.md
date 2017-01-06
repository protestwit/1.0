#About
Protestwit is a twitter indexing platform that allows it's users to define groups and the tags that those groups are associated with.
It then indexes all tweets and their retweets maintaining a relationship between the tweet authors , their tweets, tags, groups and statistics.

In the example app, our seed data is tied to #nodapl for example.
You can see tweets as they come in real time, set filters for those tweets for instance 
limit by retweet count and then display those tweets on the groups page.

The vision for protestwit is a two way means of topical communication that brings interested groups of people together based on the things they 
are talking about, providing tools for colaboration and uncensored media in a way that can be customized for the group's situation.

#Installation
* Install Node
* Install Ruby
* Install Mongodb
* Install Apache/Nginx point your vhost to the /public directory
* Copy .env.example to .env and configure
    * DB_ARCHIVE_ATTRIBUTES are for your mongodb instance, by default null USERNAME and null PASSWORD works
    * DB_HOST etc. is for your MySQL instance
    * BROADCAST_DRIVER should be redis
    * BROADCAST_DRIVER should be redis
    * TWITTER_OPERATOR_ID is your twitter user id found here: http://gettwitterid.com/
    * TWITTER_CALLBACK_URL is your twitter app's Callback URL found here: https://apps.twitter.com/
    * TWITTER_OPERATOR_NAME is your twitter handle
    * TWITTER_CONSUMER_KEY is your Consumer Key (API Key) found here: https://apps.twitter.com/
    * TWITTER_CONSUMER_SECRET is your Consumer Secret (API Secret) found here: https://apps.twitter.com/
    * TWITTER_ACCESS_TOKEN is your Access Token found here: https://apps.twitter.com/
    * TWITTER_ACCESS_TOKEN_SECRET is your Access Token Secret found here: https://apps.twitter.com/
    * GOOGLE_PLACES_CONSUMER_KEY is your Api key found under credentials here: https://console.developers.google.com/apis/dashboard?project=pbpma-999&duration=PT1H
* Composer Install
```composer install
```
* Navigate to each of the subdirectories of vendor/protestwit and run:
```composer install
```
* Setup your key
```php artisan key:generate
```
* Run server migrations - note :refresh will delete any data
```php artisan migrate:refresh
```
* install job queue table
```php artisan queue:table && php artisan migrate
```
* Seed the database
```php artisan db:seed
```
* install node modules
```npm install
```
* install bower components
```bower install
```
* run gulpfile
``` gulp
```
* To start listening for tweets: (note that this has to be running in a separate console)
```php artisan connect_group_tweet_listeners
```
* To start processing tweets: (note that this has to be running in a separate console)
```php artisan queue:listen
```
















#Console Commands

To start watching gulp: gulp watch
To start your sockets: node socket.js
To start your mongo instance: mongod




@todo re-enable csrf

# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
