@extends('fe.index')

@section('title', 'Chi Tiết')

@section('main')
<section class="section mt-5">
    <div class="container">
        <h2 class="h5 section-title">Chi tiết</h2>
        <div class="row justify-content-center">
            <div class="col-lg-9 mb-5 mb-lg-0">
                <article class="post-slider mb-4">
                    <img src="{{ asset('storage/images/' . $product->image) }}" class="img-fluid rounded" alt="Product Image">
                </article>
                <h1 class="h2">{{ $product->name }}</h1>
                <ul class="list-inline my-3 text-muted">
                    <li class="list-inline-item">
                        <i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}
                    </li>
                </ul>
                <div class="content mb-5">
                    <p>{!! $product->description !!}</p>
                </div>

                <!-- Comments Section -->
                <div class="mb-5 border-top mt-4 pt-5">
                    <h3 class="mb-4">Bình Luận</h3>
                    <div style="max-height: 400px; overflow-y: auto;">
                        <!-- Hiển thị các bình luận từ tệp JSON -->
                        @php
                            $filePath = storage_path("comments/{$slug}.json");
                            $comments = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];
                        @endphp
                        @foreach ($comments as $index => $comment)
                            <div class="d-flex mb-4 pb-4 border-bottom">
                                <div class="me-3">
                                    <img src="{{ asset('client/images/author.jpg') }}" class="rounded-circle" alt="User Avatar" width="50" height="50">
                                </div>
                                <div>
                                    <a href="#!" class="h5 d-inline-block mb-1">{{ $comment['name'] }}
                                        @if(isset($comment['is_admin']) && $comment['is_admin'])
                                            <i class="bi bi-check-circle-fill text-primary"></i>
                                        @endif
                                    </a>
                                    <p>{{ $comment['comment'] }}</p>
                                    <span class="text-muted me-3">{{ $comment['time'] }}</span>
                                    <div class="d-flex align-items-center">
                                        <form method="POST" action="{{ route('detail.comment.like', ['slug' => $slug, 'index' => $index]) }}" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 me-2">|_-_👍_-_|</button>
                                        </form><br>
                                        <span>{{ isset($comment['likes']) ? $comment['likes'] : 0 }}</span>
                                        <a href="javascript:void(0);" class="btn btn-link p-0 ms-3" onclick="showReplyForm({{ $index }})">|_-_💬_-_|</a>
                                        <form method="POST" action="{{ route('detail.comment.delete', ['slug' => $slug, 'index' => $index]) }}" style="display:inline-block; margin-left: 10px;" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0">|_-_❌_-_|</button>
                                        </form>
                                    </div>
                                    <!-- Form Phản hồi -->
                                    <div id="reply-form-{{ $index }}" class="reply-form mt-2" style="display:none;">
                                        <form method="POST" action="{{ route('detail.comment.reply', ['slug' => $slug, 'index' => $index]) }}">
                                            @csrf
                                            <div class="mb-2">
                                                <textarea class="form-control" name="reply" rows="2" required placeholder="Viết phản hồi của bạn..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Gửi phản hồi</button>
                                        </form>
                                    </div>

                                    <!-- Hiển thị các phản hồi -->
                                    @if (isset($comment['replies']))
                                        <div class="replies mt-3">
                                            @foreach ($comment['replies'] as $reply)
                                                <div class="d-flex mt-2">
                                                    <div class="me-2">
                                                        <img src="{{ asset('client/images/author.jpg') }}" class="rounded-circle" alt="User Avatar" width="40" height="40">
                                                    </div>
                                                    <div>
                                                        <a href="#!" class="h6 d-inline-block mb-1">{{ $reply['name'] }}
                                                            @if(isset($reply['is_admin']) && $reply['is_admin'])
                                                                <i class="bi bi-check-circle-fill text-primary"></i>
                                                            @endif
                                                        </a>
                                                        <p>{{ $reply['reply'] }}</p>
                                                        <span class="text-muted">{{ $reply['time'] }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="mb-4">Để lại bình luận</h3>
                    <form method="POST" action="{{ route('detail.comment', ['slug' => $slug]) }}">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="comment" id="comment" rows="5" required placeholder="Viết bình luận của bạn..."></textarea>
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Bình luận ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function showReplyForm(index) {
    const replyForm = document.getElementById(`reply-form-${index}`);
    if (replyForm.style.display === "none") {
        replyForm.style.display = "block";
    } else {
        replyForm.style.display = "none";
    }
}

function confirmDelete() {
    return confirm('Bạn có chắc chắn muốn xóa bình luận này không?');
}
</script>
@endsection
