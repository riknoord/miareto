<?php namespace App\Lib\Presenter;

/**
 * Class Presenter
 * @package App\Lib\Presenter
 */
abstract class Presenter {

    /**
     * @var
     */
    protected $entity;

    /**
     * @param $entity
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param $function
     * @return mixed
     */
    public function __get($function)
    {
        if(method_exists($this,$function))
        {
            return $this->{$function}();
        }
        else
        {
            return $this->entity->{$function}();
        }
    }
} 