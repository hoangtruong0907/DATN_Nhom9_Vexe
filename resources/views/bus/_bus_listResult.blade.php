<div class="pe-3 ps-3 trip-Results">
    <div class="result-trips-container">
        <p class="trip-Results-br color--darkness">
            Kết quả: {{ $total }} chuyến
        </p>
    </div>
</div>

<div class="pe-3 ps-3 filter-Criteria">
    <div class="ant-radio-group ant-radio-group-outline ant-radio-group-large Criteria dynamic-filter">
        <p class="dynamic-Criteria dynamic-filter-title color--darkness">
            Tiêu chí lọc nhanh phổ biến
        </p>
        <div class="dynamic-filter-scroll-list">
            @foreach (array_slice([
                'https://f1e425bd6cd9ac6.cmccloud.com.vn/dynamic-filter-auto/images/3/banner.png?v=16',
                'https://f1e425bd6cd9ac6.cmccloud.com.vn/dynamic-filter-auto/images/2/banner.png?v=7',
                'https://f1e425bd6cd9ac6.cmccloud.com.vn/dynamic-filter/images/265/banner.png?v=1',
                'https://f1e425bd6cd9ac6.cmccloud.com.vn/dynamic-filter/images/266/banner.png?v=1',
                'https://f1e425bd6cd9ac6.cmccloud.com.vn/dynamic-filter/images/267/banner.png?v=1',
                'https://f1e425bd6cd9ac6.cmccloud.com.vn/dynamic-filter/images/268/banner.png?v=1'
            ], 0, 6) as $image) <!-- Hiển thị 6 hình -->
            <div class="dynamic-filter-container" data-filter="{{ $loop->index < 2 ? 'discount' : 'no-discount' }}">
                <label class="dynamic-filter-Coupon ant-radio-button-wrapper-unchecked ant-radio-button-wrapper"
                    style="background-image:url({{ $image }}), url(https://229a2c9fe669f7b.cmccloud.com.vn/images/default-dynamic-filter-background-sm.jpg); background-size:cover; overflow:hidden">
                    <span class="ant-radio-button">
                        <span class="ant-radio-button-inner"></span>
                    </span>
                    <span class="selection-text" style="display: none;">Đang chọn</span>
                </label>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div id="routes-container">
    @foreach ($list_routes as $key => $route)
    @php
        $hasDiscount = $route['route']['schedules'][0]['fare']['original'] !== $route['route']['schedules'][0]['fare']['max'];
    @endphp

    <div class="route-item" data-discount="{{ $hasDiscount ? 'true' : 'false' }}">
        @include('bus._bus_item', [
            'route' => $route,
            'dataRoute' => $route['route'],
            'pickupData' => $route['route']['pickup_points'],
            'dropoffData' => $route['route']['dropoff_points'],
            'key' => (string) $key,
        ])
    </div>
    @if ($key == 0)
    <div id="carousel-ads" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <a href="#" class="carousel-item active">
                <picture>
                    <source media="(max-width: 600px)"
                        srcset="https://static.vexere.com/production/banners/908/banner-app540x172.png">
                    <img src="https://static.vexere.com/production/banners/1083/__banner-pc_1170x155-(2).jpg">
                </picture>
            </a>
            <a href="#" class="carousel-item ">
                <picture>
                    <source media="(max-width: 600px)"
                        srcset="https://static.vexere.com/production/banners/908/banner-app540x172.png">
                    <img src="https://static.vexere.com/production/banners/1083/__banner-pc_1170x155-(2).jpg">
                </picture>
            </a>
            <a href="#" class="carousel-item ">
                <picture>
                    <source media="(max-width: 600px)"
                        srcset="https://static.vexere.com/production/banners/908/banner-app540x172.png">
                    <img src="https://static.vexere.com/production/banners/1083/__banner-pc_1170x155-(2).jpg">
                </picture>
            </a>
            <a href="#" class="carousel-item ">
                <picture>
                    <source media="(max-width: 600px)"
                        srcset="https://static.vexere.com/production/banners/908/banner-app540x172.png">
                    <img src="https://static.vexere.com/production/banners/1083/__banner-pc_1170x155-(2).jpg">
                </picture>
            </a>
            <a href="#" class="carousel-item ">
                <picture>
                    <source media="(max-width: 600px)"
                        srcset="https://static.vexere.com/production/banners/908/banner-app540x172.png">
                    <img src="https://static.vexere.com/production/banners/1083/__banner-pc_1170x155-(2).jpg">
                </picture>
            </a>
            <a href="#" class="carousel-item ">
                <picture>
                    <source media="(max-width: 600px)"
                        srcset="https://static.vexere.com/production/banners/908/banner-app540x172.png">
                    <img src="https://static.vexere.com/production/banners/1083/__banner-pc_1170x155-(2).jpg">
                </picture>
            </a>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-ads"
            data-bs-slide="prev">
            <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-ads"
            data-bs-slide="next">
            <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
        </button>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-ads" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel-ads" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel-ads" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carousel-ads" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carousel-ads" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carousel-ads" data-bs-slide-to="5"
                aria-label="Slide 6"></button>
        </div>
    </div>
    @endif
    @endforeach
