# Parentheses Checker

## Installation
Install this package via [composer](https://getcomposer.org/download/) using the following command
```bash
composer require ilyatos/parentheses-checker
```

## Usage
Use `Ilyatos\Parentheses\Checker` class to check your sentence. Check method returns `true` on right sequence of parenthesis, otherwise returns `false`.

```php
use Ilyatos\Parentheses\Checker;

$checker = new Checker();
$checker->check('()()((()))');
```