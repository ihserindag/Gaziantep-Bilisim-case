@extends('back\layouts\master')

@section('content')
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Basic form</h5>
                <h6 class="card-subtitle text-muted">Default Bootstrap form layout.</h6>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('filmcategorystore') }}"  enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="film_id" value="{{ $filmcategory_id }}" />
                    <div class="mb-3">
                        <label  class="form-label">Kategori</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>

                    </div>


                    <button type="submit" class="btn btn-primary">Kaydet</button>

                    <a href="{{ route('film.category',$filmcategory_id) }}" class="btn btn-danger">Vazgeç</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')

