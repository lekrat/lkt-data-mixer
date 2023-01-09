<?php

namespace Lkt\Tests\Assets;

class SampleDataMixer
{
    public static function addMixedDataOne(array $data = []): array
    {
        return [];
    }

    public static function addMixedDataTwo(array $data = []): array
    {
        return [
            'sample' => 'addMixedDataTwo'
        ];
    }

    public static function addMixedDataThree(array $data = []): array
    {
        return $data;
    }
}