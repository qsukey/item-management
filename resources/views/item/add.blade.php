@extends('adminlte::page')

@section('title', '写真新規登録')

@section('content_header')
<h1></h1>
@stop

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center text-bold">写真を新規登録する</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ url('/items/add') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Photo Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Photo Name" required>
                            </div>
                            <div class="form-group">
                                <label for="recommend">Recommend:</label>
                                <select class="form-control" id="recommend" name="recommend">
                                    <option value="0">--</option>
                                    <option value="1">⭐️</option>
                                    <option value="2">⭐️⭐️</option>
                                    <option value="3">⭐️⭐️⭐️</option>
                                    <option value="4">⭐️⭐️⭐️⭐️</option>
                                    <option value="5">⭐️⭐️⭐️⭐️⭐️</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="自然">自然</option>
                                    <option value="グルメ">グルメ</option>
                                    <option value="人物">人物</option>
                                    <option value="建造物">建造物</option>
                                    <option value="その他">その他</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="about">About:</label>
                                <textarea class="form-control" id="about" name="about" placeholder="About"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Photo:</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="photo_section">Photo Section:</label>
                                <div id="photo_section" class="form-control" style="height: auto;">
                                    <img id="preview" src="#" alt="Photo Preview" style="display: none; max-width: 100%; max-height: 300px;">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <button type="submit" class="btn btn-success rounded-pill mr-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        #preview {
            display: block;
            margin: auto;
        }
    </style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    $('#image').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result).show();
        }
        reader.readAsDataURL(this.files[0]);
    });
});
</script>
@stop