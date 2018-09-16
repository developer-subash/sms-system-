<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Modules\Admin\Entities\Role;
use App\Modules\Admin\Interfaces\RoleInterface;

class RoleController extends BaseController
{
  private $iRole;

    public function __construct(RoleInterface $iRole)
    {
        $this->iRole = $iRole;
    }

    public function createRoles(Request $request)
    {
        try {

        $all = $request->all();
        $result = $this->iRole->createRole($all);
       }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }

        $response = [

            'code' => 200,
            'data' => $result,
            'message' => 'Roles Created SuccessFully',
        ];

        return response()->json(['result' => $response,'status' => true]);
    }

    public function listRoles(Request $request)
    {
        try {

           $result = $this->iRole->listRoles();
           $response = [

            'status' => true,
            'data' => $result,
            'message' => 'role list retrieved successfully',
        ];
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
        return response()->json([$response,200]);

    } 

    public function destroyRoles(Request $request)
    {
        try {
            $role_id = $request->input('role_id');
            
            $result = $this->iRole->destroyRoles($role_id);
            $response = [
                'status' => true,
                'deleted' => true,
                'message' => 'Role Deleted SuccessFully'

            ];
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
        return response()->json([$response,200]);
        
    }
}
