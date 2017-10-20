<?php
/**
 * Created by PhpStorm.
 * User: kuang
 * Date: 2017/10/15
 * Time: 1:01
 */

namespace kuangjy\RandomLib\Tests;

use kuangjy\RandomLib\RandomLib;
use SecurityLib\Strength;


class RandomLibTest extends TestCase
{

    public function testNewComponent()
    {
        $component = new RandomLib(['strength' => Strength::MEDIUM]);
        $this->assertInstanceOf(RandomLib::class, $component);

        return $component;
    }

    /**
     * @depends testNewComponent
     * @param $component
     */
    public function testGenerateNumber($component)
    {
        $number = $component->generateString(6, '0123456789');
        $this->assertRegExp('/\d+?/', $number);
        $this->assertEquals(6, strlen($number));
    }
}