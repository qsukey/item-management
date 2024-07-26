@extends('adminlte::page')

@section('title', '写真レコード詳細')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center text-bold">写真ID #{{ $item->id }} の詳細</div>
                    <div class="card-body">
                        <div class="form-group text-center">
                            <img src="data:image/jpeg;base64,{{ $item->image }}" class="img-fluid" alt="Photo Section1" style="max-width: 50%;">
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="name">Photo Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recommend">Recommend:</label>
                                <div class="form-control" id="star-rating" style="height: auto;">
                                    @for ($i = 1; $i <= $item->recommend; $i++)
                                        <span class="star">⭐️</span>
                                    @endfor
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ $item->category }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="about">About:</label>
                                <textarea class="form-control" id="about" name="about" readonly>{{ $item->about }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Registered at:</label>
                                <input type="text" class="form-control" id="created_at" value="{{ $item->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Updated at:</label>
                                <input type="text" class="form-control" id="updated_at" value="{{ $item->updated_at }}" readonly>
                            </div>
                            <div class="form-group row justify-content-center">
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-outline-warning rounded-pill mr-3">編集する</a>
                                <button type="button" class="btn btn-outline-danger rounded-pill" data-toggle="modal" data-target="#deleteModal">削除する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">レコードの削除</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    [ID: {{ $item->id }}] {{ $item->name }} を本当に削除しますか？
                    <br>
                    <small class="text-danger">※ 一度レコードを削除すると復元はできません。</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <form method="POST" action="{{ route('delete', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
