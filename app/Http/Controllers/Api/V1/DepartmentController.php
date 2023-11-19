<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DepartmentCollection;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Retrieve all departments for display.
     * @method GET
     * @route /departments
     */
    public function getDepartments()
    {
        return response()->json(new DepartmentCollection(Department::all()), 200);
    }
}