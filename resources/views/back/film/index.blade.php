
@extends('back\layouts\master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Filmler</h5>


                        <a href="{{ route('film.create') }}" class="btn btn-primary"> Film Ekle</a>

                        <a style="float:right" href="{{ route('trashed.film') }}" class="btn btn-warning"><i class="fas fa-trash-alt"></i> Silinen Kategoriler</a>

            </div>
            <div class="card-body">



                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="20%">Resim</th>
                            <th width="20%">Film</th>
                            <th  width="40%">Film Açıklama</th>

                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)

                        <tr>
                            <td><img src="{{asset('').$film->image  }}" width="80%" height="80%" ></td>
                            <td>{{ $film->title }}</td>

                            <td>{!! $film->description !!}</td>

                            <td>
                                <a href="{{ route('film.category',$film->id) }}" class="btn btn-primary btn-circle">
                                    <i class="fas fa-arrows-alt-h"></i>
                                </a>

                                <a href="{{ route('film.edit',$film->id) }}" class="btn btn-success btn-circle">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ route('delete.film',$film->id) }}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash" title="Sil"></i>
                                </a>

                            </td>
                        </tr>


                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







@endsection


