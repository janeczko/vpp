<?php
namespace App\Presenters;

use Nette,
    App\Model;

abstract class BaseAdminPresenter extends BasePresenter
{
    /** @var Model\UserModel @inject */
    public $userModel;

    /** @var Model\UserManager @inject */
    public $userManager;

    public function startup()
    {
        parent::startup();

        if (!$this->user->isLoggedIn())
        {
            if (!($this->getName() == 'AdminUser' && $this->getAction() == 'login'))
                $this->redirectUrl($this->genUrl('admin/prihlasit'));
        }
        else
        {
            if ($this->getName() == 'AdminUser' && $this->getAction() == 'login')
                $this->redirectUrl($this->genUrl('admin'));
        }
    }
}