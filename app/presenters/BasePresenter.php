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
    const GOOGLE_MAPS_KEY = 'AIzaSyB9V3Oag-_obqJ8JH5Ol0QbNAGGpGKFJrM';

    /** @var string */
    protected $basePath;

    /** @var string */
    protected $publicPath;

    /** @var Context */
    protected $db;

    /** @var Model\User */
    protected $user;

    /** @var string */
    protected $activeMenuItem;

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
        $this->activeMenuItem = 'Homepage';

        if ($this->user->isLoggedIn())
            $this->user->startup();
    }

    public function beforeRender()
    {
        parent::startup();

        $this->template->base = $this->basePath;
        $this->template->public = $this->publicPath;
        $this->template->action = $this->getAction();
        $this->template->controller = $this->getName();
        $this->template->googleMapsKey = self::GOOGLE_MAPS_KEY;
        $this->template->baseCssPath = 'www/css/' . strtolower($this->getName() . '-' . $this->getAction()) . '.css';
        $this->template->baseCssExists = file_exists($this->template->baseCssPath);
        $this->template->baseJsPath = 'www/js/' . strtolower($this->getName() . '-' . $this->getAction()) . '.js';
        $this->template->baseJsExists = file_exists($this->template->baseJsPath);
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

        $this->template->activeMenuItem = $this->activeMenuItem;
    }

    /**
     * @param string $url
     * @return string
     */
    protected function genUrl($url)
    {
        return $this->basePath . '/' . $url;
    }

    /**
     * @param string $itemName
     */
    protected function setActiveMenuItem($itemName)
    {
        $this->activeMenuItem = $itemName;
    }
}