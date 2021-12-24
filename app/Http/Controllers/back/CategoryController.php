<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('back.category.index',compact('categories'));
    }

    /**
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories=new Category;
        $categories->name=$request->name;
        $categories->slug=Str::slug($request->name,'-');
        $categories->save();
        toastr()->success('Başarılı', 'Kategori Başarı ile Eklendi.', ['timeOut' => 5000]);
        return redirect()->route('kategori.index');

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


        $categories=Category::findOrFail($id);
        return view('back.category.update',compact('categories'));
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
        $categories=Category::findOrFail($id);

        $categories->name=$request->name;
        $categories->slug=Str::slug($request->name,'-');
        $categories->save();
        toastr()->success('Başarılı', 'Kategori Başarı ile Güncellendi.', ['timeOut' => 5000]);
        return redirect()->route('kategori.index');

    }

    public function delete($id)
    {
        toastr()->success('Başarılı', 'Kategori Başarı ile Silindi.', ['timeOut' => 5000]);
        Category::find($id)->delete();
        $user_id=Auth::user()->id;
        $categories=Category::onlyTrashed()->findOrFail($id);
        $categories->user_id=$user_id;
        $categories->save();
        return redirect()->route('kategori.index');
    }

    public function trashed(){
        $categories=Category::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('back.category.trashed',compact('categories'));
    }


    public function recover($id){
        Category::onlyTrashed()->find($id)->restore();
        toastr()->success('Başarılı', 'Kategori Başarı ile Kurtarıldı.', ['timeOut' => 5000]);
        return redirect()->back();
    }

    public function harddelete($id)
     {
        Category::onlyTrashed()->find($id)->forceDelete();
         toastr()->success('Kategori tamamen Silindi.');
         return redirect()->back();
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
