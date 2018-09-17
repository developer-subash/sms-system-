<?php  
    namespace App\Modules\Admin\Repository;
    use App\Modules\Admin\Interfaces\UserInterface;
    use App\Modules\Admin\Entities\User;
    use App\Modules\Admin\Entities\Role;
    use App\Modules\Setting\Entities\Setting;
    use App\Modules\Common\traits\ResponseTrait;
    use Illuminate\Support\Facades\Hash; 
    use DB;  

    class UserRepository implements UserInterface 
    {
        use ResponseTrait;
        private $userModel;
        protected $settingModel;
        protected $roleModel;
        public function __construct(User $userModel,Setting $settingModel,Role $roleModel)
        {     
                
            $this->userModel = $userModel;
            $this->settingModel = $settingModel;
            $this->roleModel = $roleModel;
         
        }

        public function RegisterUser($data)
        {   
           try {
            
            $studentRoleId = $this->roleModel->where('name','student')->first()->id;
            
            $running_year = $this->settingModel->where('type','running_year')->first()->description;
                    
            $section_id = $data['section_id'];
            $is_class_id_exits =  $this->userModel->where(['section_id' =>$section_id, 'year' => $running_year])->orderBy('created_at','desc')->first();
            
           $obj = new User();
           $obj->name = $data['name'];
           $obj->birthday = $data['birthday'];
           $obj->sex = $data['sex'];
           $obj->religion = $data['religion'];
           $obj->blood_group = $data['blood_group'];
           $obj->permanent_address = $data['permanent_address'] ;
           $obj->year = $running_year;     
           $obj->phone = $data['phone'];
           $obj->email = $data['email'];
           $obj->password = Hash::make($data['password']) ;
           $obj->current_address = $data['current_address'];
           $obj->nationality = $data['nationality'] ;
           $obj->mother_tongue = $data['mother_tongue'];
           $obj->cast_category = $data['cast_category'];
           $obj->disability = $data['disability'];
           $obj->known_allergy = $data['known_allergy']; 
           $obj->class_id = $data['class_id'];
           $obj->section_id = $data['section_id'];
           
            if(is_null($is_class_id_exits))
            {           
            $obj->roll_no =  $data['roll_no'] = 1;
            $obj->save();
            $obj->Roles()->attach($studentRoleId);

            return $obj;      
            }
            else {
                // this $maxstudentcapacityInEachClass comes from traits
                $maxstudentcapacityInEachClass = $this->TotleStudentInEachClass();   
                $totlestudentsInEachClass = $this->userModel->where(['section_id' =>$section_id, 'year' => $running_year])->get()->toArray();
              
              if(count($totlestudentsInEachClass) <= $maxstudentcapacityInEachClass)
              {
                 
                $obj->roll_no = $is_class_id_exits->roll_no + 1;
                $obj->save();
                $obj->Roles()->attach($studentRoleId);
                return $obj; 
              } else {
                 
                $message = 'Oops.. Problem while adding Please Increase Totle Student Capacity To Each Section';
                return $message;
              }                              
            } 
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }           
            // print_r($data['class_id']);
        }
    }

