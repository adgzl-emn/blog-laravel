@extends('back.leyouts.master')
@section('content')



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bloglar</h6>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif


            <form method="post" action="{{route('yazilar.update',$article->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control form-control-user" name="title" id="title" value="{{$article->title}}" name="baslik">
                    <small id="emailHelp" class="form-text text-muted">Gireceğiniz yazının Başlığı.</small>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="category" required>
                        <option value="">Seçim Yapın</option>
                        @foreach($categories as $categorie)
                            <option @if($article->category_id==$categorie->id) selected @endif value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <img src="{{asset($article->image)}}" class="img-thumbnail rounded" width="250" />
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group">
                    <label>İçerik</label>
                    <textarea id="editor" name="editor" class="form-control" rows="4">{!! $article->content !!}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Güncelle</button>
            </form>

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
            $('#editor').summernote({
                'height': 400
            });
        });
    </script>
@endsection


