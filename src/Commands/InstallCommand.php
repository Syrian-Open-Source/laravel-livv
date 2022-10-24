<?php

namespace SOS\LaravelLivv\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use SOS\LaravelLivv\Traits\InteractsWithComposerPackages;
use SOS\LaravelLivv\Traits\InteractsWithNodePackages;

class InstallCommand extends Command
{
    use InteractsWithComposerPackages;
    use InteractsWithNodePackages;

    public $signature = 'livv:install
                            {--composer=global : Absolute path to the Composer binary which should be used to install packages}';

    public $description = 'Install Inertia, Vue 2 and Vuetify.';

    public function handle(): int
    {
        if (! $this->confirm('Resources folder will be changed, please make sure to commit your file changes. Are you ready?')) {
            return self::FAILURE;
        }

        $this->requireComposerPackages('laravel/breeze:^1.9');
        shell_exec('php artisan breeze:install vue');

        $this->updateNodePackages(function ($packages) {
            unset($packages['@inertiajs/inertia-vue3']);
            unset($packages['@vitejs/plugin-vue']);
            unset($packages['@tailwindcss/forms']);
            unset($packages['@vue/compiler-sfc']);
            unset($packages['tailwindcss']);
            unset($packages['vue']);
            unset($packages['vue-loader']);

            return [
                '@inertiajs/inertia-vue' => '^0.8.0',
                '@vitejs/plugin-vue2' => '^2.0.0',
                '@vue/eslint-config-standard' => '^6.1.0',
                'deepmerge' => '^4.2.2',
                'eslint' => '^8.17.0',
                'eslint-plugin-import' => '^2.26.0',
                'eslint-plugin-node' => '^11.1.0',
                'eslint-plugin-promise' => '^6.0.0',
                'eslint-plugin-vue' => '^9.1.1',
                'eslint-webpack-plugin' => '^3.1.1',
                'postcss-import' => '^14.1.0',
                'sass' => '~1.32.8',
                'sass-loader' => '^13.0.0',
                'unplugin-vue-components' => '^0.22.7',
                'vite-plugin-eslint' => '^1.8.1',
                'vue' => '^2.6.14',
                'vue-i18n' => '^8.27.0',
                'vue-loader' => '^15.9.8',
                'vue-template-compiler' => '^2.6.14',
                'vuetify' => '^2.6.6',
                'vuetify-loader' => '^1.7.3',
                'vuex' => '^3.6.2',
            ] + $packages;
        }, true);

        (new FileSystem())->deleteDirectory(resource_path('/js/'));
        (new Filesystem())->copyDirectory(__DIR__ . '/../../resources/js/', resource_path('/js/'));
        (new Filesystem())->copyDirectory(__DIR__ . '/../../resources/styles/', resource_path('/styles/'));
        (new FileSystem())->delete(base_path('tailwind.config.js'));
        copy(__DIR__ . '/../../resources/js/app.js', resource_path('/js/app.js'));
        copy(__DIR__ . '/../../resources/views/app.blade.php', resource_path('/views/app.blade.php'));
        copy(__DIR__ . '/../../resources/vite.config.js', base_path('/vite.config.js'));
        copy(__DIR__ . '/../../resources/.eslintrc.js', base_path('/.eslintrc.js'));
        copy(__DIR__ . '/../../resources/.editorconfig', base_path('/.editorconfig'));
        copy(__DIR__ . '/../../resources/middleware/HandleInertiaRequests.php', base_path('app/Http/Middleware/HandleInertiaRequests.php'));

        return self::SUCCESS;
    }
}
