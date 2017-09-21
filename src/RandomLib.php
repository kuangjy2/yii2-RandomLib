<?php
/**
 * Created by PhpStorm.
 * User: kuang
 * Date: 2017/9/22
 * Time: 5:30
 */

namespace kuangjy\RandomLib;

use yii\base\Component;
use RandomLib\Factory;
use RandomLib\Generator;
use SecurityLib\Strength;

class RandomLib extends Component
{
    /**
     * @var int
     */
    public $strength = Strength::MEDIUM;
    /**
     * @var \RandomLib\Generator
     */
    protected $generator;


    public function init()
    {
        $generator = $this->prepareGenerator();
        if (!$this->generator instanceof Generator) {
            $this->generator = $generator;
        }
    }

    /**
     * @return \RandomLib\Generator
     */
    protected function prepareGenerator()
    {
        $factory = new Factory;
        return $factory->getGenerator(new Strength($this->strength));
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->generator, $method], $parameters);
    }
}