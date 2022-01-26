<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);

        return view('brand.index' ,compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_img' => 'required|mimes:jpg.jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_name.max' => 'Brand name less than 255 chrac..',
        ]);

        $brand_img = $request->file('brand_img');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_img->getClientOriginalExtension());
        $img_name = $name_gen. '.' .$img_ext;
        $up_location = 'img/brand/';
        $last_img = $up_location.$img_name;
        $brand_img->move($up_location,$img_name);

        $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->brand_img = $last_img;
            $brand->save();
            return Redirect()->back()->with('success','Brand Added Successfully!');


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
        $brands = Brand::find($id);
        return view('brand.edit',compact('brands'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
