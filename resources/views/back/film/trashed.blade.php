
@extends('back\layouts\master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Filmler</h5>


                        <a style="float:right" href="{{ route('film.index') }}" class="btn btn-primary"> Filmler</a>



            </div>
            <div class="card-body">



                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="15%">Resim</th>
                            <th width="15%">Film</th>
                            <th  width="40%">Film Açıklama</th>
                            <th> Silen Kişi</th>

                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($films as $film)

                        <tr>
                            <td><img src="{{asset('').$film->image  }}" width="80%" height="80%" ></td>
                            <td>{{ $film->title }}</td>

                            <td>{!! $film->description !!}</td>

                            <td>{{ $film->kullanici->name }}</td>

                            <td>

                                <a href="{{ route('recover.film',$film->id) }}" title="silmekten kurtar" class="btn btn-success btn-circle">
                                    <i class="fas fa-recycle"></i>
                                </a>

                                <a href="{{ route('hardDelete.film',$film->id) }}" title="tamamen sil" class="btn btn-danger btn-circle">
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


