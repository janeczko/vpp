<?php

namespace App\Presenters;

use Nette;

class EshopPresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->setActiveMenuItem('Eshop');

        $this->render();
    }
}