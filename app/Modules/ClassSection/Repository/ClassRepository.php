<?php

namespace App\Modules\ClassSection\Repository;
use App\Modules\ClassSection\Interfaces\ClassInterface;
use App\Modules\ClassSection\Entities\ClassStudent;
use App\Modules\ClassSection\Entities\Section;

class ClassRepository implements ClassInterface
 {
     private $classModel;
     private $sectionModel;
    public function __construct(ClassStudent $classModel,Section $sectionModel)
    {
        $this->classModel = $classModel;
        $this->sectionModel = $sectionModel;
    } 

    public function saveClass($data)
    {
        try {
            $result =  $this->classModel->create($data);
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }

        return $result;
    }
    public function saveSection($data)
    {
        try {
            $result =  $this->sectionModel->create($data);
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }

        return $result;
    }


}

?>