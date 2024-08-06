<?php
// app/Http/Controllers/DetailController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class DetailController extends Controller
{
    public function show($slug)
    {
        // Tìm sản phẩm theo slug
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('fe.detail', compact('product', 'slug'));
    }






    public function storeComment(Request $request, $slug)
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Lấy dữ liệu từ form
        $commentData = [
            'name' => $user->name,
            'email' => $user->email,
            'comment' => $request->input('comment'),
            'time' => now()->toDateTimeString(),
        ];


        $filePath = storage_path("comments/{$slug}.json");


        $comments = [];
        if (File::exists($filePath)) {
            $comments = json_decode(File::get($filePath), true);
        }


        $comments[] = $commentData;

       
        File::put($filePath, json_encode($comments, JSON_PRETTY_PRINT));

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function deleteComment($slug, $index)
    {

        $filePath = storage_path("comments/{$slug}.json");


        if (File::exists($filePath)) {
            $comments = json_decode(File::get($filePath), true);

            // Xóa bình luận tại vị trí $index
            if (isset($comments[$index])) {
                unset($comments[$index]);

                // Cập nhật lại tệp JSON
                File::put($filePath, json_encode(array_values($comments), JSON_PRETTY_PRINT));
            }
        }

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }








    public function likeComment($slug, $index)
    {
        // Đường dẫn tới tệp JSON
        $filePath = storage_path("comments/{$slug}.json");

        // Đọc nội dung tệp hiện tại
        if (File::exists($filePath)) {
            $comments = json_decode(File::get($filePath), true);

            // Kiểm tra và cập nhật lượt thích cho bình luận tại vị trí $index
            if (isset($comments[$index])) {
                if (!isset($comments[$index]['likes'])) {
                    $comments[$index]['likes'] = 0;
                }
                $comments[$index]['likes']++;

                // Cập nhật lại tệp JSON
                File::put($filePath, json_encode($comments, JSON_PRETTY_PRINT));
            }
        }

        return redirect()->back()->with('success', 'Đã thích bình luận!');
    }

public function replyComment(Request $request, $slug, $index)
{
    // Đường dẫn tới tệp JSON
    $filePath = storage_path("comments/{$slug}.json");

    // Đọc nội dung tệp hiện tại
    if (File::exists($filePath)) {
        $comments = json_decode(File::get($filePath), true);

        // Thêm phản hồi mới vào bình luận tại vị trí $index
        if (isset($comments[$index])) {
            $comments[$index]['replies'][] = [
                'name' => Auth::user()->name,
                'reply' => $request->input('reply'),
                'time' => now()->toDateTimeString(),
            ];

            // Cập nhật lại tệp JSON
            File::put($filePath, json_encode($comments, JSON_PRETTY_PRINT));
        }
    }

    return redirect()->back()->with('success', 'Đã phản hồi bình luận!');
}




}

