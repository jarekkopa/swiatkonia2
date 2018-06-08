<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use App\Region;
use App\Category;
use App\Subcategory;
use DB;

use Illumiante\Support\Facades\Input;

class AdvertsController extends Controller
{
    public function getSubcategories($id)
    {
        $subcategories = DB::table("subcategories")->where("category",$id)->pluck("name","id");
        return json_encode($subcategories);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = Advert::orderBy('id', 'desc')->paginate(2);

        return view('pages.index')->with('adverts', $advert);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = Region::all(); // pobranie wszystkich województw z bazy
        $categories = DB::table('categories')->pluck("name","id");
        return view('pages.adverts.create')->with(['regions' => $region, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'region' => 'required',
            'price' => 'numeric',
            'phone' => 'numeric',
            'category' => 'required',
        ]);

        $advert = new Advert;
        $advert->title = $request->input('title');
        $advert->description = $request->input('description');
        $advert->state = $request->input('region');
        $advert->price = $request->input('price');
        $advert->phone = $request->input('phone');
        $advert->category = $request->input('category');
        if ($request->input('subcategory')) {
            $advert->subcategory = $request->input('subcategory');
        }
        $advert->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'ID ogłoszenia to:' . $id . 'Działa, ale nie ma widoku';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
