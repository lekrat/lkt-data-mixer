<?php

namespace Lkt\Tests;

use Lkt\DataMixer;
use Lkt\Tests\Assets\SampleDataMixer;
use PHPUnit\Framework\TestCase;

class DataMixerTest extends TestCase
{
    /**
     * @return void
     */
    public function testOne()
    {
        DataMixer::add('test', [SampleDataMixer::class, 'addMixedDataOne']);
        $mixedData = DataMixer::mixData('test');
        $this->assertEquals([], $mixedData);

        DataMixer::add('test', [SampleDataMixer::class, 'addMixedDataTwo']);
        $mixedData = DataMixer::mixData('test');
        $expected = [
            'sample' => 'addMixedDataTwo'
        ];
        $this->assertEquals($expected, $mixedData);

        DataMixer::add('test', [SampleDataMixer::class, 'addMixedDataThree']);
        $mixedData = DataMixer::mix('test', [
            'data' => ['hello' => 'world']
        ]);
        $expected = [
            'sample' => 'addMixedDataTwo',
            'hello' => 'world'
        ];
        $this->assertEquals($expected, $mixedData);

        $mixedData = DataMixer::mixData('test', [
            'hello' => 'world'
        ]);
        $expected = [
            'sample' => 'addMixedDataTwo',
            'hello' => 'world',
        ];

        $this->assertEquals($expected, $mixedData);
    }
}