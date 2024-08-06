@extends('fe.index')

@section('title', 'Đăng Kí')

@section('main')
<section class="section pb-0 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Đăng Kí</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Nhập Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Email..." required>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name..." required>
                            </div>
                            <div class="form-group">
                                <label for="password">Nhập Mật Khẩu:</label>
                                <input type="password" name="password" class="form-control" placeholder="Mật Khẩu..." required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Xác Nhận Mật Khẩu:</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Xác Nhận Mật Khẩu..." required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Đăng Kí</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
