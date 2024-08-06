@extends('admin.master')

@section('title', 'Danh Sách')

@section('title-page', 'Danh Sách Loại Tin')

@section('main-content')
    <section class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ $message }}
            </div>
        @endif

        <!-- Default box -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('category.create') }}" class="btn btn-success">+ Thêm mới Loại Tin</a>
                        <a href="{{ route('category.trash') }}" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng Rác</a>
                    </div>
                    <div class="box-tools">
                        <form action="{{ route('category.index') }}" method="GET">
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
                                <th>Tên Loại Tin</th>
                                {{-- <th>LT-Cha</th> --}}
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    {{-- <td>{{ $item->parent_id }}</td> --}}
                                    <td>{!! $item->status ? '<span class="label label-success">Hiển Thị</span>' : '<span class="label label-danger">Ẩn</span>' !!}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $item) }}" class="btn btn-success"><i class="fa fa-pencil"></i> Chỉnh Sửa</a>
                                        <form action="{{ route('category.destroy', $item) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn Chắc Muốn Xóa?')"><i class="fa fa-trash"></i> Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Chưa Có Dữ Liệu</td>
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
