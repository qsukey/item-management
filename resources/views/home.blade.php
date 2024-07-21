@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="display-4 text-bold" style="color: #e5621c;">Welcome to Photo Management</h1>
            </div>
        </div>
        <div class="row mb-4 no-gutters">
            <div class="col-md-8">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body text-center flex-grow-1 d-flex flex-column justify-content-center" style="background-color: #7fedff73;">
                        <h2 class="font-weight-bold" style="color: #151618c6;">About</h2>
                        <p style="color: #151618c6;">スマートフォンの発達に伴い写真はもはや私達の生活でとてもカジュアルな存在になりました。
                            <br>一方で必要な写真を必要な時に取り出せない、という声も聞こえてきます。
                        </p>
                        <p style="color: #151618c6;">「せっかく撮った写真をいつでも気軽に保存し、取り出せる！」
                            <br>これを実現するための管理システムを開発しました。
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-img-top flex-grow-1" style="background: url('{{ asset('images/album.jpg')}}') no-repeat center center; background-size: cover;"></div>
                </div>
            </div>
        </div>
        <div class="row mb-4 no-gutters">
            <div class="col-md-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-img-top flex-grow-1" style="background: url('{{ asset('images/photoshot.jpg')}}') no-repeat center center; background-size: cover;"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body text-center flex-grow-1 d-flex flex-column justify-content-center" style="background-color: #efe6c1d8;">
                        <h3 class="font-weight-bold" style="color: #151618c6;">写真を整理整頓して、思い出作りに役立てよう！</h3>
                        <a href="{{ route('add1')}}" class="btn btn-success btn-lg rounded-pill mt-3" style="width: auto; max-width: 200px; margin: 0 auto;">Add Your Photos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        .no-gutters > [class*='col-'] {
            padding-right: 0;
            padding-left: 0;
        }
        .card {
            height: 100%;
        }
        .card-body, .card-img-top {
            flex-grow: 1; /* 高さを揃える */
        }
        .btn-lg {
            width: auto;
            max-width: 200px;
            margin: 0 auto;
        }
    </style>
@stop

@section('js')
@stop
