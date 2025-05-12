@extends('admin.layouts.app')

@section('title', 'Banner')
@section('contents')
    <div class="flex flex-col gap-2.5 xl:flex-row">
        <!-- Phần bên trái-->
        <div class="panel flex-1 px-4 py-6 xl:w-2/3">
            <div class="text-lg font-semibold mb-4">Cập nhật ảnh Banner</div>
            <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-3">  
                    <div class="mb-5">
                        <label for="picture" class="block mb-2">Hình ảnh</label>
                        <input type="file" value="" name="file_input" id="file_input" placeholder="Chọn hình ảnh">
                    </div>
                    <div>
                        <img 
                            src="{{asset('storage/images/banner/'. optional($banner_current)->slide_path)}}" 
                            alt="ảnh hiện tại"
                            id="img_review"
                            style="width: 100%; object-fit: cover; max-height: 455px; min-height: 450px; object-position: center center"
                        >
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary text-sm py-2 px-4 flex items-center gap-2">
                        <img src="{{ URL::asset('/template/admin/assets/images/icons/ic_back.svg') }}" class="h-5 w-5" alt="" srcset="">
                        Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary text-sm py-2 px-4 flex items-center gap-2">
                        <img src="{{ URL::asset('/template/admin/assets/images/icons/ic_save.svg') }}" class="h-5 w-5" alt="" srcset="">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div> 
    </div>  
@endsection
@section('scripts')
<script>
    // Update Image
    var image = $('#img_review');
    $('#file_input').on('change', function(){
        image[0].src = URL.createObjectURL(this.files[0]);
    })
</script>
@endsection

