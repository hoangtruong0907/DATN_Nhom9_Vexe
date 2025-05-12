$(document).ready(function () {
    // -------------- Thêm ------------
    $(".add-user-modal").on("click", function () {
        $("#addUserModal").removeClass("hidden");
        $("#userForm_add")[0].reset();
    });

    $("#userForm_add").on("submit", function (event) {
        event.preventDefault();
        const formData = {
            name: $("#name").val(),
            email: $("#email").val(),
            phone: $("#phone").val(),
            password: $("#password").val(),
            password_c: $("#password_c").val(),
            status: $("#status").val(),
            role: $("#role").val(),
        };

        $.ajax({
            url: "/admin/users/store",
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: JSON.stringify(formData),
            success: function (data) {
                console.log(data);
                if (data.success) {
                    toastr.options = {
                        onHidden: function () {
                            location.reload();
                        },
                        onCloseClick: function () {
                            location.reload();
                        },
                        timeOut: 1000,
                        extendedTimeOut: 1000,
                    };
                    toastr.success(data.message);
                } else {
                    toastr.error(data.error);
                }
            },
            error: function (jqXHR) {
                const errors = jqXHR.responseJSON.errors;
                for (let key in errors) {
                    toastr.error(errors[key]);
                }
            },
        });
    });

    // -------------- Sửa ------------
    $(document).on("click", ".editUser", function () {
        const userId = $(this).data("id");
        openEditUserModal(userId);
    });

    $("#userForm_edit").on("submit", function (event) {
        event.preventDefault();

        const userId = $("#userId_edit").val();
        const formData = {
            name: $("#name_e").val(),
            email: $("#email_e").val(),
            phone: $("#phone_e").val(),
            seats: $("#seats_e").val(),
            code: $("#code_e").val(),

            booking_code: $("#booking_code_e").val(),
            ticket: $("#ticket_e").val(),
            price: $("#price_e").val(),
            pickup_id: $("#pickup_id_e").val(),

            droff_off_info: $("#droff_off_info_e").val(),
            droff_off_point_id: $("#droff_off_point_id_e").val(),
            status: $("#status_e").val(),
        };

        $.ajax({
            url: `/admin/booking/update/${userId}`,
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: JSON.stringify(formData),
            success: function (data) {
                if (data.success) {
                    closeModalEdit();
                    dataTables.ajax.reload(() => {
                        dataTables.draw();
                    });
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            },
            error: function (jqXHR) {
                const errors = jqXHR.responseJSON.errors;
                for (let key in errors) {
                    toastr.error(errors[key]);
                }
            },
        });
    });

    // -------------- Xoá ------------
    $(".deleteUser").on("click", function () {
        const userId = $(this).data("id");
        $("#deleteUserModal").data("userId", userId).removeClass("hidden");
    });
});
// -------------- Hàm ------------
function closeModalAdd(event) {
    if (event) {
        if (event.target === event.currentTarget) {
            $("#addUserModal").addClass("hidden");
        }
    } else {
        $("#addUserModal").addClass("hidden");
    }
}

function closeModalEdit(event) {
    if (event && event.target.id === "editUserModal") {
        $("#editUserModal").addClass("hidden");
    } else if (!event) {
        $("#editUserModal").addClass("hidden");
    }
}

function closeDeleteModal(event) {
    if (!event || event.target.id === "deleteUserModal") {
        $("#deleteUserModal").addClass("hidden");
    }
}

function openEditUserModal(Id) {
    $("#editUserModal").removeClass("hidden");
    $("#userId_edit").val(Id);
    $.ajax({
        url: `/admin/booking/edit/${Id}`,
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            if (data.success) {
                $("#name_e").val(data.user.customer_name);
                $("#email_e").val(data.user.customer_email);
                $("#phone_e").val(data.user.customer_phone);
                $("#seats_e").val(data.user.seats);
                $("#code_e").val(data.user.code);
                $("#booking_code_e").val(data.user.booking_code);
                $("#ticket_e").val(data.user.tickets);
                $("#price_e").val(data.user.price);
                $("#pickup_id_e").val(data.user.pickup_id);
                $("#droff_off_info_e").val(data.user.drop_off_info);
                $("#droff_off_point_id_e").val(data.user.drop_off_point_id);

                if (data.user.status == 4 || data.user.status == 5) { // disabled khi status là cancel và đã hoàn thành 
                    $("#status_e").attr("disabled", true);
                } else {
                    $("#status_e").attr("disabled", false);
                }
                $("#status_e").val(data.user.status);
            } else {
                toastr.error("Không thể tải dữ liệu người dùng.");
            }
        },
        error: function () {
            toastr.error("Có lỗi xảy ra khi tải dữ liệu người dùng.");
        },
    });
}

function deleteUser() {
    const userId = $("#deleteUserModal").data("userId");
    $.ajax({
        url: `/admin/users/delete/${userId}`,
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            if (data.success) {
                toastr.options = {
                    onHidden: function () {
                        location.reload();
                    },
                    onCloseClick: function () {
                        location.reload();
                    },
                    timeOut: 1000,
                    extendedTimeOut: 1000,
                };
                toastr.success(data.message);
            } else {
                toastr.error(data.error || "Có lỗi xảy ra khi xóa dữ liệu.");
            }
        },
        error: function (jqXHR) {
            const errors = jqXHR.responseJSON.errors;
            for (let key in errors) {
                toastr.error(errors[key]);
            }
        },
    });
}
