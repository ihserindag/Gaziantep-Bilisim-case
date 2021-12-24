
@extends('back\layouts\master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Kullanıcı Listesi</h5>




            </div>
            <div class="card-body">



                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="45%">Kullanıcı Adı</th>
                            <th width="45%">E-mail</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                        <tr>

                            <td>{{ $user->name }}</td>

                            <td>{{ $user->name }}</td>


                        </tr>


                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







@endsection


