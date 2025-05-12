@extends('admin.layouts.app')

@section('title', ' User Management')
@section('contents')
    <div class="container mt-5">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl">{{ $title }}</h2>
            <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary add-user-modal">
                            <img src="{{ asset('/template/admin/assets/images/icons/ic_add.svg') }} " alt="Icon">
                            Thêm người dùng
                        </button>
                    </div>
                </div> 
                <div class="relative">
                    <input type="text" placeholder="Tìm kiếm người dùng" class="peer form-input py-2 ltr:pr-11 rtl:pl-11">
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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <th class="text-nowrap">Ngày cập nhật</th>
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
                                            {{ $user->name }}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ($user->role == 2)
                                        <p class="text-nowrap">Quản trị viên</p>
                                    @elseif($user->role == 1)
                                    <p class="text-nowrap">Người dùng</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->status == '1')
                                        <span class="badge bg-success text-nowrap">Kích hoạt</span>
                                    @else
                                        <span class="badge bg-danger text-nowrap">Khoá</span>
                                    @endif
                                </td>
                                <td class="text-nowrap">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y-H:i') }}</td>
                                <td class="text-end">
                                    <div class="flex items-center justify-center gap-4">
                                        <button class="btn btn-sm btn-outline-primary text-nowrap editUser"
                                            data-id="{{ $user->id }}">Chỉnh Sửa</button>
                                        <button class="btn btn-sm btn-outline-danger deleteUser"
                                            data-id="{{ $user->id }}"> Xoá</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
                            <label for="name">Tên</label>
                            <input id="name" type="text" placeholder="Nhập tên" class="form-input">
                        </div>
                        <div class="mb-5 grid grid-cols-2 gap-4">
                            <div>
                                <label for="email">Email</label>
                                <input id="email" type="text" placeholder="Nhập địa chỉ email" class="form-input">
                            </div>
                            <div>
                                <label for="phone">Số điện thoại</label>
                                <input id="phone" type="text" placeholder="Nhập số điện thoại" class="form-input">
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="password">Mật khẩu</label>
                            <input id="password" type="password" placeholder="Nhập mật khẩu" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="password_c">Nhập lại mật khẩu</label>
                            <input id="password_c" type="password" placeholder="Nhập lại mật khẩu" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="status">Trạng thái</label>
                            <select id="status" class="form-input">
                                <option value="">chọn trạng thái</option>
                                <option value="1">Hoạt động</option>
                                <option value="2">Khoá</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="role">Quyền hạn</label>
                            <select id="role" class="form-input">
                                <option value="">chọn quyền hạn </option>
                                <option value="1">Người dùng</option>
                                <option value="2">Quản trị</option>
                            </select>
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
                <h3 class="text-lg font-medium text-center mb-4">Chỉnh sửa người dùng
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
                            <label for="name_edit">Tên</label>
                            <input id="name_edit" type="text" placeholder="Nhập tên" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="email_edit">Email</label>
                            <input id="email_edit" type="text" placeholder="Nhập địa chỉ email" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="phone_edit">Số điện thoại</label>
                            <input id="phone_edit" type="text" placeholder="Nhập số điện thoại" class="form-input">
                        </div>
                        <div class="mb-5">
                            <label for="status_edit">Trạng thái</label>
                            <select id="status_edit" class="form-input">
                                <option value="1">Hoạt động</option>
                                <option value="2">Khoá</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="role_edit">Quyền hạn</label>
                            <select id="role_edit" class="form-input">
                                <option value="1">Người dùng</option>
                                <option value="2">Quản trị</option>
                            </select>
                        </div>
                        <!-- Action Buttons -->
                        <div class="mt-8 flex items-center justify-end">
                            <button type="button" class="btn btn-outline-danger" onclick="closeModalEdit()">Hủy</button>
                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">Cập
                                nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Xóa Người dùng -->
    <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4" id="deleteUserModal"
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
                    Xoá người dùng
                </div>
                <div class="p-5 text-center">
                    <div class="mx-auto w-fit rounded-full bg-danger p-4 text-white ring-4 ring-danger/30">
                        <img src="{{ asset('/template/admin/assets/images/icons/ic_delete.svg') }} " alt="Icon">
                    </div>
                    <div class="mx-auto mt-5 sm:w-3/4">Bạn có chắc chắn muốn xóa người dùng này không?</div>
                    <!-- Action Buttons -->
                    <div class="mt-8 flex items-center justify-center">
                        <button type="button" class="btn btn-outline-danger" onclick="closeDeleteModal()">Huỷ</button>
                        <button type="button" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                            onclick="deleteUser()">Xoá</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
@section('scripts')
    <script src="{{ asset('/template/admin/ajax/userManagement.js') }}"></script>  
@endsection
