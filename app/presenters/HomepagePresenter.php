<?php

namespace App\Presenters;

use Nette;

class HomepagePresenter extends BasePresenter
{
	public function renderDefault()
	{
        $this->render([
            'animationTime' => (object) [
                'balloons' => (object) [
                    'h' => 90,
                    'v' => 30
                ]
            ]
        ]);
	}
}
