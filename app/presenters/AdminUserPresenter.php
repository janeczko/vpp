<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form,
    App\Forms,
    Nette\Security\AuthenticationException;

class AdminUserPresenter extends BaseAdminPresenter
{
    public function renderLogin()
    {
        $this->render();
    }

    public function createComponentLoginForm()
    {
        $form = new Form();

        $form->addText('username')->setRequired();
        $form->addPassword('password')->setRequired();
        $form->addSubmit('logIn');
        $form->onSuccess[] = $this->loginFormSucceeded;

        return $form;
    }

    public function loginFormSucceeded(Form $form, $values)
    {
        if ($this->auth($form, $values))
            $this->redirectUrl($this->genUrl('admin'));
    }

    public function actionLogout()
    {
        $this->user->logout(true);
        $this->redirect('Homepage:default');
    }

    public function renderRegister()
    {
        $this->render([
            'admins' => $this->admin->findAll()
        ]);
    }

    public function createComponentRegisterForm()
    {
        $form = new Form();

        $form->addText('username')->setRequired();
        $form->addText('email')->setRequired();
        $form->addPassword('password')->setRequired()->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', 3);
        $form->addPassword('passwordVerify')->setRequired()->addRule(Form::EQUAL, 'Hesla se neshodují', $form['password']);
        $form->addText('firstName')->setRequired();
        $form->addText('lastName')->setRequired();
        $form->addSubmit('createAccount');
        $form->onSuccess[] = $this->registerFormSucceeded;

        return $form;
    }

    public function registerFormSucceeded(Form $form, $values)
    {
        if ($this->addUser($form, $values))
            $this->redirectUrl($this->genUrl('admin'));
    }

    protected function addUser(Form $form, $values)
    {
        try
        {
            if ($this->admin->findBy('username', $values->username, 'id') != false)
                throw new \Exception('Uživatelské jméno nelze použít');

            if ($this->admin->findBy('email', $values->email, 'id') != false)
                throw new \Exception('E-mail nelze použít');

            unset($values->passwordVerify);
            $this->userManager->add($values);

            return true;
        }
        catch (\Exception $e)
        {
            $form->addError($e->getMessage());
            return false;
        }
    }

    protected function auth(Form $form, $values)
    {
        try
        {
            $this->user->login($values->username, $values->password);
            return true;
        }
        catch (AuthenticationException $e)
        {
            $form->addError($e->getMessage());
            return false;
        }
    }
}