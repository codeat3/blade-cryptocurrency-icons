<?php

use Codeat3\BladeIconGeneration\IconProcessor;

$svgNormalization = static function (string $tempFilepath, array $iconSet) {

    // perform generic optimizations
    $iconProcessor = new IconProcessor($tempFilepath, $iconSet);
    $iconProcessor
        ->optimize(pre: function (&$svgEL) {

            $width = $svgEL->getAttribute('width');
            $height = $svgEL->getAttribute('height');
            $vBox = $svgEL->getAttribute('viewBox') ?: '0 0 '.$width.' '.$height.'';
            $svgEL->setAttribute('viewBox', $vBox);

        })
        ->postOptimizationAsString(function ($svgLine) {
            return str_replace([
                'fill="#1D1D1D"',
                'fill="#181818"',
                'fill="#000"',
            ], 'fill="currentColor"', $svgLine);
        })
        ->save();
};

return [
    [
        // Define a source directory for the sets like a node_modules/ or vendor/ directory...
        'source' => __DIR__.'/../dist/svg/black/',

        // Define a destination directory for your icons. The below is a good default...
        'destination' => __DIR__.'/../resources/svg',

        // Enable "safe" mode which will prevent deletion of old icons...
        'safe' => false,

        // Call an optional callback to manipulate the icon
        // with the pathname of the icon and the settings from above...
        'after' => $svgNormalization,

        'is-solid' => true,

    ],
];
