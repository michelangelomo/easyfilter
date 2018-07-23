# Easy Filter
EasyFilter helps you to filter eloquent queries

## Requirements
- **[PHP 7.0+](https://php.net/releases/)**
- **[Laravel 5.6+](https://github.com/laravel/laravel)**

## Installation
```bash
composer require michelangelomo/easyfilter
```

## Usage
```php
use Michelangelo\EasyFilter\EasyFilter;
$filter = new EasyFilter($query);
$filter->orderByDesc('id');

$filter->whereLike('name', 'giovanni', '%', '%');

$filter->whereHasEquals('roles', 'name', 'admin');

//and other methods...
```

## Example
```php
//Get some users
$users = User::where('company', 'Antani Inc.');
//Instantiating class
$filter = new EasyFilter($users);
$filter->whereCustom('id', '>=', 6); 
$filter->whereNotEquals('name', 'John');
$filter->whereHasEquals('roles', 'id', 1);
$filter->whereHasNotEquals('roles', 'id', 4);
//and so on
//....
//Finally get filtered users
$users->get();
```
