<?php
/**
 * Created by PhpStorm.
 * User: kuang
 * Date: 2017/10/15
 * Time: 1:01
 */

namespace kuangjy\RandomLib\Tests;

use kuangjy\RandomLib\RandomLib;
use PHPUnit\Framework\TestCase;


class RandomLibTest extends TestCase
{

    public function testNewComponent()
    {
        $component = new RandomLib();
        $this->assertInstanceOf(RandomLib::class, $component);

        return $component;
    }

    /**
     * @depends testNewComponent
     */
    public function testGenerateNumber($component)
    {
        $number = $component->generateString(6, '0123456789');
        $this->assertRegExp('/\d+?/', $number);
    }
}