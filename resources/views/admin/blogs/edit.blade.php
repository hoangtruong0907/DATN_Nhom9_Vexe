@section('styles') 
    <link rel="stylesheet" href="{{ asset('/template/admin/assets/css/nice-select2.css') }}">
    <style>
        .custom-select-width {
            width: 100% !important;
            max-width: none !important;
        }

        .custom-select-width .select2-container--default .select2-selection--single {
            width: 100% !important;
        } 
    </style>
@endsection

@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('contents')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('admin.blogs.index') }}" class="text-primary hover:underline">Blog</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Chỉnh sửa bài viết</span>
        </li>
    </ul>
    <div class="flex flex-col gap-2.5 xl:flex-row pt-5">
        <!-- Phần bên trái-->
        <div class="panel flex-1 px-4 py-6 xl:w-2/3">
            <div class="text-lg font-semibold mb-4">Chỉnh sửa bài viết</div>  
            <form id="blogForm" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col xl:flex-row justify-between items-start gap-4"> 
                    <div class="flex-1 flex flex-col items-start w-full">
                        <label for="title" class="mb-2">Tiêu đề</label>
                        <input id="title" type="text" name="title" class="form-input w-full" value="{{ old('title', $blog->title) }}" placeholder="Nhập tiêu đề">
                    </div> 
                    <div class="flex-1 flex flex-col items-start w-full">
                        <label for="type" class="form-label mb-2">Loại bài viết</label>
                        
                            <select name="type" id="seachable-select" class="form-control w-full custom-select-width">
                                <option value="blog" {{ old('type', $blog->type) == 'blog' ? 'selected' : '' }}>Thông báo</option>
                                <option value="news" {{ old('type', $blog->type) == 'news' ? 'selected' : '' }}>Tin tức</option>
                                <option value="incentives" {{ old('type', $blog->type) == 'incentives' ? 'selected' : '' }}>Ưu đãi nổi bật</option>
                                <option value="vexeretip" {{ old('type', $blog->type) == 'vexeretip' ? 'selected' : '' }}>Vexere Tip</option>
                                <option value="relatedContent" {{ old('type', $blog->type) == 'relatedContent' ? 'selected' : '' }}>Nội dung liên quan</option>
                                <option value="new" {{ old('type', $blog->type) == 'new' ? 'selected' : '' }}>Tạo loại mới...</option>
                            </select>  
                    </div> 
                    <div id="new-post-type" class="flex-1 flex flex-col items-start" style="display: none;">
                        <label for="new_type" class="form-label mb-2">Loại bài viết mới</label>
                        <input id="new_type" type="text" name="new_type" value="{{ old('new_type', $blog->type) == 'new' ? 'selected' : '' }}" class="form-input w-full" placeholder="Nhập loại bài viết mới">
                    </div>
                </div>  
                <div class="mt-3">
                    <label for="content" class="block mb-2">Nội dung</label>
                    <textarea name="content" id="editor" rows="10">{{ old('content', $blog->content) }}</textarea> 
                </div>
                <div class="mt-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="selectize">
                        <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Xuất bản</option>
                        <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Nháp</option>
                        <option value="archived" {{ old('status', $blog->status) === 'archived' ? 'selected' : '' }}>Lưu trữ</option>
                    </select>
                </div>
                <div class="mt-3">  
                    <label for="picture" class="block mb-2">Hình ảnh</label>
                    <input type="file" name="picture" placeholder="Chọn hình ảnh" id="image">
                    <img id="image-preview" class="mt-2" src="{{ Storage::url($blog->picture) ?? 'https://cdn.dribbble.com/users/4438388/screenshots/15854247/media/0cd6be830e32f80192d496e50cfa9dbc.jpg?resize=1000x750&vertical=center' }}" alt="preview image" style="max-height: 250px;">
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary text-sm py-2 px-4 flex items-center gap-2">Huỷ</a>
                    <button type="submit" class="btn btn-primary text-sm py-2 px-4 flex items-center gap-2">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>  
@endsection

@section('scripts')
   {{-- Loại bài viết mới --}}
   <script>  
    $(document).ready(function() { 
        $('#seachable-select').on('change', function() {
            const newPostTypeField = document.getElementById('new-post-type');
            if (this.value === 'new') {
                newPostTypeField.style.display = 'block';
            } else {
                newPostTypeField.style.display = 'none';
            }
        });
    });
</script> 
{{-- add file  --}}  
<script>
    $(document).ready(function (e) {
        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
            $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script> 
{{-- text editor --}} 
<script src="{{ asset('/template/admin/assets/js/ckeditor.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
{{-- select --}}
<script src="{{ asset('/template/admin/assets/js/nice-select2.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        // default
        var els = document.querySelectorAll('.selectize');
        els.forEach(function(select) {
            NiceSelect.bind(select);
        });
        // seachable
        var options = {
            searchable: true,
        };
        NiceSelect.bind(document.getElementById('seachable-select'), options);
    });
</script> 
@endsection