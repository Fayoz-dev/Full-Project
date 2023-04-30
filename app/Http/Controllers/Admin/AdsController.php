<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ad = Ad::first();

        return view('admin.ads.index', compact('ad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Ad $ad)
    {
        $request->validate([

            'title1' => 'required',
            'title2' => 'required',
            'url1' => 'required',
            'url2' => 'required',
            'image1' => 'required',
            'image2' => 'required',


        ]);

        $requestData = $request->all();


         if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/ads/', $image_name);
            $requestData['image1'] = $image_name;
        }

        if($request->hasFile('image2')){

            $file = $request->file('image2');
            $image_name = time() . '2.' . $file->getClientOriginalExtension();
            $file->move('site/images/ads/', $image_name);
            $requestData['image2'] = $image_name;
        }



        Ad::create($requestData);


        return redirect()->route('admin.ads.index')->with('success', 'Ad Created Succesfully!');

    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('admin.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view('admin.ads.update', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([

            'title1' => 'required',
            'title2' => 'required',
            'url1' => 'required',
            'url2' => 'required',
        ]);

        $requestData = $request->all();


         if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/ads/', $image_name);
            $requestData['image1'] = $image_name;
        }

        if($request->hasFile('image2')){

            $file = $request->file('image2');
            $image_name = time() . '2.' . $file->getClientOriginalExtension();
            $file->move('site/images/ads/', $image_name);
            $requestData['image2'] = $image_name;
        }



        $ad->update($requestData);


        return redirect()->route('admin.ads.index')->with('success', 'Ad Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad -> delete();
        return redirect()->route('admin.ads.index')->with('success', 'Ad Deleted successfully !');
    }
}
