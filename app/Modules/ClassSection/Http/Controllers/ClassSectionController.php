<?php
namespace App\Modules\ClassSection\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Modules\ClassSection\Interfaces\ClassInterface;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClassSectionController extends BaseController
{
    private $class;
    
    public function __construct(ClassInterface $iClass )
    {
        $this->class = $iClass;
    }

    public function store(Request $request)
    {
       try {
            $data = $request->all(); 
               
            $result = $this->class->saveClass($data);     
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }

        return response()->json([$result,'200','Data Added SuccessFully']);
    }

    public function addSection(Request $request)
    {
        try {
            $all = $request->all();
            $result =  $this->class->saveSection($all);
        }
        catch (\Throwable $e) {
            print_r($e->getMessage());
        }
       return response()->json([ $result, '200','section created successfully']);
    }
  
}
