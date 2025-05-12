function updateBusDropdownList(
    inputValue,
    inputElement,
    dropdownListElement,
    filter
) {
    dropdownListElement.innerHTML = "";
    const filteredCities = busCities.filter((city) =>
        city.name.toLowerCase().includes(filter.toLowerCase())
    );
    filteredCities.forEach((city) => {
        const item = document.createElement("li");
        item.className = "custom-dropdown-item";
        item.innerHTML = `
                        <div class="custom-item-container">
                        <div class="custom-icon-section">
                            <i class="fa-solid fa-bus-simple"></i>
                        </div>
                        <div class="custom-content-section">
                            <div class="custom-city-title"><b>${city.name}</b></div>
                        </div>
                        </div>
                    `;
        item.addEventListener("mousedown", function (event) {
            event.preventDefault();
            inputElement.value = city.name;
            inputValue.value = city.id;
            dropdownListElement.parentElement.style.display = "none";
        });
        dropdownListElement.appendChild(item);
    });
}

function setupBusInput(inputValue, inputElement, dropdownMenu, dropdownList) {
    inputElement?.addEventListener("focus", function () {
        dropdownMenu.style.display = "block";
        updateBusDropdownList(
            inputValue,
            inputElement,
            dropdownList,
            inputElement.value
        );
    });

    inputElement?.addEventListener("blur", function () {
        setTimeout(function () {
            dropdownMenu.style.display = "none";
        }, 200);
    });

    inputElement?.addEventListener("input", function () {
        updateBusDropdownList(
            inputValue,
            inputElement,
            dropdownList,
            inputElement.value
        );
    });

    inputElement?.addEventListener("click", function () {
        dropdownMenu.style.display = "block";
        updateBusDropdownList(
            inputValue,
            inputElement,
            dropdownList,
            inputElement.value
        );
    });
}

$(document).on("mousedown", ".custom-dropdown-item", function () {
    $(this).closest(".bus-dropdown-menu").hide();
});

const busFrom = document.getElementById("bus_from");
const busFromInput = document.getElementById("bus_from_input");
const busFromDropdownMenu = document.querySelector(
    ".custom-bus-from-select-wrapper .bus-dropdown-menu"
);
const busFromDropdownList = document.getElementById("dropdown_list_bus_from");

setupBusInput(busFrom, busFromInput, busFromDropdownMenu, busFromDropdownList);

const busTo = document.getElementById("bus_to");
const busToInput = document.getElementById("bus_to_input");
const busToDropdownMenu = document.querySelector(
    ".custom-bus-to-select-wrapper .bus-dropdown-menu"
);
const busToDropdownList = document.getElementById("dropdown_list_bus_to");

setupBusInput(busTo, busToInput, busToDropdownMenu, busToDropdownList);

// Custom Select slim
var bus_select_from = new SlimSelect({
    select: '.bus_from_input',
    settings: {
        placeholderText: 'Điểm Đi',
    },
    events: {
        afterChange: () => {
            saveSelections();
        },
        afterClose: () => {
            bus_select_to.open();
        },
    }
})

var bus_select_to = new SlimSelect({
    select: '.bus_to_input',
    settings: {
        placeholderText: 'Điểm Đến',
    },
    events: {
        afterChange: () => {
            saveSelections()
        }
    }
})

var train_select_to = new SlimSelect({
    select: '.train_to_input',
    settings: {
        placeholderText: 'Ga Đến',
    },
    events: {
        afterChange: () => {
            saveSelections()
        }
    }
})

var train_select_from = new SlimSelect({
    select: '.train_from_input',
    settings: {
        placeholderText: 'Ga Đi',
    },
    events: {
        afterChange: () => {
            saveSelections()
        }
    }
})

 // Hàm để lưu lựa chọn vào Local Storage
 function saveSelections() {
    localStorage.setItem('bus_select_from', bus_select_from.getSelected());
    localStorage.setItem('bus_select_to', bus_select_to.getSelected());
    busFrom.value = bus_select_from.getSelected();
    busTo.value = bus_select_to.getSelected();

    // train
    localStorage.setItem('train_select_from', train_select_from.getSelected());
    localStorage.setItem('train_select_to', train_select_to.getSelected());
    trainFrom.value = train_select_from.getSelected();
    trainTo.value = train_select_to.getSelected();

    // set localStorage for date bus
    localStorage.setItem('bus_date_to', $('#bus_date_to').val());
    localStorage.setItem('bus_date_from', $('#bus_date_from').val());

    // set localStorage for date train
    localStorage.setItem('train_date_to', $('#train_date_to').val());
    localStorage.setItem('train_date_from', $('#train_date_from').val());
    console.log('update');

}

