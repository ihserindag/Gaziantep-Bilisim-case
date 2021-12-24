@extends('back\layouts\master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Kategoriler</h5>


                        <a href="{{ route('kategori.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Kategori Ekle</a>

                        <a style="float:right" href="{{ route('trashed.category') }}" class="btn btn-warning"><i class="fas fa-trash-alt"></i> Silinen Kategoriler</a>
            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="90%">Kategori</th>

                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)

                        <tr>
                            <td>{{ $category->name }}</td>

                            <td>

                                <a href="{{ route('kategori.edit',$category->id) }}" class="btn btn-success btn-circle">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ route('delete.kategori',$category->id) }}" class="btn btn-danger btn-circle">
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


