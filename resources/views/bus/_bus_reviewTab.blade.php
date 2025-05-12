@if (!empty($reviewPoint) && !empty($reviews) && !empty($reviewPoint['overall']))
    <div id="review-tab-{{ $companyId }}">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center rating-info">
                <button class="btn btn-primary p-1" style="white-space: nowrap;"><i
                        class="fa-solid fa-star me-1"></i>{{ $reviewPoint['overall']['rv_main_value'] }}</button>
                <div class="d-flex align-items-center star-rating ms-2 me-2" style="color: rgb(255, 199, 0);">
                    {!! renderRatingStars($reviewPoint['overall']['rv_main_value']) !!}
                </div>
                <div class="text-wrap">{{ $reviewPoint['overall']['total_reviews'] }} Đánh giá</div>
            </div>
        </div>
        <div class="d-flex flex-column mt-2 mb-2">
            <div class="row d-flex w-100 ps-2 pe-2">
                @if (isset($reviewPoint['overall']))
                    @foreach ($reviewPoint['rating'] as $i => $point)
                        <div class="col-sm-12 col-md-4 ps-2 pe-2" data-id="{{ $point['id'] }}">
                            <div class="card item-card-rating">
                                <div class="card-body p-0">
                                    <div class="d-flex justify-content-between">
                                        <div class="fw-bold" data-name-rv="{{ $point['rv_main_name'] }}">
                                            {{ $point['label'] }}
                                        </div>
                                        <div class="fw-bold">{{ $point['rv_main_value'] }}</div>
                                    </div>
                                    <div class="progress">
                                        {!! renderRatingBar($point['rv_main_value']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <ul class="nav nav-pills mb-1 pill-rating-filter" role="tablist">
            <li class="nav-item filter-rating" role="presentation">
                <button class="nav-link filter-btn-rating active" data-filter-rating="all" data-bs-toggle="tab"
                    data-bs-target="#{{ $companyId }}-all-filer-tab">Tất cả
                    ({{ array_sum($reviewPoint['statisticsReview']) }})</button>
            </li>
            @foreach ($reviewPoint['statisticsReview'] as $key => $statisticsRv)
                <li class="nav-item filter-rating" role="presentation">
                    <button class="nav-link filter-btn-rating" data-filter-rating="{{ $key }}"
                        data-bs-toggle="tab"
                        data-bs-target="#{{ $companyId }}-{{ $key }}-filer-tab">{!! underscoreToStr($key) !!}
                        ({{ $statisticsRv }})
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content list-group w-100 list-gr-review">
            <div class="tab-pane fade show active" id="{{ $companyId }}-all-filer-tab" role="tabpanel"
                aria-labelledby="{{ $companyId }}-all-filer-tab" tabindex="0">
                {{-- Load all reviews  --}}
                @foreach ($reviews['items'] as $i => $review)
                    <div class="list-group-item list-group-item-action p-3" aria-current="true"
                        id="review-item-{{ $review['id'] }}">
                        <div class="d-flex w-100 justify-content-between">
                            <div class="d-flex user-review custom-avatar">
                                <img class="avatar-review"
                                    src="{{ !empty($review['social_avatar']) ? $review['social_avatar'] : asset('images/default-avatar-user.jpg') }}"
                                    alt="anh-dai-dien" srcset="">
                                <div class="d-flex flex-column mt-1 ms-1 custom-1">
                                    <h6 class="mb-1">{{ $review['name'] ?? 'Người dùng ẩn danh' }}</h6>
                                    <div class="d-flex align-items-center star-rating" style="color: rgb(255, 199, 0);">
                                        {!! renderRatingStars($review['rating']) !!}
                                    </div>
                                </div>
                            </div>
                            <small class="time">{{ timeAgo($review['created_at']) }}</small>
                        </div>
                        <p class="mb-1">{{ $review['comment'] ?? '' }}</p>
                        <div class="d-flex list-img-review flex-row">
                            {{-- <a href="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/anh-gai-xinh-1-17.jpg" data-lightbox="gallery" data-title="Hình ảnh 1">
                                <img class="thumb-img-review" src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/anh-gai-xinh-1-17.jpg" alt="thumb-1">
                            </a> --}}
                            <a href="https://storage.googleapis.com/fe-production/images/review/C5L9PG5/img_1723897621661.jpg" data-lightbox="gallery" data-title="Hình ảnh 2">
                                <img class="thumb-img-review" src="https://storage.googleapis.com/fe-production/images/review/C5L9PG5/img_1723897621661.jpg" alt="thumb-2">
                            </a>
                            <a href="https://danangfantasticity.com/wp-content/uploads/2018/10/cau-rong-top-20-cay-cau-ky-quai-nhat-the-gioi-theo-boredom-therapy-02.jpg" data-lightbox="gallery" data-title="Hình ảnh 3">
                                <img class="thumb-img-review" src="https://danangfantasticity.com/wp-content/uploads/2018/10/cau-rong-top-20-cay-cau-ky-quai-nhat-the-gioi-theo-boredom-therapy-02.jpg" alt="thumb-3">
                            </a>
                            @if (count($review['images']) > 0)
                            @foreach ($review['images'] as $img)
                                @php
                                    $headers = get_headers($img['large'], 1);
                                @endphp
                                @if (strpos($headers[0], '200') !== false)
                                    <a href="{{ $img['large'] }}" data-lightbox="gallery" data-title="Hình ảnh từ review">
                                        <img class="thumb-img-review" src="{{ $img['thumb'] }}" alt="thumb-{{ $loop->index + 1 }}">
                                    </a>
                                @endif
                            @endforeach
                        @endif
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <small class="date">Đã đi ngày
                                {{ formatDateTime($review['approved_at'], 'd-m-Y') }}</small>
                            <div class="item-check-review ms-1">
                                <i class="fa-solid fa-ticket"></i>
                                <small>Đã mua vé</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Load review by Type  --}}
            @foreach ($reviewByType as $key => $reviews)
                <div class="tab-pane fade" id="{{ $companyId }}-{{ $key }}-filer-tab" role="tabpanel">
                    @if (count($reviews) > 0)
                        @foreach ($reviews as $review)
                            <div class="list-group-item list-group-item-action p-3" aria-current="true"
                                id="review-item-{{ $review['id'] }}">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex user-review">
                                        <img class="avatar-review"
                                            src="{{ !empty($review['social_avatar']) ? $review['social_avatar'] : asset('images/default-avatar-user.jpg') }}"
                                            alt="anh-dai-dien" srcset="">
                                        <div class="d-flex flex-column mt-1 ms-1 custom-1">
                                            <h6 class="mb-1">{{ $review['name'] ?? 'Người dùng ẩn danh' }}</h6>
                                            <div class="d-flex align-items-center star-rating"
                                                style="color: rgb(255, 199, 0);">
                                                {!! renderRatingStars($review['rating']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <small>{{ timeAgo($review['created_at']) }}</small>
                                </div>
                                <p class="mb-1">{{ $review['comment'] ?? '' }}</p>
                                <div class="d-flex list-img-review flex-row">
                                    @if (count($review['images']) > 0)
                                        @foreach ($review['images'] as $img)
                                            <img class="thumb-img-review"
                                                src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/anh-gai-xinh-1-17.jpg"
                                                alt="thumb-1">
                                        @endforeach
                                    @endif
                                </div>

                                <div class="d-flex align-items-center">
                                    <small class="date">Đã đi ngày
                                        {{ formatDateTime($review['approved_at'], 'd-m-Y') }}</small>
                                    <div class="item-check-review ms-1">
                                        <i class="fa-solid fa-ticket"></i>
                                        <small>Đã mua vé</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="d-flex justify-content-center mt-4">
                            <p>Không có đánh giá nào phù hợp</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="d-flex justify-content-center mt-4">
        <p>Không có đánh giá nào cho xe khách này</p>
    </div>
@endif