// Hàm để khôi phục lựa chọn từ Local Storage
function restoreSelections() {
    var bus_select_from_local = localStorage.getItem('bus_select_from');
    var bus_select_to_local = localStorage.getItem('bus_select_to');

    if (bus_select_from_local) {
        bus_select_from.setSelected(bus_select_from_local);
    }
    if (bus_select_to_local) {
        bus_select_to.setSelected(bus_select_to_local);
    }

    // Train
    var train_select_from_local = localStorage.getItem('train_select_from');
    var train_select_to_local = localStorage.getItem('train_select_to');

    if (train_select_from_local) {
        train_select_from.setSelected(train_select_from_local);
    }
    if (train_select_to_local) {
        train_select_to.setSelected(train_select_to_local);
    }
}

// Khôi phục lựa chọn khi trang tải
document.addEventListener('DOMContentLoaded', function() {
    restoreSelections();
});

const busSwapButton = document.getElementById("bus_swap_button");
busSwapButton.addEventListener("click", function () {
    const fromValue = busFromInput.value;
    const toValue = busToInput.value;
    const temp = fromValue

    busFromInput.value = toValue;
    busToInput.value = temp;

    bus_select_from.setSelected(toValue, true);
    bus_select_to.setSelected(fromValue, true);

    // Lưu lựa chọn sau khi hoán đổi
    saveSelections();

    //Hiden value
    busFrom.value = toValue;
    busTo.value = fromValue;
});

// Khởi tạo danh sách dropdown ban đầu
updateBusDropdownList(busFrom, busFromInput, busFromDropdownList, "");
updateBusDropdownList(busTo, busToInput, busToDropdownList, "");


// TRAIN ///
function updateTrainDropdownList(
    inputValue,
    inputElement,
    dropdownListElement,
    filter
) {
    dropdownListElement.innerHTML = "";
    const filteredCities = trainStations.filter((city) =>
        city.station_name.toLowerCase().includes(filter.toLowerCase())
    );
    filteredCities.forEach((city) => {
        const item = document.createElement("li");
        item.className = "custom-dropdown-item";
        item.innerHTML = `
                        <div class="custom-item-container">
                        <div class="custom-icon-section">
                            <i class="fa-solid fa-train-simple"></i>
                        </div>
                        <div class="custom-content-section">
                            <div class="custom-city-title"><b>${city.station_code} - ${city.station_name}</b></div>
                        </div>
                        </div>
                    `;
        item.addEventListener("mousedown", function (event) {
            event.preventDefault();
            inputElement.value = city.station_name;
            inputValue.value = city.station_code;
            dropdownListElement.parentElement.style.display = "none";
        });
        dropdownListElement.appendChild(item);
    });
}
function setupTrainInput(inputValue, inputElement, dropdownMenu, dropdownList) {
    inputElement?.addEventListener("focus", function () {
        dropdownMenu.style.display = "block";
        updateTrainDropdownList(
            inputValue,
            inputElement,
            dropdownList,
            inputElement.value
        );
    });

    inputElement?.addEventListener("blur", function () {
        setTimeout(function () {
            dropdownMenu.style.display = "none";
        }, 200);
    });

    inputElement?.addEventListener("input", function () {
        updateTrainDropdownList(
            inputValue,
            inputElement,
            dropdownList,
            inputElement.value
        );
    });

    inputElement?.addEventListener("click", function () {
        dropdownMenu.style.display = "block";
        updateTrainDropdownList(
            inputValue,
            inputElement,
            dropdownList,
            inputElement.value
        );
    });
}
$(document).on("mousedown", ".custom-dropdown-item", function () {
    $(this).closest(".train-dropdown-menu").hide();
});
// train Form
const trainFrom = document.getElementById("train_from");
const trainFromInput = document.getElementById("train_from_input");
const trainFromDropdownMenu = document.querySelector(
    ".custom-train-from-select-wrapper .train-dropdown-menu"
);
const trainFromDropdownList = document.getElementById("dropdown_list_train_from");
setupTrainInput(trainFrom, trainFromInput, trainFromDropdownMenu, trainFromDropdownList);
// train To
const trainTo = document.getElementById("train_to");
const trainToInput = document.getElementById("train_to_input");
const trainToDropdownMenu = document.querySelector(
    ".custom-train-to-select-wrapper .train-dropdown-menu"
);
const trainToDropdownList = document.getElementById("dropdown_list_train_to");
setupTrainInput(trainTo, trainToInput, trainToDropdownMenu, trainToDropdownList);
// Hoán đổi giá trị của hai ô nhập liệu
const trainSwapButton = document.getElementById("train_swap_button");
trainSwapButton.addEventListener("click", function () {
    const fromValue = trainFromInput.value;
    const toValue = trainToInput.value;
    const temp = fromValue

    busFromInput.value = toValue;
    busToInput.value = temp;

    trainFromInput.value = toValue;
    trainToInput.value = temp;

    train_select_from.setSelected(toValue, true);
    train_select_to.setSelected(fromValue, true);
    // Lưu lựa chọn sau khi hoán đổi
    saveSelections();

    //Hiden value
    const fromValHD = trainFrom.value;
    const toValHD = trainTo.value;
    trainFrom.value = toValHD;
    trainTo.value = fromValHD;
});

