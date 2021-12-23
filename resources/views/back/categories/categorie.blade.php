@extends('back.leyouts.master')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kategori Oluştur</h6>
                </div>
                <div class="card-body">

                    <form method="post" action="{{route('category.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori Adı</label>
                            <input type="text" class="form-control form-control-user" name="title" id="title" placeholder="Kategori Adı..." required>
                            <small id="emailHelp" class="form-text text-muted">Gireceğiniz Kategorinin Başlığı.</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Oluştur</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tüm Kategoriler</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Adı</th>
                            <th>Makale Sayısı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{$categorie->name}}</td>
                                <td>{{$categorie->articleCount()}}</td>
                                <td>{{$categorie->created_at->diffForHumans()}}</td>
                                <td>
                                    <input class="switch" categorie-id="{{$categorie->id}}" type="checkbox" data-on="Aktif" data-off="Pasif" data-onstyle="success" data-offstyle="danger" @if($categorie->status==1) checked @endif data-toggle="toggle">
                                </td>
                                <td>
                                    <a category-id="{{$categorie->id}}" class="btn btn-sm btn-primary edit-click" title="Kategoriyi düzenle"><i class="fa fa-edit text-white"></i></a>
                                    <a category-id="{{$categorie->id}}" category-count="{{$categorie->articleCount()}}" class="btn btn-sm btn-danger remove-click" title="Sil" > <i class="fa fa-times"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategoriyi Düzenle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{route('category.update')}}">
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input id="category" type="text" class="form-control" name="category" />
                            <input type="hidden" name="id" id="category_id" />
                        </div>
                        <div class="form-group">
                            <label>Slug Adı</label>
                            <input id="slug" type="text" class="form-control" name="category" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--  delete Modal -->
    <div id="deleteModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="articleAlert">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Kapat</button>
                    <form method="post" action="{{route('kategori.sil')}}">
                        @csrf
                        <input type="hidden" name="id" id="deleteId">
                        <button id="deleteButton" type="submit" class="btn btn-danger">Sil</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



        @endsection

@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function (){
          $('.remove-click').click(function (){
             id = $(this)[0].getAttribute('category-id');
             count = $(this)[0].getAttribute('category-count');
             if(id == 1){
                 $('.articleAlert').html('Genel Kategorisi silinemez sabit kategoridir silinen kategoriler genel kategorisine aktarılır');
                 $('#deleteButton').hide();
                 $('#deleteModal').modal();
                 return;
             }
             $('#deleteButton').show();
             $('#deleteId').val(id);
             $('.articleAlert').html('Bu kategoriye ait '+count+' yazı var emin misiniz');
             $('#deleteModal').modal();
          });

          $('.edit-click').click(function (){
              id = $(this)[0].getAttribute('category-id');
              //console.log(id);
              $.ajax({
                  type:'GET',
                  url:'{{route('category.getData')}}',
                  data:{id:id},
                  success:function (data){
                      console.log(data);
                      $('#category').val(data.name);
                      $('#slug').val(data.slug);
                      $('#category_id').val(data.id);
                      $('#editModal').modal();
                  }
              });

          });
        })


        $(function() {
            $('.switch').change(function() {
                id = $(this)[0].getAttribute('categorie-id');
                statu=$(this).prop('checked');
                $.get("{{route('kategoriswitch')}}", {id:id , statu:statu}, function(data, status) {

                });
            })
        })
    </script>

@endsection


