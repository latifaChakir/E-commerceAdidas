<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Permessions;

class SyncRoutesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-routes-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return [
                'permessions_name' => $route->getName(),
            ];
        });

        $existingRoutes = Permessions::pluck('permessions_name');

        $newRoutes = $routes->reject(function ($route) use ($existingRoutes) {
            return $existingRoutes->contains($route['permessions_name']);
        });

        foreach ($newRoutes as $route) {
            if ($route['permessions_name'] !== null) {
                Permessions::create([
                    'permessions_name' => $route['permessions_name'],
                ]);
            }
        }

        $this->info('Routes synced successfully!');
    }


}
