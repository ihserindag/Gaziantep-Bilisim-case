@extends('back\layouts\master')

@section('content')
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger p-3">
                    <ul>


                    @foreach ($errors->all() as $error)
                       <li> {{ $error }}</li>
                    @endforeach
                </ul>
                </div>
                @endif
            <div class="card-header">
                <h5 class="card-title">Basic form</h5>
                <h6 class="card-subtitle text-muted">Default Bootstrap form layout.</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('film.update',$films->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Film Adı</label>
                        <input type="text" value="{{$films->title}}" name="title" class="form-control" placeholder="Lütfen film adını giriniz" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Film Resmi</label>
                        <img src="{{ asset($films->image) }}" class="img-thumbnail rounded" width="300" alt="">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Film Resmi</label>
                        <input type="file" name="image" class="form-control" id="" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Açıklama</label>
                       <textarea name="description" id="description" cols="30" rows="10">

                        {!! $films->description!!}
                       </textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">Güncelle</button>

                    <a href="{{ route('film.index') }}" class="btn btn-danger">Vazgeç</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#description').summernote(
      {
          'height':300
      }
  );
});
</script>
@endsection
