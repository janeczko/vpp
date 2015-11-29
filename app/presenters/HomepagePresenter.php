<?php

namespace App\Presenters;

use Nette,
    App\Model;

class HomepagePresenter extends BasePresenter
{
    const IMAGES_PER_PAGE = 9;

    /** @var Model\Gallery @inject */
    public $galleryModel;

	public function renderDefault()
	{
        $galleryItems = $this->galleryModel->getCarouselItems();
        $allItems = $this->galleryModel->getAllItems();
        $imageViews = [];

        if (!empty($allItems))
        {
            $i = 0;
            $imageViews[$i] = [];

            foreach ($allItems as $item)
            {
                if (count($imageViews[$i]) == self::IMAGES_PER_PAGE)
                {
                    $i++;
                    $imageViews[$i] = [];
                }

                $imageViews[$i][] = (object) $item;
            }
        }

        $this->render([
            'animationTime' => (object) [
                'balloons' => (object) [
                    'h' => 90,
                    'v' => 30
                ],
                'gallery' => 5
            ],
            'galleryItems' => $galleryItems,
            'imageViews' => $imageViews
        ]);
	}

    public function renderTest()
    {
        $this->render();
    }
}
