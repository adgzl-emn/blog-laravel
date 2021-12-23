@extends('back.leyouts.master')
@section('content')


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mesajlar
            <span class="float-left">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>

            </span>
                </a>



            </h6>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Mail</th>
                        <th>Başlık</th>
                        <th>Mesaj</th>
                        <th>Oluşturulma Tarihi</th>


                    </tr>
                    </thead>

                    <tbody>

                    @foreach($contact as $contact)
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->mail}}</td>
                            <td>{{$contact->title}}</td>
                            <td>{{$contact->contact}}</td>
                            <td>{{$contact->created_at->diffForHumans()}}</td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')


@endsection
