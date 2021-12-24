@extends('back\layouts\master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Kategoriler</h5>


                        <a style="float:right" href="{{ route('kategori.index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Kategori </a>


            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="40%">Kategori</th>
                            <th width="40%">Silen Kişi</th>

                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)

                        <tr>
                            <td>{{ $category->name }}</td>



                            <td>{{ $category->kullanici->name }}</td>
                            <td>

                                <a href="{{ route('recover.kategori',$category->id) }}" class="btn btn-success btn-circle">
                                    <i class="fas fa-recycle"></i>
                                </a>
                                <a href="{{ route('hardDelete.kategori',$category->id) }}" class="btn btn-danger btn-circle">
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


