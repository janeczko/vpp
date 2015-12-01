<?php

namespace App\Presenters;

use Nette,
    App\Model;

class EshopPresenter extends BasePresenter
{
    /** @var Model\Category @inject */
    public $categoryModel;

    /** @var Model\EshopProduct @inject */
    public $productModel;

    public function beforeRender()
    {
        parent::beforeRender();

        $this->setActiveMenuItem('Eshop');
        $this->setLayout('layoutEshop');
        $this->template->eshopCategories = $this->categoryModel->findEshopCategories();
    }

    public function renderDefault()
    {
        $this->render([

        ]);
    }

    public function renderCategory($categoryUrl)
    {
        try
        {
            $category = $this->categoryModel->findByUrl($categoryUrl);
            $products = $this->productModel->findByCategoryId($category->id);

            $this->render([
                'category' => $category,
                'products' => $products
            ]);
        }
        catch (Model\NotFoundException $e)
        {
            // pridat flash message (az potom co je nejak zazracne vynaleznu)
            $this->redirectUrl($this->genUrl('eshop'));
        }
    }
}