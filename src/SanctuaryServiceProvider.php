<?php

namespace Sanctuary\SanctuaryPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class SanctuaryServiceProvider extends ServiceProvider {

	public function boot() {
		PresetCommand::macro('sanctuary', function($command) {
			Preset::install();

			$command->info('Sanctuary scaffolding installed successfully.');
			$command->comment('Run "yarn && yarn watch" to compile the assets.');
		});
	}

}
