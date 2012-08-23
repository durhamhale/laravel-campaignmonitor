# Laravel Campaign Monitor Bundle

**This is a Laravel bundle for the Campaign Monitor API wrapper.**

It uses the [official API wrapper](https://github.com/campaignmonitor/createsend-php), which is described on the [Campaign Monitor](http://www.campaignmonitor.com/api) website as:

>	A comprehensive PHP library which implements the complete functionality of v3 of the Campaign Monitor API including graceful error handling.

## Setup

1. Copy the sample config file (``config/campaignmonitor-sample.php``) to ``application/config/campaignmonitor.php``. 
2. Enter your [API key] into the file.

Help on finding your API key and all the other API IDs mentioned below can be found on the [Getting Started section of the Campaign Monitor API site](http://www.campaignmonitor.com/api/getting-started)

## Bundle Registration

Either auto-load by entering the following code in ``application/bundles.php``...

```php
'campaignmonitor' => array(
	'auto' => true
),
```

...or load it each time you need it by using:

```php
Bundle::start('campaignmonitor');
```

## Usage

All calls should be started with:

```php
CampaignMonitor::LIBRARY(LIBRARY_ID);
```

``LIBRARY`` should be replaced with one item from the list below depending on the interaction required. ``LIBRARY_ID`` should be replaced with the API ID for that library. See the example below for help.

* administrators
* campaigns - requires campaign id
* clients - requires client id
* general
* lists - requires list id
* people - require client id
* segments - requires segment id
* subscribers - requires list id
* templates - requires template id

**_IMPORTANT:_** Please note all of the library names are plural except general.

All the functions in the API are covered. You can find details on them all on the [Campaign Monitor API](http://www.campaignmonitor.com/api) website or by browsing the following files:

```php
vendor/csrest_administrators.php
vendor/csrest_campaigns.php
vendor/csrest_clients.php
vendor/csrest_general.php
vendor/csrest_lists.
vendor/csrest_people.php
vendor/csrest_segments.php
vendor/csrest_subscribers.php
vendor/csrest_templates.php
```

## Examples

### Get a list of all available timezones

```php
$timezones = CampaignMonitor::general()->get_timezones();
```

### Get a list of all the subscriber lists for a client

```php
CampaignMonitor::clients($client_id)->get_lists();
```

### Get a list of active subscribers on a list from 1st March 2012

```php
CampaignMonitor::lists($list_id)->get_active_subscribers('2012-03-01');
```