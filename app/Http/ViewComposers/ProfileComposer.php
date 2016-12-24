<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

Class ProfileComposer
{
	public function compose(View $view)
	{
		$view->with('married',random_int(0, 1));

		$view->with('test','Say test');
	}
}