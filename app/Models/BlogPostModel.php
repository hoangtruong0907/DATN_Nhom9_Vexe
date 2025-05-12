<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Thêm dòng này

class BlogPostModel extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $slug = Str::slug($blog->title);
            $originalSlug = $slug;
            $counter = 1;
    
            while (BlogPostModel::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
    
            $blog->slug = $slug;
        });
    }

    // Đặt các thuộc tính có thể gán giá trị hàng loạt
    protected $fillable = [
        'title',
        'picture',
        'content',
        'created_at',
        'updated_at',
        'author',
        'type',
        'slug', 
        'status',
    ];

    public $timestamps = true;

    public function isActive()
    {
        return $this->status;
    }
    
}

