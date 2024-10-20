<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'content' => ['required'],
            'user_id' => ['required'],
            'product_id' => ['required'],
        ]);
        Comment::query()->create($data);
        return redirect()->route('client.shopDetail', $request->product_id)->with('success', 'Bạn đã bình luận thành công !');
    }
    public function listComment()
    {
        $products = Product::withCount('comments')
            ->orderByDesc('comments_count')      
            ->get();
        // dd($products);
        return view('admin.comments.list',compact('products'));
    }
    public function listCommentByProduct($id){
        $comments = Comment::with('user')
        ->where('product_id' ,$id)
        ->paginate(6);
        return view('admin.comments.listComment',compact('comments'));
    }
    public function deleteComment($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admin.listComment')->with('success','Bạn đã xóa thành công !');
    }
}
