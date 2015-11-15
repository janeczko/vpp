<?php

namespace App\Presenters;

use Nette;

class HomepagePresenter extends BasePresenter
{
	public function renderDefault()
	{
        $nice = 'amazonsky prales';
        $hnus = $this->crypt('hovno', $nice);
        dump($hnus);
        $deHnus = $this->crypt('hovno', $hnus, false);
        dump($deHnus);

        $this->render();
	}

    private function crypt($key, $text, $encrypt = true)
    {
        $alphabet = [];

        for ($c = 'A'; ($c >= 'A' && $c <= 'Z') || ($c >= 'a' && $c <= 'z'); $c++)
        {
            $alphabet[$c] = ord($c);

            if ($c == 'Z')
                $c = 'a';
            else if ($c == 'z')
                break;
        }


        if ($encrypt)
        {

        }
    }
}
