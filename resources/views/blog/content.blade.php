@extends('layouts.app') <!-- Đặt ở đầu trang -->

@section('title', 'Trang chủ')

@section('styles') <!-- Nếu có styles bổ sung -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('css/stylesmobile.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" />
@endsection
<style>
    footer {
        display: none !important;
    }
</style>
@section('content')
<!-- Phần nội dung -->
<div class="content-vexere">
    <div class="vexere-day layout-container content-vexere-sbay">
        @if(isset($blog))
        <div class="scroll-list scroll-vertical-list">
            <div class="post-title">
                <p class="title-content-vexere ">{{ $blog->title }}</p>
                <img src="{{ Storage::url($blog->picture) }}" alt="{{ $blog->title }}"style="max-width: 688px;" class="card-image">
            </div>
            <div class="post-content">
                <div class="">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
        @else
        <p>Blog post not found.</p>
        @endif
    </div>
</div>

<div class="list-content-main content-vexere">
    <div class="content-vexere-sbay">
        <p class="title-content-vexere">Bài viết liên quan</p>
        <div class="post-relative-child scroll-container">
            @foreach($relatedContent as $item)
            <a href="{{ route('blog.content', ['slug' => \Illuminate\Support\Str::slug($item->title, '-')]) }}" class="native card-item">
                <div class="Category__ItemContainer-mdhnis-1 card-inf item-container item-horizontal-container bg--white" id="card-{{ $item->id }}">
                    <img src="{{ Storage::url($item->picture) }}" alt="{{ $item->title }}" class="card-image">
                    <div class="item-content-container">
                        <div class="card-content">
                            <div class="text-nvc">
                                <h4 class="card-title">{{ $item->title }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            {{ $relatedContent->links() }}
        </div>
    </div>
</div>



@if($showButtonOnly)
<div class="button-register">
    <div class="post-footer">
        <button type="button" class="ant-btn cta-button">
            <p class="button-endow color--black">DÙNG ƯU ĐÃI NGAY</p>
        </button>
    </div>
</div>
@else
<div class="button-register">
    <div class="post-footer">
        <button type="button" class="ant-btn cta-button">
            <p class="button-endow color--black">ĐẶT VÉ NGAY</p>
        </button>
    </div>
</div>
@endif

@endsection

@section('scripts') <!-- Nếu có script bổ sung -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9O1d+3B7d7rF1tkZZ8b5eXKpZzYL9bG7NQf7vq18cW8b8j7xf9I" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-W8fX3F7AdGReJABiOWt2Bz1sB9hR7gT+Z2MOET8iYBIBDR4jow+qp8CF0sbY5hQYw" crossorigin="anonymous"></script>
@endsection