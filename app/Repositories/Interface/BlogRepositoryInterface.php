<?php

namespace App\Repositories\Interface;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\BlogPostModel;

interface BlogRepositoryInterface
{
    public function getDistinctPostTypes();
    public function getAllPosts(?string $searchTerm): LengthAwarePaginator;
    public function findBySlug(string $slug): BlogPostModel;
    public function findById(int $id): BlogPostModel;
    public function findByTitle(string $title): BlogPostModel;
    public function deleteById(int $id);
    public function create(array $data): BlogPostModel;
    public function update(BlogPostModel $blog, array $data): BlogPostModel;
    public function getRelatedContent(): LengthAwarePaginator;
}
