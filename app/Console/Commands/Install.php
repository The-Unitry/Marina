<?php

namespace Navicula\Console\Commands;

use Illuminate\Console\Command;
use Navicula\Http\Controllers\Admin\ScaffoldController;
use Navicula\Http\Controllers\RoleController;
use Navicula\Http\Controllers\SettingController;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install required database fields.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        RoleController::createRoles();
        SettingController::createSettings();
        ScaffoldController::createHiddenScaffold();
    }
}
