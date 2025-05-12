// function Sort train
function updateTrainList (listRoutesTrain) {
    // add Loader here
    $.ajax({
        'type': 'POST',
        'url': route_update_train,
        data: {
            "list_train": listRoutesTrain,
        },
        success: function(response) {
            // Cập nhật danh sách trên giao diện với HTML mới
            $('.right-filter').empty().append(response.data);
            console.log('Success');
        },
        error: function(xhr) {
            console.error('Lỗi khi tải lại danh sách:', xhr);
        }
    })
    .done((response) => {
        // delete Loader here
    })
}

// Hàm ở block "Sắp Xếp"
function sortRoutesByAscendingPrice() {
    // Sắp xếp theo giá tăng dần
    listRoutesTrain.sort(function(a, b) {
        return a.min_price - b.min_price;
    });
    updateTrainList(listRoutesTrain);
}

function sortRoutesByDescendingPrice() {
    // Sắp xếp theo giá giảm dần
    listRoutesTrain.sort(function(a, b) {
        return b.min_price - a.min_price;
    });
    updateTrainList(listRoutesTrain);
}

function sortRoutesByEarliestDeparture() {
    // Sắp xếp theo giờ đi sớm nhất (thời gian tăng dần)
    listRoutesTrain.sort(function(a, b) {
        return new Date('1970/01/01 ' + a.time) - new Date('1970/01/01 ' + b.time);
    });
    updateTrainList(listRoutesTrain);
}

function sortRoutesByLatestDeparture() {
    // Sắp xếp theo giờ đi muộn nhất (thời gian giảm dần)
    listRoutesTrain.sort(function(a, b) {
        return new Date('1970/01/01 ' + b.time) - new Date('1970/01/01 ' + a.time);
    });
    updateTrainList(listRoutesTrain);
}

function sortRoutesByEarliestArrival() {
    // Sắp xếp theo giờ đến sớm nhất (thời gian tăng dần)
    listRoutesTrain.sort(function(a, b) {
        return new Date('1970/01/01 ' + a.arrival_time) - new Date('1970/01/01 ' + b.arrival_time);
    });
    updateTrainList(listRoutesTrain);
}

function sortRoutesByLatestArrival() {
    // Sắp xếp theo giờ đến muộn nhất (thời gian giảm dần)
    listRoutesTrain.sort(function(a, b) {
        return new Date('1970/01/01 ' + b.arrival_time) - new Date('1970/01/01 ' + a.arrival_time);
    });
    updateTrainList(listRoutesTrain);
}


// Block Sắp Xếp
$('input[name="radio-date-time"]').on("click", function() {
    console.log($('input[name="radio-date-time"]:checked').val());
    switch ($('input[name="radio-date-time"]:checked').val()) {
        case 'fare:asc':
            sortRoutesByAscendingPrice();
            break;
        case 'fare:desc':
            sortRoutesByDescendingPrice();
            break;
        case 'hourGo:asc':
            sortRoutesByEarliestDeparture();
            break;
        case 'hourGo:desc':
            sortRoutesByLatestDeparture();
            break; 
        case 'hourCome:asc':
            sortRoutesByEarliestArrival();
            break;
        case 'hourCome:desc':
            sortRoutesByLatestArrival();
            break;
        default:
            break;
    }
});

// Lọc theo giá
function filterByPrice(min_price, max_price) {
    let filterPrice = listRoutesTrain.filter(function(route) {
        return route.min_price >= parseInt(min_price.replace(/[^\d]/g, '')) && route.max_price <= parseInt(max_price.replace(/[^\d]/g, ''));
    });
    updateTrainList(filterPrice);
}
// Lọc theo "Giờ đi"
function filterByTimeRange(startTime, endTime, when) {
    let filteredRoutes;
    if (when == 'go') {
        // Lọc danh sách chuyến tàu theo khoảng thời gian
        filteredRoutes = listRoutesTrain.filter(function(route) {
            const routeTime = new Date('1970/01/01 ' + route.time);
            return routeTime >= new Date('1970/01/01 ' + startTime) && routeTime <= new Date('1970/01/01 ' + endTime);
        });
    } else if (when == 'come') {
        // Lọc danh sách chuyến tàu theo khoảng thời gian
        filteredRoutes = listRoutesTrain.filter(function(route) {
            const routeTime = new Date('1970/01/01 ' + route.arrival_time);
            return routeTime >= new Date('1970/01/01 ' + startTime) && routeTime <= new Date('1970/01/01 ' + endTime);
        });
    }
    // Cập nhật lại danh sách đã lọc
    updateTrainList(filteredRoutes);
}

function filterMorningEarly(when) {
    // Sáng sớm: 00:00 - 06:00
    filterByTimeRange("00:00", "06:00", when);
}

function filterMorning(when) {
    // Buổi sáng: 06:01 - 12:00
    filterByTimeRange("06:01", "12:00", when);
}

function filterAfternoon(when) {
    // Buổi chiều: 12:01 - 18:00
    filterByTimeRange("12:01", "18:00", when);
}

function filterEvening(when) {
    // Buổi tối: 18:01 - 23:59
    filterByTimeRange("18:01", "23:59", when);
}

$('.group-time').click((e) => {
    // remove active another button
    $('.group-time').removeClass('bg-primary text-white');

    switch (e.currentTarget.dataset.value) {
        case 'timeGo:6h':
            filterMorningEarly('go');
            break;
        case 'timeGo:12h':
            filterMorning('go');
            break; 
        case 'timeGo:18h':
            filterAfternoon('go');
            break;
        case 'timeGo:23h':
            filterEvening('go');
            break;   
        // Come time
        case 'timeCome:6h':
            filterMorningEarly('come');
            break;
        case 'timeCome:12h':
            filterMorning('come');
            break; 
        case 'timeCome:18h':
            filterAfternoon('come');
            break; 
        case 'timeCome:23h':
            filterEvening('come');
            break;     
        default:
            break;
    }

    // add active button
    e.currentTarget.className += " bg-primary text-white";
})

// 
// Khi có sự thay đổi checkbox, thực hiện lọc
$(".checkBoxGroup-b input[type='checkbox']").on("change", filterSeats);
// checkbox all
$("#allSeats").on("change", () => {
    // Kiểm tra nếu checkbox "Tất cả" được chọn
    if ($("#allSeats").is(":checked")) {
        $(".ant-checkbox-input-b").each(function() {
            console.log($(this).val());
            
            $(this).prop('checked', true);
        });
    } else {
        $(".ant-checkbox-input-b").each(function() {
            console.log($(this).val());

            $(this).prop('checked', false);
        });
    } 
    filterSeats()
});

// Hàm để lọc và hiển thị kết quả
function filterSeats() {
    let selectedSeats = [];
        // Lấy các giá trị của các checkbox đã được chọn
        $(".ant-checkbox-input-b:checked").each(function() {
            selectedSeats.push($(this).val());
        });
    
    // Hiển thị kết quả sau khi lọc
    filteredRoutes = listRoutesTrain.map(function(route) {          
        // Sử dụng filter để lọc những phần tử có type chung giữa array1 và array2
        var commonTypes = route.seat_group_status.filter((item) => selectedSeats.includes(item.type))
        if (commonTypes.length > 0 ) {
            return route;
        }
    });
    // nếu ko chọn checkbox nào thì sẽ lấy data mặc định
    if (selectedSeats.length > 0) {
        updateTrainList(filteredRoutes);
    } else {
        updateTrainList(listRoutesTrain)
    }
}