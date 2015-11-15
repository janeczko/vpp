<?php

namespace App\Model;

use Nette,
    Nette\Security\User as BaseUser,
    Nette\Utils\Strings;

class User extends BaseUser
{
    /** @var string */
    protected $username;

    /** @var string */
    protected $email;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    public function startup()
    {
        $data = $this->identity->data;
        unset($data['id']);

        foreach ($data as $attr => $value)
        {
            $attr = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $attr))));
            $this->{$attr} = $value;
        }
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}