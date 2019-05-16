<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Subcategory::with('category:id,category')->latest()->paginate(10);
        return DB::table('subcategories')
            ->join('categories', 'subcategories.category', '=', 'categories.id')
            ->select('subcategories.*', 'categories.category as v_category')
            ->latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'subcategory' => 'required|unique:subcategories'
        ]);

        return Subcategory::create([
            'category' => $request['category'],
            'subcategory' => $request['subcategory']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'subcategory' => 'required|unique:subcategories,subcategory,'. $id
        ]);

        return Subcategory::updateOrCreate(['id' => $id], [
            'category' => $request['category'],
            'subcategory' => $request['subcategory']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
