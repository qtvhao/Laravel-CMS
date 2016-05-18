<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BootswatchServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		Blade::directive('currentBootSwatchTheme', function () {
			return "<?=request()->cookie('theme', 'readable');?>";
		});
		Blade::directive('bootswatchStylesheet', function () {
			return '<?php
			$theme=request()->cookie("theme", "readable");
			if ($theme != "default") {
				echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/$theme/bootstrap.min.css\">";
			}
?>';
		});
		Blade::directive('list_theme_button', function () {
			$themes = ['default', 'cerulean', 'cosmo', 'cyborg', 'darkly', 'flatly', 'journal', 'lumen', 'paper', 'readable', 'sandstone', 'simplex', 'slate', 'spacelab', 'superhero', 'united', 'yeti'];
			$theme_buttons = '';
			foreach ($themes as $theme) {
				$theme_buttons .=
					'<li><a href="#" onclick="$.cookie(\'theme\', \'' .
					$theme .
					'\', { expires: 365, path: \'/\' });location.reload()">' .
					$theme .
					'</a></li>';
			}
			return $theme_buttons;

		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
