<?php

namespace App\Http\Controllers\Api\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $categories = Category::latest()->get();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Categories :)',
                'data' => $categories

            ], $this->successStatus
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug =str_slug($request->name);
        $category->save();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Added Category :)',

            ], $this->successStatus
        );


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to load Category :)',

            ], $this->successStatus
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug =str_slug($request->name);
        $category->save();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Updated Category :)',

            ], $this->successStatus
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response(
            [
                'status' => 'Success',
                'message' => 'Successfully to Deleted Category :)',

            ], $this->successStatus
        );


    }
}
