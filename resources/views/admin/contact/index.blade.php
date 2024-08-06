@extends('admin.master')

@section('title', 'Danh Sách Liên Hệ')

@section('title-page', 'Danh Sách Liên Hệ')

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
        <div class="col-md-12">
            <div class="box">
                <div class="box-header d-flex justify-content-end align-items-center">
                    {{-- Ẩn các nút thêm mới và thùng rác --}}
                    {{-- <a href="{{ route('contact.create') }}" class="btn btn-success">+ Thêm Mới Liên Hệ</a>
                    <a href="" class="btn btn-primary"><i class="fa fa-trash"></i> Thùng Rác</a> --}}
                    <div class="box-tools">
                        <form action="{{ route('contact.index') }}" method="GET">
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
                                <th>Message</th>
                                <th>Ngày Tạo</th>
                                <th>Tùy Chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        {{-- Ẩn các nút show và update --}}
                                        {{-- <a href="{{ route('contact.show', $contact) }}" class="btn btn-warning me-2"> <i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('contact.edit', $contact) }}" class="btn btn-success"><i class="fa fa-pencil"> Update</i></a> --}}
                                        <form action="{{ route('contact.destroy', $contact) }}" method="POST" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn Chắc Muốn Xóa?')"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Chưa Có Dữ Liệu</td>
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
