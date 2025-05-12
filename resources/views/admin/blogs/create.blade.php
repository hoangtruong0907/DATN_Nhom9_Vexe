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

@section('title', ' Dashboard')
@section('contents')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('admin.blogs.index') }}" class="text-primary hover:underline">Blog</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Thêm bài viết</span>
        </li>
    </ul>
    <div class="flex flex-col gap-2.5 xl:flex-row pt-5">
        <!-- Phần bên trái-->
        <div class="panel flex-1 px-4 py-6 xl:w-2/3">
            <div class="text-lg font-semibold mb-4">Thêm bài viết mới</div>  
            <form id="blogForm" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col xl:flex-row justify-between items-start gap-4"> 
                    <div class="flex-1 flex flex-col items-start w-full">
                        <label for="title" class="mb-2">Tiêu đề</label>
                        <input id="title" type="text" name="title" class="form-input w-full"
                            placeholder="Nhập tiêu đề">
                    </div> 
                    <div class="flex-1 flex flex-col items-start w-full">
                        <label for="type" class="form-label mb-2">Loại bài viết</label>
                        <select name="type" id="seachable-select" class="form-control w-full custom-select-width">
                            <option value="news" {{ old('type') === 'news' ? 'selected' : '' }} selected>Tin tức</option>
                            <option value="blog" {{ old('type') === 'blog' ? 'selected' : '' }}>Thông báo</option>
                            <option value="incentives" {{ old('type') === 'incentives' ? 'selected' : '' }}>Ưu đãi nổi bật</option>
                            <option value="vexeretip" {{ old('type') === 'vexeretip' ? 'selected' : '' }}>Vexere tip</option>
                            <option value="relatedContent" {{ old('type') === 'relatedContent' ? 'selected' : '' }}>Nội dung liên quan</option>
                            <option value="new">Tạo loại mới...</option>
                        </select>
                    </div> 
                    <div id="new-post-type" class="flex-1 flex flex-col items-start" style="display: none;">
                        <label for="new_type" class="form-label mb-2">Loại bài viết mới</label>
                        <input id="new_type" type="text" name="new_type" class="form-input w-full"
                            placeholder="Nhập loại bài viết mới">
                    </div>
                </div>  
                <div class="mt-3">
                    <label for="content" class="block mb-2">Nội dung</label>
                    <textarea name="content" id="editor" rows="10"></textarea> 
                </div>
                <div class="mt-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select name="status" class="selectize"> 
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Xuất bản</option>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Nháp</option>
                            <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Lưu trữ</option>
                       
                    </select>
                </div>
                <div class="mt-3">  
                    <label for="picture" class="block mb-2">Hình ảnh</label>
                    <input type="file" name="picture" placeholder="Chọn hình ảnh" id="image">
                    <img id="image-preview" class="mt-2" src="https://cdn.dribbble.com/users/4438388/screenshots/15854247/media/0cd6be830e32f80192d496e50cfa9dbc.jpg?resize=1000x750&vertical=center"
                        alt="preview image" style="max-height: 250px;">
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary text-sm py-2 px-4 flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                            <path opacity="0.5" d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 2L12 15M12 15L9 11.5M12 15L15 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Huỷ
                    </a>
                    <button type="submit" class="btn btn-primary text-sm py-2 px-4 flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                            <path d="M3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 11.6585 22 11.4878 21.9848 11.3142C21.9142 10.5049 21.586 9.71257 21.0637 9.09034C20.9516 8.95687 20.828 8.83317 20.5806 8.58578L15.4142 3.41944C15.1668 3.17206 15.0431 3.04835 14.9097 2.93631C14.2874 2.414 13.4951 2.08581 12.6858 2.01515C12.5122 2 12.3415 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M17 22V21C17 19.1144 17 18.1716 16.4142 17.5858C15.8284 17 14.8856 17 13 17H11C9.11438 17 8.17157 17 7.58579 17.5858C7 18.1716 7 19.1144 7 21V22" stroke="currentColor" stroke-width="1.5"></path>
                            <path opacity="0.5" d="M7 8H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                        Thêm
                    </button>
                </div>
            </form>
        </div> 
    </div>  
@endsection
@section('scripts')
    <script>  
        $(document).ready(function() { 
            // -- Thêm loại bài viết mới --
            $('#seachable-select').on('change', function() {
                const newPostTypeField = document.getElementById('new-post-type');
                if (this.value === 'new') {
                    newPostTypeField.style.display = 'block';
                } else {
                    newPostTypeField.style.display = 'none';
                }
            });
            // -- add image preview --
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
