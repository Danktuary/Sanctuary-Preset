const mix = require('laravel-mix');

mix
	.js('resources/assets/js/app.js', 'public/js')
	.extract(['vue', 'axios'])
	.sass('resources/assets/sass/app.scss', 'public/css')
	.copyDirectory('resources/assets/images', 'public/images')
	.options({ processCssUrls: false })
	.disableNotifications();
