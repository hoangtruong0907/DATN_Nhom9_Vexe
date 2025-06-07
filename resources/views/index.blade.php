@extends('layouts.app')

@section('title', 'Trang chủ')
@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/air-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/home-style.css') }}">
@endsection

@section('content')

<!-- slide -->
<div class="total-slide position-relative">
    <div class="container-airlinetickets position-absolute top-50 start-50 translate-middle shadow">
        @include('components.search_component', [
        'params' => [],
        'key' => 1,
        ])
    </div>
    <div class="img-slide">
    <img src="{{asset('storage/images/banner/'. optional($banner_current)->slide_path)}}" alt="slide">
    </div>
    <div class="wrap-criteria">
        <div class="criteria-slide">
            <img src="{{ asset('images/criteria1.svg') }}" alt="criteria">
            <p>Chắc chắn có chỗ</p>
        </div>
        <div class="criteria-slide">
            <img src="{{ asset('images/criteria2.svg') }}" alt="criteria">
            <p>Hỗ Trợ 24/7</p>
        </div>
        <div class="criteria-slide">
            <img src="{{ asset('images/criteria3.svg') }}" alt="criteria">
            <p>Nhiều ưu đãi</p>
        </div>
        <div class="criteria-slide">
            <img src="{{ asset('images/criteria4.svg') }}" alt="criteria">
            <p>Thanh toán đa dạng</p>
        </div>
    </div>
</div>
<div class="formCard">
    @if (isset($allPosts) && $allPosts->count())
    @php
    $groupedPosts = $allPosts->groupBy('type');
    @endphp

    @foreach ($groupedPosts as $type => $posts)
    <div class="nigt">
        <div class="text-card blogs">
            <p class="card-type popular-route-label">{{ $typeMapping[$type] ?? ucfirst($type) }}</p>
        </div>
        <div class="blogs">
            <div class="scroll-container popular">
                <div class="container item-card-list">
                    @foreach ($posts as $post)
                    @if ($post->status !== 'archived')
                    <div class="card-wrapper">
                        <a
                            href="{{ route('blog.content', ['slug' => \Illuminate\Support\Str::slug($post->title, '-')]) }}">
                            <div class="card card-item listben">
                                <img src="{{ Storage::url($post->picture) }}" alt="{{ $post->title }}"
                                    class="card-image">
                                <div class="card-content">
                                    <div class="text-nvc">
                                        <h4 class="card-title">{{ $post->title }}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <div class="w-100 p-2 d-flex justify-content-center align-items-center">
            <p>Chưa có bài viết nào. Liên hệ Admin để thêm bài viết.</p>
        </div>
    @endif
</div>
    @if (isset($listProduct))
        <div class="container">
            <div class="block-recommend">
                <div class="title-recommend">
                    Sản phẩm đề xuất
                </div>
                <div class="block-items">
                    <div class="card-items">
                        @for ($i = 1; $i < 11; $i++)
                            <div class="card-item">
                            <img src="https://picsum.photos/{{$i}}00" alt="" srcset="">
                            <div class="card-info">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis at minus delectus velit iste magni, possimus autem ipsa error non porro ex id necessitatibus eum voluptatem soluta doloribus corporis maiores?</p>
                                <div class="price"><small>₫</small>{{$i}}00.000</div>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    @endif
</div>

<div class="logo-marquee">
  <div class="logo-track">
    <img src="{{ asset('images/audi.png') }}" alt="Logo 1" />
    <img src="{{ asset('images/mec.png') }}" alt="Logo 2" />
    <img src="{{ asset('images/peugeot.png') }}" alt="Logo 3" />
    <img src="{{ asset('images/suzuki.png') }}" alt="Logo 4" />
    <img src="{{ asset('images/bmw.png') }}" alt="Logo 5" />
    <img src="{{ asset('images/ford.png') }}" alt="Logo 6" />
    <img src="{{ asset('images/hyundai.png') }}" alt="Logo 7" />
    <img src="{{ asset('images/vinFast.png') }}" alt="Logo 8" />

    <!-- Lặp lại bộ logo -->
    <img src="{{ asset('images/audi.png') }}" alt="Logo 1" />
    <img src="{{ asset('images/mec.png') }}" alt="Logo 2" />
    <img src="{{ asset('images/peugeot.png') }}" alt="Logo 3" />
    <img src="{{ asset('images/suzuki.png') }}" alt="Logo 4" />
    <img src="{{ asset('images/bmw.png') }}" alt="Logo 5" />
    <img src="{{ asset('images/ford.png') }}" alt="Logo 6" />
    <img src="{{ asset('images/hyundai.png') }}" alt="Logo 7" />
    <img src="{{ asset('images/vinFast.png') }}" alt="Logo 8" />
  </div>
</div>


@endsection
@push('page-scripts')
<script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moon-time@2.4.0/calculate.min.js"></script>
<script>
    // data load search component
    // #bus
    const busCities = @json($list_areas ?? []);
    const dateTo = @json($params -> dateTo ?? '');
    const dateFrom = @json($params -> dateFrom ?? '');
    // #train
    const trainStations = @json($list_areas_train ?? []);
    const dateToTrain = @json($params -> dateToTrain ?? '');
    const dateFromTrain = @json($params -> dateFromTrain ?? '');
</script>
<script src="{{ asset('js/search_component.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.listben');
        let maxHeight = 0;
        cards.forEach(card => {
            card.style.height = 'auto';
            if (card.offsetHeight > maxHeight) {
                maxHeight = card.offsetHeight;
            }
        });
        const maxCardHeight = 220;
        cards.forEach(card => {
            card.style.height = Math.min(maxHeight, maxCardHeight) + 'px';
        });
    });
</script>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Chat Ai"
  agent-id="a91d4ee9-2d60-452e-bbd2-d6c703ee1d39"
  language-code="vi"
></df-messenger>

<div id="chatbot-new">
    <a href="https://zalo.me/0964277082" target="_blank" class="chatbot-icon zalo">
        <img src="https://sbaygroup.com/images/zalo-img-sbay.jpg" alt="zalo" />
    </a>     
</div>

@endpush
