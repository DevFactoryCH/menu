<?php namespace Devfactory\Menu;

use Devfactory\Menu\Controllers\MenuController;
use Illuminate\Support\ServiceProvider;
use Devfactory\Menu\Menu;

class MenuServiceProvider extends ServiceProvider {
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


  /**
   * Boot
   *
   * @return void
   */
	public function boot() {
    $this->publishConfig();
    $this->publishMigration();
    $this->loadViewsFrom(__DIR__ . '/views', 'menu');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
    $this->mergeConfig();

    $this->app->bind('menu', function() {
      return new Menu();
    });
	}

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return ['menu'];
  }


  /**
   * Publish the migration stub
   */
  protected function publishMigration() {
    $this->publishes([
      __DIR__ . '/migrations' => base_path('database/migrations')
    ]);
  }

 /**
   * Publish the package configuration
   */
  protected function publishConfig() {
    $this->publishes([
      __DIR__ . '/config/config.php' => config_path('menu.config.php'),
    ]);
  }


  /**
   * Merge media config with users.
   */
  private function mergeConfig() {
    $this->mergeConfigFrom(
      __DIR__ . '/config/config.php', 'media.config'
    );
  }
}