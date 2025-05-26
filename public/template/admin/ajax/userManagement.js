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
            url: "/admin/user/store",
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
                        onHidden: function() {
                            location.reload();
                        },
                        onCloseClick: function() {
                            location.reload();
                        },
                        timeOut: 1000,
                        extendedTimeOut: 1000
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
    $(".editUser").on("click", function () {
        const userId = $(this).data("id");
        openEditUserModal(userId);
    });

    $("#userForm_edit").on("submit", function (event) {
        event.preventDefault();
        const userId = $("#userId_edit").val();
        const formData = {
            name: $("#name_edit").val(),
            email: $("#email_edit").val(),
            phone: $("#phone_edit").val(),
            status: $("#status_edit").val(),
            role: $("#role_edit").val(),
        };

        $.ajax({
            url: `/admin/users/${userId}`,
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: JSON.stringify(formData),
            success: function (data) {
                if (data.success) {
                    toastr.options = {
                        onHidden: function() {
                            location.reload();
                        },
                        onCloseClick: function() {
                            location.reload();
                        },
                        timeOut: 1000,
                        extendedTimeOut: 1000
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

function openEditUserModal(userId) {
    $("#editUserModal").removeClass("hidden");
    $.ajax({
        url: `/admin/users/edit/${userId}`,
        method: "GET",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            if (data.success) {
                $("#userId_edit").val(data.user.id);
                $("#name_edit").val(data.user.name);
                $("#email_edit").val(data.user.email);
                $("#phone_edit").val(data.user.phone);
                $("#status_edit").val(data.user.status);
                $("#role_edit").val(data.user.role);
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
                    onHidden: function() {
                        location.reload();
                    },
                    onCloseClick: function() {
                        location.reload();
                    },
                    timeOut: 1000,
                    extendedTimeOut: 1000
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