</div>

@if ($totalPages > 1)
<nav class="d-flex justify-content-center">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($currentPage > 1)
        <li class="page-item">
            <a class="page-link"
                href="javascript:void(0);"
                onclick="loadDataSearchBus({{ $currentPage - 1 }})"
                rel="prev">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </li>
        @else
        <li class="page-item disabled">
            <span class="page-link"><i class="fa-solid fa-chevron-left"></i></span>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @for ($i = 1; $i <= $totalPages; $i++)
        <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
            <a class="page-link"
                href="javascript:void(0);"
                onclick="loadDataSearchBus({{ $i }})">{{ $i }}</a>
        </li>
        @endfor

        {{-- Next Page Link --}}
        @if ($currentPage < $totalPages)
        <li class="page-item">
            <a class="page-link"
                href="javascript:void(0);"
                 onclick="loadDataSearchBus({{ $currentPage + 1 }})"
                rel="next"><i class="fa-solid fa-chevron-right"></i>
            </a>
        </li>
        @else
        <li class="page-item disabled">
            <span class="page-link"><i class="fa-solid fa-chevron-right"></i></span>
        </li>
        @endif
    </ul>
</nav>
@endif

<script>
    function handleUtilitiesTab(id, seat_template_id) {
        $.ajax({
            method: 'POST',
            url: '{{ route('route.utilities') }}',
            data: {
                id: id,
                seat_template_id: seat_template_id
            },
        }).done((res) => {
            if (Array.isArray(res.data)) {
                res.data.map((el) => {
                    $('#utilities_' + id).empty().append(
                        `<div class="facility-description">
                            <div class="img-name">
                                <img src="//${el.icon_url}"/>
                                <div class="name">${el.name}</div>
                            </div>
                            <div class="description">${el.description}</div>
                        </div>
                        <div class="line-utilities mb-4"></div>`
                    );
                });
            } else {
                console.error("Dữ liệu không hợp lệ:", res);
            }
        });
    }

    function filterDiscountedItems() {
        const routeItems = document.querySelectorAll('.route-item');

        routeItems.forEach(item => {
            const hasDiscount = item.getAttribute('data-discount') === 'true';
            item.style.display = hasDiscount ? 'block' : 'none';
        });
    }

    document.querySelectorAll('.dynamic-filter-container[data-filter="discount"]').forEach(container => {
        container.addEventListener('click', function() {

            filterDiscountedItems();


            document.querySelectorAll('.selection-text').forEach(text => {
                text.style.display = 'none';
            });
            const selectionText = this.querySelector('.selection-text');
            selectionText.style.display = 'inline';


            document.querySelectorAll('.dynamic-filter-Coupon').forEach(label => {
                label.classList.remove('selected');
            });
            this.querySelector('.dynamic-filter-Coupon').classList.add('selected');
        });
    });


    document.querySelectorAll('.dynamic-filter-container[data-filter="no-discount"]').forEach(container => {
        container.addEventListener('click', function() {

        });
    });

    $('.ant-btn-bus').click(function () {
        const id_button = $(this).attr('data-id');
        $('#ticket-button-collapse-'+ id_button).click();
        $('#rating-tab-'+id_button).click();
    })
</script>
