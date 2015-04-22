<?php namespace App\Lib\Presenter;

use App\Lib\Presenter\PresenterException;

trait PresentableTrait {

    protected static $presenterInstance;

    public function present(){

        if(! $this->presenter or ! class_exists($this->presenter))
        {
            return new PresenterException('Please set your $presenter property on the model.');
        }

        if(!isset(static::$presenterInstance))
        {
            static::$presenterInstance = new $this->presenter($this);
        }

        return static::$presenterInstance;
    }

} 