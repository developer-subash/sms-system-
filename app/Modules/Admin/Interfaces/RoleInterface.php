<?php  
namespace App\Modules\Admin\Interfaces;
interface RoleInterface {

    public function createRole($data);
    public function listRoles();
    public function destroyRoles($id);
    
}