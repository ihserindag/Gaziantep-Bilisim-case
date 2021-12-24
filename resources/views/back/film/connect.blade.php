@extends('back\layouts\master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Kategoriler</h5>


                <span>{{ $films->title }}- filmine ait kategoriler</span>
                        <a style="float:right" href="{{ route('filmkategoriedit',$films->id) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Kategori Ekle</a>


            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="80%">Kategori</th>

                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)

                        @foreach ($filmscategories as $filmcategory)

                        @if($filmcategory->category_id==$category->id)

                        <tr>
                            <td>{{ $category->name }}</td>

                            <td>

                                <a href="{{ route('delete.filmcategory',$filmcategory->id) }}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash" title="Sil"></i>
                                </a>

                            </td>
                        </tr>

                        @endif

                        @endforeach




                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







@endsection


