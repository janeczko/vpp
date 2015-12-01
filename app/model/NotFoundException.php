<?php

namespace App\Model;

class NotFoundException extends \Exception
{
    /** @var string */
    protected $model;

    /**
     * @param string $message
     * @param string $model
     */
    public function __construct($message, $model)
    {
        parent::__construct($message);
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }
}