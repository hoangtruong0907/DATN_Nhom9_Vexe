<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use App\Models\BlogPostModel;


class BlogControllers extends Controller
{
    public function index()
    {
        $postTypes = BlogPostModel::distinct()->pluck('type');

        // Lấy tất cả các bài viết đã xuất bản và phân trang
        $allPosts = BlogPostModel::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->where('type', '!=', 'relatedContent')
            ->paginate(10);

        $typeMapping = [
            'blog' => 'Thông tin mới',
            'news' => 'Tin tức',
            'incentives' => 'Ưu đãi nổi bật',
            'vexeretip' => 'Vexere Tip',
            'relatedContent' => 'Nội dung liên quan',
        ];

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Số lượng mục mỗi trang
        $currentItems = $allPosts->forPage($currentPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, $allPosts->total(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('index', [
            'allPosts' => $paginator,
            'typeMapping' => $typeMapping,
            'postTypes' => $postTypes,
        ]);
    }
    
    public function show($slug)
    {
        $blog = BlogPostModel::where('slug', $slug)->first();
        $relatedContent = BlogPostModel::where('type', 'relatedContent')->where('id', '!=', $blog->id)->paginate(10); ; // Hoặc bất kỳ điều kiện nào khác để lấy nội dung liên quan
        $showButtonOnly = $blog->type === 'incentives';
        
        return view('blog.content', compact('blog', 'relatedContent','showButtonOnly'));
    }
   

}
