<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Role;

class RoleController extends Controller
{
    /**
     * Create all roles used by the application.
     * 
     * The roles can be found in the config directory.
     *
     * @return void
     */
    public static function createRoles()
    {
        foreach (config('database_fields.roles') as $role) {
            if (!Role::find($role['id'])) {
                Role::create($role);
            }
        }
    }
}