// Khởi tạo danh sách dropdown ban đầu
updateTrainDropdownList(trainFrom, trainFromInput, trainFromDropdownList, "");
updateTrainDropdownList(trainTo, trainToInput, trainToDropdownList, "");

// Config
const vn = {
    days: [
        "Chủ Nhật",
        "Thứ Hai",
        "Thứ Ba",
        "Thứ Tư",
        "Thứ Năm",
        "Thứ Sáu",
        "Thứ Bảy",
    ],
    daysShort: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
    daysMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
    months: [
        "Tháng Một",
        "Tháng Hai",
        "Tháng Ba",
        "Tháng Tư",
        "Tháng Năm",
        "Tháng Sáu",
        "Tháng Bảy",
        "Tháng Tám",
        "Tháng Chín",
        "Tháng Mười",
        "Tháng Mười Một",
        "Tháng Mười Hai",
    ],
    monthsShort: [
        "Th1",
        "Th2",
        "Th3",
        "Th4",
        "Th5",
        "Th6",
        "Th7",
        "Th8",
        "Th9",
        "Th10",
        "Th11",
        "Th12",
    ],
    today: "Hôm Nay",
    clear: "Bỏ chọn ngày về",
    dateFormat: "dd/mm/yyyy",
    timeFormat: "HH:ii",
    firstDay: 1,
};

function convertToSlug(text) {
    return text
        .toLowerCase()
        .replace(/á|à|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ă|ắ|ằ|ẳ|ẵ|ặ/g, "a")
        .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/g, "e")
        .replace(/i|í|ì|ỉ|ĩ|ị/g, "i")
        .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/g, "o")
        .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/g, "u")
        .replace(/ý|ỳ|ỷ|ỹ|ỵ/g, "y")
        .replace(/đ/g, "d")
        .replace(/[^a-z0-9\s]/g, "") // Loại bỏ các ký tự đặc biệt
        .replace(/\s+/g, "-") // Thay thế khoảng trắng bằng dấu gạch ngang
        .replace(/-+/g, "-"); // Loại bỏ các dấu gạch ngang thừa
}
function getFormattedDate(dayInput) {
    const today = dayInput ? new Date(dayInput) : new Date();
    const dayName = vn.daysShort[today.getDay()];
    const date = today.getDate();
    const month = today.getMonth() + 1;
    const year = today.getFullYear();
    const formattedDate = `${dayName}, ${date
        .toString()
        .padStart(2, "0")}/${month.toString().padStart(2, "0")}/${year}`;
    return formattedDate;
}

$(".date-input.date-default-input").attr("value", getFormattedDate(dateTo));
$(".date-input.date-default-input").attr("placeholder", getFormattedDate());
$(".date-input.data-add-input").attr("value",dateFrom != "" ? getFormattedDate(dateFrom) : "");
$(".date-input.data-add-input").attr("placeholder", "Thêm ngày về");

