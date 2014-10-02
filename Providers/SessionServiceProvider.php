<?php namespace Modules\Session\Providers;

use Illuminate\Support\ServiceProvider;

class SessionServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

	/**
	 * The filters base class name.
	 *
	 * @var array
	 */
	protected $filters = [
		'Session' => [
			'auth.admin' => 'AdminFilter',
			'auth.guest' => 'GuestFilter'
		]
	];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
		$this->app->booted(function ($app) {
			$this->registerFilters($app['router']);
		});
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

	private function registerFilters($router)
	{
		foreach ($this->filters as $module => $filters) {
			foreach ($filters as $name => $filter) {
				$class = "Modules\\{$module}\\Http\\Filters\\{$filter}";

				$router->filter($name, $class);
			}
		}
	}

}
