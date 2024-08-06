@extends('admin.master')

@section('title', 'Tạo Mới Vai Trò')

@section('title-page', 'Tạo Mới Vai Trò')

@section('main-content')
    <section class="container">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                   <h3 class="box-title">Tạo Mới Vai Trò</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('roleUs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên Vai Trò:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Tạo Mới</button>
                        <a href="{{ route('roleUs.index') }}" class="btn btn-secondary">Quay Lại</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
