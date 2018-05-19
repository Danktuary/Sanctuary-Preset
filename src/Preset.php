<?php

namespace Sanctuary\SanctuaryPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Console\Presets\Preset as ConsolePreset;

class Preset extends ConsolePreset {

	public static function install() {
		static::updatePackages();
		static::updateMix();
		static::updateAssets();
		static::updateViews();
		static::setupHomepage();
		static::removePrecompiledAssets();
	}

	public static function updatePackageArray($packages) {
		$extraPackages = [
			'eslint' => '^4.19.1',
			'eslint-plugin-vue' => '^4.5.0',
		];

		$unusedPackages = ['popper.js', 'lodash', 'jquery'];

		return array_merge($extraPackages, Arr::except($packages, $unusedPackages));
	}

	public static function updateMix() {
		File::copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
	}

	public static function updateAssets() {
		File::cleanDirectory(resource_path('assets'));
		File::copyDirectory(__DIR__ . '/stubs/resources/assets', resource_path('assets'));
	}

	public static function updateViews() {
		File::cleanDirectory(resource_path('views'));
		File::copyDirectory(__DIR__ . '/stubs/resources/views', resource_path('views'));
	}

	public static function removePrecompiledAssets() {
		File::deleteDirectory(public_path('css'));
		File::deleteDirectory(public_path('js'));
	}

	public static function setupHomepage() {
		$route = 'routes/web.php';
		$controller = 'app/Http/Controllers/HomeController.php';

		File::copy(__DIR__ . "/stubs/{$route}", base_path($route));
		File::copy(__DIR__ . "/stubs/{$controller}", base_path($controller));
	}

}
