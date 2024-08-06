@extends('fe.index')

@section('title', 'Quên Mật Khẩu')

@section('main')
    <section class="section">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-header bg-primary text-white text-center">
                            <h4>Quên Mật Khẩu</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="form-label">Nhập Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Gửi Liên Kết Đặt Mật Khẩu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
