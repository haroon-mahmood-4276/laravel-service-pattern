<?php

namespace HaroonMahmood4276\LaravelServicePattern\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class CreateServiceClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {--do-not-bind} {--without-interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to implement Service Design Pattern in Laravel Project. It make a service class with interface.
    {--do-not-bind} is used to prevent service and interface binding in AppServiceProvider.php. {--without-interface} prevents the interface class to be created by this command.';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param \Illuminate\Filesystem\Filesystem $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $withoutInterface = $this->option('without-interface') ? true : false;
        $doNotBind = $this->option('do-not-bind') ? true : false;

        $name = $this->argument('name');
        $namespace = Str::pluralStudly($name);

        $interfaceName = $name . 'Interface';
        $serviceName = $name . 'Service';

        $serviceDirPath = app_path("Services/{$namespace}");

        $servicePath = '';

        try {

            // Create the service directory
            if (!is_dir($serviceDirPath)) {
                mkdir($serviceDirPath, 0775, true);
            }

            $servicePath .= $serviceDirPath . "/{$serviceName}.php";
            $serviceStub = $this->files->get(__DIR__ . '/../stubs/service.stub');
            $serviceStub = str_replace(['{{ interface }}', '{{ service }}', '{{ namespace }}', '{{ model }}'], [$interfaceName, $serviceName, $namespace, $name], $serviceStub);
            $this->files->put($servicePath, $serviceStub);

            if (!$withoutInterface) {
                // Create the interface file
                $interfacePath = app_path("Services/{$namespace}/{$interfaceName}.php");
                $interfaceStub = $this->files->get(__DIR__ . '/../stubs/interface.stub');
                $interfaceStub = str_replace(['{{ namespace }}', '{{ interface }}'], [$namespace, $interfaceName], $interfaceStub);
                $this->files->put($interfacePath, $interfaceStub);
            }

            if (!$doNotBind) {
                // Add bindings to the AppServiceProvider
                $appServiceProviderPath = app_path("Providers/AppServiceProvider.php");
                $appServiceProviderStub = $this->files->get($appServiceProviderPath);
                $binding = "\n        \$this->app->bind(\\App\\Services\\{$namespace}\\{$interfaceName}::class, \\App\\Services\\{$namespace}\\{$serviceName}::class);";
                $appServiceProviderStub = str_replace("register()\n    {", "register()\n    {" . $binding, $appServiceProviderStub);
                $this->files->put($appServiceProviderPath, $appServiceProviderStub);
            }

            $this->info("Service and interface created successfully." . (!$doNotBind) ? ' Also binded in AppServiceProvider.php .' : null);
        } catch (Exception $ex) {
            rmdir($serviceDirPath);
            throw $ex;
        }
    }
}
