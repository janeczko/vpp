<?php

namespace App\Presenters;

use Nette,
    App\Model;

class HomepagePresenter extends BasePresenter
{
    /** @var Model\Gallery @inject */
    public $galleryModel;

	public function renderDefault()
	{
        $this->render([
            'animationTime' => (object) [
                'balloons' => (object) [
                    'h' => 90,
                    'v' => 30
                ]
            ],
            'galleryItems' => $this->galleryModel->getItems()
        ]);
	}
}
