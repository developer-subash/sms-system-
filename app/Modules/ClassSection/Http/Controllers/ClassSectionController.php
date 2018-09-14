<?php

namespace App\Modules\ClassSection\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Class;

use Laravel\Lumen\Routing\Controller as BaseController;

class ClassSectionController extends BaseController
{
    private $class;
    /**
         * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('classsection::index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('classsection::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       
    }
    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('classsection::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('classsection::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
