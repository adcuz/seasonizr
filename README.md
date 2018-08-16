# Seasonizr
A simple library that returns the season in a given country on a given date. This is for non-critical use, such as changing a bit of UI based on the current season, and should be treated as very low accuracy.

## Install
```bash
composer require adcuz/seasonizr
```

## Usage
```php
use Adcuz\Seasonizr\Conversion;

$conversion = new Conversion();

// Season based on current date
$conversion->country('GB');
```
Output (if today was a winter day):
```
winter
```
Specific date:
```
// June 2nd 2018
$date = (new \DateTime())->setDate(2018, 6, 2);
$conversion->country('GB', $date);
```
Output:
```
summer
```

### Help Wanted

I threw this together quickly to satisfy a need in a project, I'd like to improve it with the help of the community.

### License

This project is open-sourced software licensed under the [Apache License 2.0](http://www.apache.org/licenses/)
