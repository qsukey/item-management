@extends('adminlte::page')

@section('title', '写真一覧')

@section('content_header')
    <h1></h1>
@stop

@section('content')
<div class="container mt-5 bg-light p-4 rounded">
    <!-- フラッシュメッセージ表示部分 -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4"> <!-- col-lg-4で最大3つ表示、col-md-6で中サイズ、col-sm-12で小サイズ -->
                    <div class="card h-100">
                        <img src="data:image/jpeg;base64,{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;"> <!-- inline styleで画像の高さを設定 -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $item->name }}</h5> <!-- text-centerクラスを使用 -->
                            <p class="card-text">{{ Str::limit($item->about, 100) }}</p>
                            <div class="mt-auto text-center"> <!-- text-centerクラスを追加 -->
                                <div class="mb-2">
                                    <small class="text-muted">
                                        @for ($i = 0; $i < $item->recommend; $i++)
                                            ⭐️
                                        @endfor
                                    </small>
                                </div>
                                <a href="{{ url('items/detail/' . $item->id) }}" class="btn btn-info rounded-pill mr-3">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- ページネーションリンクの表示 -->
        <div class="d-flex justify-content-center mt-4">
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@stop

@section('css')
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card {
            height: 100%;
        }
        .card-body {
            display: flex;
            flex-direction: column;
        }
        .card-title {
            font-size: 1.5rem; /* 文字サイズを大きくする */
        }
        .text-center {
            text-align: center; /* テキストを中央揃えにする */
        }
    </style>
@stop

@section('js')
@stop