$(document).ready(function () {
    let startToDay = new Date();
    let dataSelected = dateTo ? dateTo : startToDay;
    let dataTrainSelected = dateToTrain ? dateToTrain : startToDay;

    new AirDatepicker(".date-default-train", {
        locale: vn,
        dateFormat: "E, dd/MM/yyyy",
        minDate: startToDay,
        autoClose: true,
        // isMobile: true,
        selectedDates: [dateToTrain ? dateToTrain : startToDay],
        onRenderCell: function ({ date, cellType }) {
            if (cellType === "day") {
                const lunarDate = moonTime({
                    year: date.getFullYear(),
                    month: date.getMonth() + 1,
                    day: date.getDate(),
                });
                return {
                    html: `
                        <div class="wrap-cell">
                            <div class="fw-bold">${date.getDate()}</div>
                            <div class="lunar-date">${lunarDate.day}</div>
                        </div>
                        <div class="price-cell">-</div>
                        `,
                };
            }
        },
        onSelect: function ({ date, formattedDate }) {
            const dayOfWeek = vn.daysShort[date?.getDay()];
            const formattedWithDay = `${dayOfWeek}, ${formattedDate}`;
            dataTrainSelected = date;
            $(this).val(formattedWithDay);

            localStorage.setItem('train_date_to', formattedDate);
        },
    });

    new AirDatepicker(".date-add-train", {
        locale: vn,
        dateFormat: "E, dd/MM/yyyy",
        autoClose: true,
        minDate: dataTrainSelected,
        buttons: ['clear'],
        // isMobile: true,
        onRenderCell: function ({ date, cellType }) {
            if (cellType === "day") {
                const lunarDate = moonTime({
                    year: date.getFullYear(),
                    month: date.getMonth() + 1,
                    day: date.getDate(),
                });
                return {
                    html: `
                        <div class="wrap-cell">
                            <div class="fw-bold">${date.getDate()}</div>
                            <div class="lunar-date">${lunarDate.day}</div>
                        </div>
                        <div class="price-cell">-</div>
                        `,
                };
            }
        },
        onSelect: function ({ date, formattedDate }) {
            const dayOfWeek = vn.daysShort[date?.getDay()];
            const formattedWithDay = `${dayOfWeek}, ${formattedDate}`;
            $(this).val(formattedWithDay);

            localStorage.setItem('train_date_from', formattedDate);
        },
    });

    new AirDatepicker(".date-default-input", {
        locale: vn,
        dateFormat: "E, dd/MM/yyyy",
        minDate: startToDay,
        autoClose: true,
        // isMobile: true,
        selectedDates: [dateTo ? dateTo : startToDay],
        onRenderCell: function ({ date, cellType }) {
            if (cellType === "day") {
                const lunarDate = moonTime({
                    year: date.getFullYear(),
                    month: date.getMonth() + 1,
                    day: date.getDate(),
                });
                return {
                    html: `
                        <div class="wrap-cell">
                            <div class="fw-bold">${date.getDate()}</div>
                            <div class="lunar-date">${lunarDate.day}</div>
                        </div>
                        `,
                };
            }
        },
        onSelect: function ({ date, formattedDate }) {
            const dayOfWeek = vn.daysShort[date?.getDay()];
            const formattedWithDay = `${dayOfWeek}, ${formattedDate}`;
            dataSelected = date;
            $(this).val(formattedWithDay);

            // set localStorage for date bus
            localStorage.setItem('bus_date_to', formattedDate);
        },
    });

    new AirDatepicker(".data-add-input", {
        locale: vn,
        dateFormat: "E, dd/MM/yyyy",
        autoClose: true,
        minDate: dataSelected,
        buttons: ['clear'],
        // isMobile: true,
        onRenderCell: function ({ date, cellType }) {
            if (cellType === "day") {
                const lunarDate = moonTime({
                    year: date.getFullYear(),
                    month: date.getMonth() + 1,
                    day: date.getDate(),
                });
                return {
                    html: `
                        <div class="wrap-cell">
                            <div class="fw-bold">${date.getDate()}</div>
                            <div class="lunar-date">${lunarDate.day}</div>
                        </div>
                        `,
                };
            }
        },
        onSelect: function ({ date, formattedDate }) {
            const dayOfWeek = vn.daysShort[date?.getDay()];
            const formattedWithDay = `${dayOfWeek}, ${formattedDate}`;
            $(this).val(formattedWithDay);
            localStorage.setItem('bus_date_from', formattedDate);
        },
    });
});

$("#bus_search").click(() => {
    var busTo = $("#bus_to").val();
    var busToPlace = $('#bus_to_input option:selected').attr('data-name');
    var busFrom = $("#bus_from").val();
    var busFromPlace = $('#bus_from_input option:selected').attr('data-name');
    var dateTo = $("#bus_date_to").val();
    var dateFrom = $("#bus_date_from").val();

    var data = {
        bus_from: busFrom,
        // busFromPlace,
        bus_to: busTo,
        // busToPlace,
        date_from: dateFrom,
        date_to: dateTo,
    };

    var url =
        "/route-search/xe-khach?q=" +
        convertToSlug(busFromPlace) +
        "-to-" +
        convertToSlug(busToPlace);
    var queryString = $.param(data);
    url += "&" + queryString;
    // localStorage.setItem("lastSearchURL", url);
    window.location.href = url;
    // let currentUrl = window.location.href; // Lấy URL hiện tại
    // let searchString = "/route-search/xe-khach"; // Chuỗi cần kiểm tra

    // if (!currentUrl.includes(searchString)) {
    //     // let url = searchString;
    //     window.location.href = url;
    // }
});
$("#train_search").click(() => {
    var trainTo = $("#train_to_input").val();
    var trainToPlace = $('#train_to_input option:selected').attr('data-name');
    var trainFrom = $("#train_from_input").val();
    var trainFromPlace = $('#train_from_input option:selected').attr('data-name');
    var dateTo = $("#train_date_to").val();
    var dateFrom = $("#train_date_from").val();

    var data = {
        train_from: trainFrom,
        train_to: trainTo,
        date_from: dateFrom,
        date_to: dateTo,
    };
    var url =
        "/route-search/tau-hoa?q=" +
        convertToSlug(trainFromPlace) +
        "-to-" +
        convertToSlug(trainToPlace);
    var queryString = $.param(data);
    url += "&" + queryString;
    window.location.href = url;
});
