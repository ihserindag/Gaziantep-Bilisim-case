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
                <form method="POST" action="{{ route('kategori.update',$categories->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" value="{{$categories->name}}" name="name" class="form-control" placeholder="Lütfen kategori giriniz">
                    </div>


                    <button type="submit" class="btn btn-primary">Güncelle</button>

                    <a href="{{ route('kategori.index') }}" class="btn btn-danger">Vazgeç</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')

