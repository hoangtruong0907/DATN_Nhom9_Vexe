$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Xử lý khi người dùng nhấn nút thêm số điện thoại
    $('#btn-phone-auth').on('click', function () {
        var phoneNumber = $('#add_phoneNumber').val().trim();
        var phoneCode = $('#add_phoneCode').val();
        var url = $(this).data('url');

        if (phoneNumber === '') {
            alert('Số điện thoại là bắt buộc.');
            return;
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                phone_number: phoneCode + phoneNumber,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.status === 'success') {
                    window.location.href = response.redirect;
                } else {
                    alert('Đã xảy ra lỗi: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                alert('Đã xảy ra lỗi: ' + error);
            }
        });
    });
});
