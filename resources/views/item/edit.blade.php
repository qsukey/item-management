@extends('adminlte::page')

@section('title', '写真レコード編集')

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
                    <div class="card-header bg-primary text-white text-center text-bold">写真ID #{{ $item->id }} の編集</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('update', $item->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group text-center position-relative">
                                <img id="preview" src="data:image/jpeg;base64,{{ $item->image }}" class="img-fluid" alt="Photo Section" style="max-width: 50%;">
                                <label class="btn btn-light position-absolute translate-middle start-50" style="top:10%;">
                                    <input type="file" id="image" name="image" hidden>
                                    <i class="fas fa-edit"></i><span style="font-size: 0.8em">ファイルを変更する</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="name">Photo Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="recommend">Recommend:</label>
                                <select class="form-control" id="recommend" name="recommend">
                                    <option value="1" @if($item->recommend == 1) selected @endif>⭐️</option>
                                    <option value="2" @if($item->recommend == 2) selected @endif>⭐️⭐️</option>
                                    <option value="3" @if($item->recommend == 3) selected @endif>⭐️⭐️⭐️</option>
                                    <option value="4" @if($item->recommend == 4) selected @endif>⭐️⭐️⭐️⭐️</option>
                                    <option value="5" @if($item->recommend == 5) selected @endif>⭐️⭐️⭐️⭐️⭐️</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category" name="category">
                                    <option value="自然" @if($item->category == "自然") selected @endif>自然</option>
                                    <option value="グルメ" @if($item->category == "グルメ") selected @endif>グルメ</option>
                                    <option value="人物" @if($item->category == "人物") selected @endif>人物</option>
                                    <option value="建造物" @if($item->category == "建造物") selected @endif>建造物</option>
                                    <option value="その他" @if($item->category == "その他") selected @endif>その他</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="about">About:</label>
                                <textarea class="form-control" id="about" name="about" required>{{ $item->about }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Registered at:</label>
                                <input type="text" class="form-control" id="created_at" value="{{ $item->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Updated at:</label>
                                <input type="text" class="form-control" id="updated_at" value="{{ $item->updated_at }}" readonly>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning rounded-pill mr-3">Update</button>
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
        .position-relative {
            position: relative;
        }
        .position-absolute {
            position: absolute;
        }
        .translate-middle {
            transform: translate(-50%, -50%);
        }
        .start-50 {
            left: 35%;
        }
        .star.selected {
            color: gold;
        }
    </style>
@stop

@section('js')
    <script>
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.getElementById('recommend').value = value;

                document.querySelectorAll('.star').forEach(s => {
                    if (s.getAttribute('data-value') <= value) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });
            });
        });

        document.getElementById('image').addEventListener('change', function(event) {	
            const file = event.target.files[0];	
            if (file) {	
                const reader = new FileReader();	
                reader.onload = function(e) {	
                    document.getElementById('preview').src = e.target.result;	
                }	
                reader.readAsDataURL(file);	
            }	
        });	
    </script>
@stop
