<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\PostType;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index(Request $request)
    {
        $postTypes = $this->blogRepository->getDistinctPostTypes();
        $searchTerm = $request->input('search');
        $allPosts = $this->blogRepository->getAllPosts($searchTerm);

        $paginator = $this->paginatePosts($allPosts, 5);

        return view('admin.blogs.index', [
            'allPosts' => $paginator,
            'postTypes' => $postTypes,
            'searchTerm' => $searchTerm,
        ]);
    }

    public function show(int $id)
    {
        try {
            $blog = $this->blogRepository->findById($id);
            if (!$blog) {
                return response()->json(['error' => 'Bài viết không tồn tại.'], 404);
            }
            return response()->json([
                'title' => $blog->title,
                'type' => $blog->type,
                'author' => $blog->author,
                'created_at' => $blog->created_at->format('d/m/Y H:i'),
                'updated_at' => $blog->updated_at->format('d/m/Y H:i'),
                'status' => $blog->status,
                'content' => $blog->content,
                'picture' => $blog->picture ? Storage::url($blog->picture) : asset('template/admin/assets/images/default_image.jpg'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Không thể lấy thông tin chi tiết bài đăng.'], 500);
        }
    }

    public function edit($id)
    {
        $blog = $this->blogRepository->findById($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function update(Request $request, $id)
    {
        $this->validateBlogData($request);

        $blog = $this->blogRepository->findById($id);
        $data = $this->prepareBlogData($request);
        $this->blogRepository->update($blog, $data);

        return redirect()->route('admin.blogs.index')->with('success', 'Cập nhập bài viết thành công!');
    }

    public function showContent($title)
    {
        $blog = $this->blogRepository->findByTitle($title);
        $filteredContent = $this->getFilteredRelatedContent($blog);

        return view('blog.content', [
            'blog' => $blog,
            'relatedContent' => $filteredContent
        ]);
    }

    public function store(Request $request)
    {
        $this->validateBlogData($request);
        $type = $this->handleNewType($request);
        $data = $this->prepareBlogData($request);
        $data['type'] = $type;
        $data['author'] = Auth::user()->name ?? '';
        $this->blogRepository->create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Thêm bài viết thành công.');
    }

    private function paginatePosts($allPosts, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $allPosts->forPage($currentPage, $perPage);

        return new LengthAwarePaginator(
            $currentItems,
            $allPosts->total(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    private function validateBlogData($request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            // 'author' => 'required|string|max:255',
            'type' => 'required|string|in:blog,news,incentives,vexeretip,relatedContent,new',
            'status' => 'required|in:published,draft,archived',
            'new_type' => 'nullable|string|max:255'
        ]);
    }

    private function handleNewType($request)
    {
        $type = $request->input('type');
        if ($type === 'new') {
            $newType = trim($request->input('new_type'));
            if (!empty($newType)) {
                $existingType = PostType::where('name', $newType)->first();
                if (!$existingType) {
                    $postType = new PostType();
                    $postType->name = $newType;
                    $postType->save();
                    return $postType->name;
                } else {
                    return $existingType->name;
                }
            } else {
                return redirect()->back()->withErrors(['new_type' => 'Loại bài viết mới không được để trống.']);
            }
        }
        return $type;
    }

    private function prepareBlogData($request)
    {
        $data = $request->only(['title', 'content', 'author', 'status', 'type']);
        $data['title'] = trim($data['title']);
        $data['content'] = trim($data['content']);
        $data['author'] = Auth::user()->name ?? '';

        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('public/blog_pictures');
        } else {
            $data['picture'] = 'public/blog_pictures/default_image.jpg';
        }

        $data['slug'] = \Illuminate\Support\Str::slug($data['title'], '-');

        return $data;
    }

    private function getFilteredRelatedContent($blog)
    {
        $relatedContent = $this->blogRepository->getRelatedContent();
        return $relatedContent->filter(function ($item) use ($blog) {
            return $item->id !== $blog->id;
        });
    }

    public function destroy($id)
    {
        try {
            $blog = $this->blogRepository->findById($id);
            if (!$blog) {
                return response()->json(['success' => false, 'error' => 'Bài viết không tồn tại.'], 404);
            }
            $this->blogRepository->deleteById($id);
            return response()->json(['success' => true, 'message' => 'Xóa bài viết thành công.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Có lỗi xảy ra khi xóa bài viết.'], 500);
        }
    }
}
