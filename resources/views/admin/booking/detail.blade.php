@extends('admin.layouts.app')

@section('title', ' Booking Management')
@section('contents')
    <div class="container mt-5">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl">{{ $title }}</h2>

        </div>
        <div class="panel mt-5 overflow-hidden border-0 p-0">
            <div class="table-responsive">
                <table class="table-striped table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Order_Code</th>
                            {{-- <th>Trip_Code</th> --}}

                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>seats</th>
                            <th>booking_code</th>
                            <th>code</th>
                            <th>pickup_id</th>
                            <th>tickets</th>

                            <th>   drop_off_info</th>
                            {{-- <th class="text-nowrap">Ngày cập nhật</th> --}}
                            <th class="!text-center">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    <div class="flex w-max items-center">
                                        <div class="flex-none mr-3">
                                            <div class="p-1 bg-white-dark/30 rounded-full"><img
                                                    class="h-8 w-8 rounded-full object-cover"
                                                    src="{{ asset('/template/admin/assets/images/user-profile.jpeg') }}" />
                                            </div>
                                        </div>
                                        <div>
                                            {{ $user->customer_name }}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->order_code }}</td>
                                {{-- <td>{{ $user->trip_code }}</td> --}}
                                <td>{{ $user->customer_email }}</td>
                                <td>{{ $user->customer_phone }}</td>
                                <td>{{ $user->seats }}</td>
                                <td>{{ $user->booking_code }}</td>
                                <td>{{ $user->code }}</td>
                                <td>{{ $user->pickup_id }}</td>
                                <td>{{ $user->tickets }}</td>
                                <td>{{ $user->drop_off_info }}</td>
                               <td class="text-end">
                                    <div class="flex items-center justify-center gap-4">
                                        <button class="btn btn-sm btn-outline-primary text-nowrap editUser"
                                            data-id="{{ $user->id }}">Chỉnh Sửa</button>
                                        <button class="btn btn-sm btn-outline-danger deleteUser text-nowrap"  onclick="window.location.href='{{ route('admin.booking.detail', ['id' => $user->booking_code]) }}'"
                                            data-id="{{ $user->booking_code }}" > Chi tiết</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script src="{{ asset('/template/admin/ajax/bookingManagement.js') }}"></script>
@endsection
