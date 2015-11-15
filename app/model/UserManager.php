<?php

namespace App\Model;

use Nette,
    Nette\Object,
    Nette\Database\Context,
    Nette\Security\IAuthenticator,
    Nette\Security\Passwords,
    Nette\Security\Identity,
    Nette\Security\AuthenticationException,
    Nette\Database\UniqueConstraintViolationException;


/**
 * Users management.
 */
class UserManager extends Object implements IAuthenticator
{
	/** @var Context */
	protected $db;

    /** @var UserModel */
    protected $userModel;

	public function __construct(Context $database, UserModel $user)
	{
		$this->db = $database;
        $this->userModel = $user;
	}


    /**
     * @param array $credentials
     * @return Identity
     * @throws AuthenticationException
     */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;

        $user = $this->userModel->findBy('username', $username);
        $usernameFail = false;

		if (!$user)
            $usernameFail = true;

        if ($usernameFail)
        {
            $user = $this->userModel->findBy('email', $username);

            if (!$user)
                throw new AuthenticationException('Špatné přihlašovací jméno nebo email.', self::IDENTITY_NOT_FOUND);
        }

        if (!Passwords::verify($password, $user->password))
			throw new AuthenticationException('Špatné heslo.', self::INVALID_CREDENTIAL);

        if (Passwords::needsRehash($user->password))
        {
            $user->password = $this->db->table('user')->where('id', $user->id)->update([
                'password' => Passwords::hash($password)
            ])->password;
		}

		$arr = (array) $user;
		unset($arr['password']);

		return new Identity($user->id, $user->role, $arr);
	}


    /**
     * @param \stdClass $user
     * @throws DuplicateNameException
     */
	public function add(\stdClass $user)
	{
        try
        {
            $this->userModel->add([
                'username' => $user->username,
                'email' => $user->email,
                'password' => Passwords::hash($user->password),
                'first_name' => $user->firstName,
                'last_name' => $user->lastName
            ]);
        }
        catch (UniqueConstraintViolationException $e)
        {
            throw new DuplicateNameException();
        }
	}
}


class DuplicateNameException extends \Exception
{
}