<?php  
     namespace App\Modules\Admin\Repository;
     use App\Modules\Admin\Interfaces\RoleInterface;
     use App\Modules\Admin\Entities\Role;

     class RoleRepository implements RoleInterface{

        private $roleModel;

        public function __construct(Role $roleModel)
        {
            $this->roleModel = $roleModel;
        }

        public function createRole($data)
        {
        try{
            $result = $this->roleModel->create($data);
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
        return $result;
        }

        public function listRoles()
        {
            try {
                $result = $this->roleModel->all();
                
            }
            catch (\Throwable $e) {
                print_r($e->getMessage());
            }

           return $result;
        }
        public function destroyRoles($role_id)
        {
            try {
                
                $result = $this->roleModel->where('id',$role_id)->delete();
                
            }
            catch (\Throwable $e) {
                print_r($e->getMessage());
            }

           return $result;
        }


    }
