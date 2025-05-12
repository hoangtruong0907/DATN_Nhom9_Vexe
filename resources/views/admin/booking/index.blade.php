@extends('admin.layouts.app')

@section('title', ' Booking Management')
@section('contents')
    <div class="container mt-5">
        <div class="flex flex-wrap items-center justify-between gap-4">
        </div>
        <div class="panel mt-5 overflow-hidden border-0 p-4">
            <div class="flex" style="justify-content: space-between"><h2 class="text-xl fw-bold">{{ $title }}</h2><button class="restart_table" style="transition: transform 0.5s"><img src="{{ asset('/template/admin/assets/images/icons/ic_restart.svg') }}" alt="Icon"></button></div>
            <div class="table-responsive">
                <table class="table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Order_Code</th>
                            <th>Mã đặt chỗ</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Giá tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Render data in here --}}
                    </tbody>
                </table>
            </div>

        </div>
        <div class="panel mt-5 overflow-hidden border-0 p-4">
            <div class="w-full text-center"><h2 class="fw-bold text-xl">Bảng giao dịch gần đây</h2></div>
            <div class="table-responsive mt-2">
                <table class="table-striped table-hover" id="table_transaction">
                    <thead>
                        <tr>
                            <th>Order_Code</th>
                            <th>Số tiền</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Render data in here --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal thêm người dùng --}}
    <div class="fixed inset-0 z-50 hidden bg-black/60 overflow-y-auto" id="addUserModal">
        <div class="flex items-center justify-center min-h-screen px-4" onclick="closeModalAdd(event)">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
                <!-- Modal Header -->
                <h3 class="text-lg font-medium text-center mb-4">Thêm người dùng</h3>
                <button type="button" class="absolute top-4 right-4 text-gray-600 hover:text-black"
                    onclick="closeModalAdd()">
                    <img src="{{ asset('/template/admin/assets/images/icons/ic_close.svg') }} " alt="Icon">
                </button>
                <!-- Modal Add -->
                <div>
                    <form id="userForm_add">
                        @csrf
                        <div class="mb-5">
                            <label for="name">Customer Name</label>
                            <input id="name" type="text" placeholder="Nhập tên" class="form-input">
                        </div>
                        <div class="mb-5 grid grid-cols-2 gap-4">
                            <div>
                                <label for="email">Customer Email</label>
                                <input id="email" type="text" placeholder="Nhập địa chỉ email" class="form-input">
                            </div>
                            <div>
                                <label for="phone">Customer Phone</label>
                                <input id="phone" type="text" placeholder="Nhập số điện thoại" class="form-input">
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="seats">Seats</label>
                            <input id="seats" type="text" placeholder="Nhập Seat" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="code">Code</label>
                            <input id="code" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="booking_code">Booking Code</label>
                            <input id="booking_code" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="ticket">Ticket</label>
                            <input id="ticket" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="price">Price</label>
                            <input id="price" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="pickup_id">Pickup Id</label>
                            <input id="pickup_id" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="droff_off_info">Drop Off Info</label>
                            <input id="droff_off_info" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="droff_off_point_id">Drop Off Point </label>
                            <input id="droff_off_point_id" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="status">Status </label>
                            <input id="status" type="text" placeholder="Nhập code" class="form-input">
                        </div>


                        <!-- Action Buttons -->
                        <div class="mt-8 flex items-center justify-end">
                            <button type="button" class="btn btn-outline-danger" onclick="closeModalAdd()">Hủy
                            </button>
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal chỉnh sửa người dùng -->
    <div class="fixed inset-0 z-50 hidden bg-black/60 overflow-y-auto" id="editUserModal"
        onclick="closeModalEdit(event)">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative" onclick="event.stopPropagation()">
                <!-- Modal Header -->
                <h3 class="text-lg font-medium text-center mb-4">Chỉnh sửa Booking người dùng
                </h3>
                <button type="button" class="absolute top-4 right-4 text-gray-600 hover:text-black"
                    onclick="closeModalEdit()">
                    <img src="{{ asset('/template/admin/assets/images/icons/ic_close.svg') }} " alt="Icon">
                </button>
                <!-- Modal Form -->
                <div>
                    <form id="userForm_edit">
                        @csrf
                        <input type="hidden" id="userId_edit">
                        <div class="mb-5">
                            <label for="name_e">Customer Name</label>
                            <input id="name_e" type="text" placeholder="Nhập tên" class="form-input">
                        </div>
                        <div class="mb-5 grid grid-cols-2 gap-4">
                            <div>
                                <label for="email_e">Customer Email</label>
                                <input id="email_e" type="text" placeholder="Nhập địa chỉ email" class="form-input">
                            </div>
                            <div>
                                <label for="phone_e">Customer Phone</label>
                                <input id="phone_e" type="text" placeholder="Nhập số điện thoại" class="form-input">
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="seats_e">Seats</label>
                            <input id="seats_e" type="text" placeholder="Nhập Seat" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="code_e">Code</label>
                            <input id="code_e" type="text" placeholder="Nhập code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="booking_code_e">Booking Code</label>
                            <input id="booking_code_e" type="text" placeholder="Nhập booking code" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="ticket_e">Ticket</label>
                            <input id="ticket_e" type="text" placeholder="Nhập ticket" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="price_e">Price</label>
                            <input id="price_e" type="text" placeholder="Nhập price" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="pickup_id_e">Pickup Id</label>
                            <input id="pickup_id_e" type="text" placeholder="Nhập pickup id" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="droff_off_info_e">Drop Off Info</label>
                            <input id="droff_off_info_e" type="text" placeholder="Nhập drop off info" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="droff_off_point_id_e">Drop Off Point </label>
                            <input id="droff_off_point_id_e" type="text" placeholder="Nhập Drop Off Point" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="status_e">Status </label>
                            <select name="status_e" id="status_e" class="form-input">
                                <option value="1">Chưa chuyển</option>
                                <option value="2">Đợi thanh toán</option>
                                <option value="3">Hoàn vé</option>
                                <option value="4">Hoàn thành</option>
                                <option value="5">Đã hủy</option>
                              </select>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-8 flex items-center justify-end">
                            <button type="button" class="btn btn-outline-danger" onclick="closeModalEdit()">Hủy</button>
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        var resultData;

        const dataTables = $('#dataTables-example').DataTable({
            ajax: ({
                url: "/admin/booking/get-data-table",
                type: 'GET',
            }),
            columns: [
                { data: 'order_code' },
                { data: 'booking_code' },
                { data: 'customer_name' },
                { data: 'customer_email' },
                { data: 'customer_phone' },
                {
                    data: 'price',
                    render: function(data, type) {
                        if (type === 'display' || type === 'filter') {
                            return formatCurrency(data); // Hiển thị giá theo định dạng VND
                        } else {
                            return data; // Sắp xếp theo giá trị gốc
                        }
                    }
                },
                {
                    data: 'status',
                    render: function(data) {
                        switch(data) {
                            case 1: return '<span class="badge bg-info">Chưa chuyển</span>';
                            case 2: return '<span class="badge bg-warning">Đợi thanh toán</span>';
                            case 3: return '<span class="badge bg-secondary">Hoàn vé</span>';
                            case 4: return '<span class="badge bg-success">Hoàn thành</span>';
                            case 5: return '<span class="badge bg-dark">Đã hủy</span>';
                            default: return '<span class="badge bg-secondary">Unknown</span>';
                        }
                    }
                },
                {
                    data: 'created_at',
                    render: function (data, type) {
                        if (type === 'display' || type === 'filter') {
                            return formatDate(data);
                        } else {
                            return new Date(data).getTime();
                        }
                    }
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        return `<div class="flex items-center justify-center gap-2">
                                <button class="btn btn-sm btn-outline-primary text-nowrap editUser"
                                    data-id="${data.id}">Chỉnh Sửa</button>
                                <button class="btn btn-sm btn-outline-success text-nowrap" onclick="window.location.href='/admin/booking/${row.booking_code}'"
                                    data-id="${data.id}" >Chi tiết</button>
                            </div>`;
                    }
                },
            ],
            order: [[7, 'desc']], // Sắp xếp mặc định theo cột ngày tạo giảm dần
        });

        function formatDate(input) {
            const date = new Date(input);
            return `${String(date.getHours()).padStart(2, '0')}:${String(date.getMinutes()).padStart(2, '0')} - ${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()}`;
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
        }
        
        // -------------------
        const dataTransactionTables = $('#table_transaction').DataTable({
            ajax: ({
                url: "{{route('admin.booking.dataTransactionTable')}}",
                type: 'GET',
            }),
            columns: [
                { data: 'memo' },
                { data: 'money' },
                { data: 'date' },
            ],
            ordering: false // Tắt chức năng sắp xếp mặc định
        });

        let rotation = 0; // Biến để lưu góc xoay hiện tại
        $('.restart_table').on('click', function() {
            dataTables.ajax.reload(() => {
                dataTables.draw();
            });

            dataTransactionTables.ajax.reload(() => {
                dataTables.draw();
            });

            rotation += 360; // Tăng góc xoay thêm 360 độ
            $(this).css('transform', `rotate(${rotation}deg)`);
        })
    </script>
    <script src="{{ asset('/template/admin/ajax/bookingManagement.js') }}"></script>
@endsection
