<p align="center">
    <img src="https://banners.beyondco.de/Blade%20Cryptocurrency Icons.png?theme=light&packageManager=composer+require&packageName=codeat3%2Fblade-cryptocurrency-icons&pattern=architect&style=style_1&description=A+package+to+use+Cryptocurrency Icons+in+your+Laravel+Blade+views&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg" width="1280" title="Social Card Blade Cryptocurrency Icons">
</p>

# Blade Simple Icons

<a href="https://github.com/codeat3/blade-cryptocurrency-icons/actions?query=workflow%3ATests">
    <img src="https://github.com/codeat3/blade-cryptocurrency-icons/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.styleci.io/repos/258753939">
    <img src="https://github.styleci.io/repos/258753939/shield?style=flat" alt="Code Style">
</a>
<a href="https://packagist.org/packages/codeat3/blade-cryptocurrency-icons">
    <img src="https://img.shields.io/packagist/v/codeat3/blade-cryptocurrency-icons" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/codeat3/blade-cryptocurrency-icons">
    <img src="https://img.shields.io/packagist/dt/codeat3/blade-cryptocurrency-icons" alt="Total Downloads">
</a>

A package to easily make use of [Cryptocurrency Icons](https://github.com/spothq/cryptocurrency-icons) in your Laravel Blade views.

For a full list of available icons see [the SVG directory](resources/svg) or preview them at [cryptoicons.co](http://cryptoicons.co/).

## Requirements

- PHP 7.3 or higher
- Laravel 7.14 or higher

## Installation

```bash
composer require codeat3/blade-cryptocurrency-icons
```

## Updating

Please refer to [`the upgrade guide`](UPGRADE.md) when updating the library.

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-cri-xrp/>
```

You can also pass classes to your icon components:

```blade
<x-cri-xrp class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-cri-xrp style="color: #555"/>
```

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-cri --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-cri/xrp.svg') }}" width="10" height="10"/>
```

### Blade Icons

Blade Cryptocurrency Icons uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/blade-ui-kit/blade-icons) for additional functionality.

## Changelog

Check out the [CHANGELOG](CHANGELOG.md) in this repository for all the recent changes.

## Maintainers

Blade Simple Icons is developed and maintained by [Swapnil Sarwe](https://swapnilsarwe.com).

## License

Blade Simple Icons is open-sourced software licensed under [the MIT license](LICENSE.md).
