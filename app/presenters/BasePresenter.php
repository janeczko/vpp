<?php

namespace App\Presenters;

use Nette,
    App\Model,
    Nette\Application\UI\Presenter,
    Nette\Database\Context;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter
{
    /** @var string */
    protected $basePath;

    /** @var string */
    protected $publicPath;

    /** @var Context */
    protected $db;

    /** @var Model\User */
    protected $user;

    /**
     * @param Context $database
     */
    public function __construct(Context $database)
    {
        parent::__construct();

        $this->db = $database;
    }

    public function startup()
    {
        parent::startup();

        $this->basePath = $this->template->basePath;
        $this->publicPath = $this->basePath . '/www';
        $this->user = parent::getUser();

        if ($this->user->isLoggedIn())
            $this->user->startup();
    }

    public function beforeRender()
    {
        parent::startup();

        $this->template->base = $this->basePath;
        $this->template->public = $this->publicPath;
    }

    /**
     * @param array $data
     * @param string $view
     */
    protected function render(array $data = [], $view = '')
    {
        if (!empty($view))
            $this->setView($view);

        foreach ($data as $key => $value)
            $this->template->{$key} = $value;
    }

    /**
     * @param string $url
     * @return string
     */
    protected function genUrl($url)
    {
        return $this->basePath . '/' . $url;
    }
}