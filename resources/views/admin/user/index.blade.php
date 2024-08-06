@extends('admin.master')

@section('title', 'Danh Sách Người Dùng')

@section('title-page', 'Danh Sách Người Dùng')

@section('main-content')
    <section class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ $message }}
            </div>
        @endif

        <!-- Default box -->
        <div class="col-md-12">
            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('user.create') }}" class="btn btn-success">+ Thêm Mới Người Dùng</a>
                        <a href="" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng Rác</a>
                    </div>
                    <div class="box-tools">
                        <form action="{{ route('user.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{ request()->search }}">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai Trò</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo</th>
                                <th>Tùy Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role == 0 ? 'User' : 'Admin' }}</td>
                                    <td>{!! $user->status == 1 ? '<span class="label label-success">Hoạt động</span>' : '<span class="label label-danger">Ngừng hoạt động</span>' !!}</td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $user) }}" class="btn btn-warning me-2"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Update</a>
                                        <form action="{{ route('user.destroy', $user) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn Chắc Muốn Xóa?')"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Chưa Có Dữ Liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.box -->
    </section>
@endsection
