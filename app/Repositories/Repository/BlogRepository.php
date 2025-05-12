<?php

namespace App\Repositories\Repository;
use App\Repositories\Interface\BlogRepositoryInterface;
use App\Models\BlogPostModel;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogRepository implements BlogRepositoryInterface
{
    public function getDistinctPostTypes()
    {
        return BlogPostModel::distinct()->pluck('type');
    }

    public function getAllPosts(?string $searchTerm): LengthAwarePaginator
    {
        $query = BlogPostModel::query();

        if ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        return $query->orderBy('created_at', 'desc')->paginate(10);
    }

    public function findBySlug(string $slug): BlogPostModel
    {
        return BlogPostModel::where('slug', $slug)->firstOrFail();
    }

    public function findById(int $id): BlogPostModel
    {
        return BlogPostModel::findOrFail($id);
    }

    public function findByTitle(string $title): BlogPostModel
    {
        return BlogPostModel::where('title', $title)->firstOrFail();
    }

    public function deleteById(int $id)
    {
        $blog = $this->findById($id);
        $blog->delete();
    }

    public function create(array $data): BlogPostModel
    {
        return BlogPostModel::create($data);
    }

    public function update(BlogPostModel $blog, array $data): BlogPostModel
    {
        $blog->fill($data);
        $blog->save();
        return $blog;
    }

    public function getRelatedContent(): LengthAwarePaginator
    {
        return BlogPostModel::where('type', 'relatedContent')->paginate(10);
    }
}
