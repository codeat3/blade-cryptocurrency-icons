<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeCryptocurrencyIcons\BladeCryptocurrencyIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('cri-xrp')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm7.07-24l-4.574 4.523a3.556 3.556 0 01-4.996 0L8.93 8H6.035l6.02 5.957a5.621 5.621 0 007.89 0L25.961 8h-2.89zM8.895 24.563L13.504 20a3.556 3.556 0 014.996 0l4.605 4.563H26l-6.055-5.993a5.621 5.621 0 00-7.89 0L6 24.562h2.895z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('cri-xrp', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm7.07-24l-4.574 4.523a3.556 3.556 0 01-4.996 0L8.93 8H6.035l6.02 5.957a5.621 5.621 0 007.89 0L25.961 8h-2.89zM8.895 24.563L13.504 20a3.556 3.556 0 014.996 0l4.605 4.563H26l-6.055-5.993a5.621 5.621 0 00-7.89 0L6 24.562h2.895z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('cri-xrp', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm7.07-24l-4.574 4.523a3.556 3.556 0 01-4.996 0L8.93 8H6.035l6.02 5.957a5.621 5.621 0 007.89 0L25.961 8h-2.89zM8.895 24.563L13.504 20a3.556 3.556 0 014.996 0l4.605 4.563H26l-6.055-5.993a5.621 5.621 0 00-7.89 0L6 24.562h2.895z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-cryptocurrency-icons.class', 'awesome');

        $result = svg('cri-xrp')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm7.07-24l-4.574 4.523a3.556 3.556 0 01-4.996 0L8.93 8H6.035l6.02 5.957a5.621 5.621 0 007.89 0L25.961 8h-2.89zM8.895 24.563L13.504 20a3.556 3.556 0 014.996 0l4.605 4.563H26l-6.055-5.993a5.621 5.621 0 00-7.89 0L6 24.562h2.895z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-cryptocurrency-icons.class', 'awesome');

        $result = svg('cri-xrp', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm7.07-24l-4.574 4.523a3.556 3.556 0 01-4.996 0L8.93 8H6.035l6.02 5.957a5.621 5.621 0 007.89 0L25.961 8h-2.89zM8.895 24.563L13.504 20a3.556 3.556 0 014.996 0l4.605 4.563H26l-6.055-5.993a5.621 5.621 0 00-7.89 0L6 24.562h2.895z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeCryptocurrencyIconsServiceProvider::class,
        ];
    }
}
