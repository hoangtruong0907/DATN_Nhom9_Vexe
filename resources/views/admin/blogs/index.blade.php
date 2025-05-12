@extends('admin.layouts.app')
@section('title', 'Danh sách bài viết')
@section('contents')
<div class="flex flex-wrap items-center justify-between gap-4">
    <h2 class="text-xl">Danh sách bài viết</h2>
    <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
        <div class="flex gap-3">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                <img src="{{ asset('/template/admin/assets/images/icons/ic_add.svg') }} " alt="Icon">
                Thêm bài viết
            </a>
        </div>
        <div class="relative">
            <input type="text" placeholder="Tìm kiếm bài viết" class="peer form-input py-2 ltr:pr-11 rtl:pl-11">
            <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-[11px] rtl:left-[11px]">
                <img src="{{ asset('/template/admin/assets/images/icons/ic_search.svg') }} " alt="Icon">
            </div>
        </div>
    </div>
</div>
<div class="panel mt-5 overflow-hidden border-0 p-0">
    <div class="table-responsive">
        <table class="table-striped table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Người tạo</th>
                    <th>Loại bài viết</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th class="!text-center">Xử lý</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allPosts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ Str::limit($post->title, 7, '...') }}</td>
                    </td>
                    <td>{{ $post->author }}</td>
                    <td>
                        @switch($post->type)
                        @case('news')
                        Tin tức
                        @break

                        @case('incentives')
                        Ưu đãi nổi bật
                        @break

                        @case('blog')
                        Thông báo
                        @break

                        @case('vexeretip')
                        Vexere Tip
                        @break

                        @case('relatedContent')
                        Nội dung liên quan
                        @break

                        @case('new')
                        Loại bài viết mới
                        @break

                        @default
                        {{ $post->type }}
                        @endswitch
                    </td>
                    <td>
                        {{ $post->created_at->format('Y-m-d H:i:s') }}
                    </td>
                    <td>
                        @switch($post->status)
                        @case('published')
                        <span class="badge badge-outline-success"> Công khai</span>
                        @break

                        @case('draft')
                        <span class="badge badge-outline-warning whitespace-nowrap"> Đang cập nhật</span>
                        @break

                        @case('archived')
                        <span class="badge badge-outline-danger">Ẩn</span>
                        @break

                        @default
                        {{ $post->status }}
                        @endswitch
                    </td>
                    <td>
                        <div class="flex gap-4 items-center justify-center">
                            <a href="{{ route('admin.blogs.edit', $post->id) }}" class="hover:text-info">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_edit.svg') }} " alt="Icon">
                            </a>
                            <button class="hover:text-primary detailModal" data-id="{{ $post->id }}">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_detail.svg') }} " alt="Icon">
                            </button>
                            <button class="hover:text-danger deleteModal" data-id="{{ $post->id }}">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_delete_1.svg') }} " alt="Icon">
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="pagination">
            {{ $allPosts->links() }}
        </div>
    </div>
</div>
<!-- Modal Detail -->
<div class="fixed inset-0 right-0 z-[999] hidden panel w-[90%] max-w-lg rounded-lg border-0 p-0 md:w-full overflow-auto"
    id="detailModal" onclick="closeDetailModal(event)">
    <div class="bg-[#fbfbfb] w-full py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]">
        <button type="button" class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
            onclick="closeDetailModal()">
            <img src="{{ asset('/template/admin/assets/images/icons/ic_close.svg') }}" alt="Icon">
        </button>
        <div class="flex flex-wrap items-center">
            <p class="ltr:mr-3 rtl:ml-3" id="modal-title" style="overflow-wrap: break-word;hyphens: auto;white-space: nowrap; overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3; -webkit-box-orient: vertical;font-weight: bold;">
                Tiêu đề
            </p>
            <p class="badge capitalize badge-outline-primary" id="modal-type" style="margin-right:10px;">danh mục</p>
            <div class="flex items-center justify-center" id="statusBadge">
                Trạng thái
            </div>
        </div>
        <img id="modal-image" src="https://via.placeholder.com/800x400" alt="Blog Image" class="w-full h-auto rounded-lg my-3">
        <div id="modal-content">Nội dung sẽ hiển thị ở đây.</div>
    </div>
</div>


<!-- Modal Delete -->
<div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4" id="deleteModal"
    onclick="closeDeleteModal(event)">
    <div class="flex min-h-screen items-center justify-center">
        <div class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
            onclick="event.stopPropagation()">
            <button type="button" class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                onclick="closeDeleteModal()">
                <img src="{{ asset('/template/admin/assets/images/icons/ic_close.svg') }} " alt="Icon">
            </button>
            <div
                class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]">
                Xoá bài viết
            </div>
            <div class="p-5 text-center">
                <div class="mx-auto w-fit rounded-full bg-danger p-4 text-white ring-4 ring-danger/30">
                    <img src="{{ asset('/template/admin/assets/images/icons/ic_delete.svg') }} " alt="Icon">
                </div>
                <div class="mx-auto mt-5 sm:w-3/4">Bạn có chắc chắn muốn xóa bài viết này không?</div>
                <!-- Action Buttons -->
                <div class="mt-8 flex items-center justify-center">
                    <button type="button" class="btn btn-outline-danger" onclick="closeDeleteModal()">Huỷ</button>
                    <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                        onclick="delete_post()">Xoá</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('/template/admin/assets/js/simple-datatables.js') }}"></script>
<script src="{{ asset('/template/admin/ajax/blogManagement.js') }}"></script>
<script>
    $(document).on('click', '.detailModal', function() {
        const postId = $(this).data('id');
        $.ajax({
            url: `/admin/blogs/${postId}`,
            type: 'GET',
            success: function(data) {
                $('#modal-title').text(data.title);
                $('#modal-type').text(data.type);
                $('#statusBadge').text(data.status);
                $('#modal-content').html(data.content);
                $('#modal-image').attr('src', `http://127.0.0.1:8000${data.picture}`);
                $('#detailModal').removeClass('hidden');
            },
        });
    });
</script>
@endsection