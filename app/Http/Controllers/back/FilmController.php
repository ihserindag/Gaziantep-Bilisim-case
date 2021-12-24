<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Film;
use App\Models\Prozes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films=Film::orderBy('created_at','DESC')->get();
        return view('back.film.index',compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.film.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:3000'
        ]);

        $film=new Film;

        $film->title=$request->title;
        $film->description=$request->description;
        $film->slug=Str::slug($request->name,'-');


        if($request->hasFile('image')){
            $imageName=Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $film->image='uploads/'.$imageName;
        };
        toastr()->success('Başarılı', 'Film Başarı ile Eklendi.', ['timeOut' => 5000]);
        $film->save();
        return redirect()->route('film.index');



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
        $films=Film::findOrFail($id);
        return view('back.film.update',compact('films'));
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
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:png,jpg,jpeg|max:3000'
        ]);


       $film=Film::findOrFail($id);

        $film->title=$request->title;
        $film->description=$request->description;
        $film->slug=Str::slug($request->name,'-');


        if($request->hasFile('image')){
            $imageName=Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $film->image='uploads/'.$imageName;
        };
        toastr()->success('Başarılı', 'Film Başarı ile Güncellendi.', ['timeOut' => 5000]);
        $film->save();
        return redirect()->route('film.index');
    }

    public function delete($id)
    {
        toastr()->success('Başarılı', 'Film Başarı ile Silindi.', ['timeOut' => 5000]);
        Film::find($id)->delete();
        $user_id=Auth::user()->id;
        $film=Film::onlyTrashed()->findOrFail($id);
        $film->user_id=$user_id;
        $film->save();

        return redirect()->route('film.index');
    }


    public function trashed(){
        $films=Film::onlyTrashed()->orderBy('deleted_at','desc')->get();
        return view('back.film.trashed',compact('films'));
    }

    public function recover($id){
        Film::onlyTrashed()->find($id)->restore();
        toastr()->success('Başarılı', 'Film Başarı ile Kurtarıldı.', ['timeOut' => 5000]);
        return redirect()->back();
    }

    public function harddelete($id)
    {
       Film::onlyTrashed()->find($id)->forceDelete();
        toastr()->success('Film  Tamamen Silindi.');
        return redirect()->back();
    }

    public function filmcategory($id)
    {
        $film_id=$id;
        $films=Film::where('id',$film_id)->first();
        $filmscategories=Prozes::where('film_id',$film_id)->get();
        $categories=Category::all();

        return view('back.film.connect',compact('categories','films','filmscategories'));
    }

    public function filmkategoridelete($id)
    {
        toastr()->success('Başarılı', 'Film Başarı ile Silindi.', ['timeOut' => 5000]);
        Prozes::find($id)->delete();

        return redirect()->back();
    }

    public function filmkategoriedit($id)
    {
        $filmcategory_id=$id;
        $categories=Category::all();
        return view('back.film.connectCreate',compact('categories','filmcategory_id'));
    }

    public function filmkategoristore(Request $request)
    {

        $filmcategory=new Prozes;


        $filmcategory->category_id=$request->category_id;
        $filmcategory->film_id=$request->film_id;
        $filmcategory->save();
        toastr()->success('Kategori  Kaydedildi');
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
