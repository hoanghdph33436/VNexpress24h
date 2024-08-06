@extends('admin.master')

@section('title', 'Danh Sách Vai Trò')

@section('title-page', 'Danh Sách Vai Trò')

@section('main-content')
    <section class="container">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('roleUs.create') }}" class="btn btn-success">+ Thêm mới Vai Trò</a>
                    </div>
                    <div class="box-tools">
                        <form action="{{ route('roleUs.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ request()->search }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Vai Trò</th>
                                <th>Số lượng người dùng</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->role == 0 ? 'User' : 'Admin' }}</td>
                                    <td>{{ $role->total }}</td>
                                    <td>
                                        <a href="{{ route('roleUs.edit', $role->role) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Sửa</a>
                                        <form action="{{ route('roleUs.destroy', $role->role) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn Chắc Muốn Xóa?')"><i class="fa fa-trash"></i> Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Chưa Có Dữ Liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
