<?php
/**
 * Created by PhpStorm.
 * User: Pt1c
 * Date: 08.11.2015
 * Time: 18:06
 */

namespace cubiclab\base;

use Yii;
use yii\base\InvalidConfigException;

//use yii\base\BootstrapInterface;

class BaseCube extends \yii\base\Module //implements BootstrapInterface
{
    const VERSION = "0.0.1-prealpha";

    /**
     * @var string|null Module name
     */
    public static $name;
    /**
     * @var string Module company
     */
    public static $company = 'cubiclab';
    /**
     * @var boolean Whether module is used for backend or not
     */
    public $isACP = false;

    public function init()
    {
        if (static::$name === null) {
            throw new InvalidConfigException('Module "name" property must be set.');
        }
        if ($this->isACP === true) {
            $this->setViewPath('@'.static::$company.'/'.static::$name.'/views/backend');
            if ($this->controllerNamespace === null) {
                $this->controllerNamespace = static::$company .'\\'.static::$name.'\controllers\backend';
            }
        } else {
            $this->setViewPath('@'.static::$company.'/'.static::$name.'/views/frontend');
            if ($this->controllerNamespace === null) {
                $this->controllerNamespace = static::$company.'\\'.static::$name.'\controllers\frontend';
            }
        }
        parent::init();
    }

}


