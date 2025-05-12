$(document).ready(function () {
    // -------------- Xoá ------------
    setupModalEventHandlers('.deleteModal', 'deleteModal');

    // Kiểm tra sự tồn tại của phần tử trước khi gán sự kiện
    const deleteButton = $('#deleteModal').find('.delete-button');
    if (deleteButton.length) {
        deleteButton.on('click', delete_post);
    }

    // -------------- Chi tiết ------------
    setupModalEventHandlers('.detailModal', 'detailModal');

    $('.detailModal').each(function () {
        $(this).on('click', function () {
            const id = $(this).data('id');
            const detailModal = $('#detailModal');
            detailModal.removeClass('hidden');
            $.ajax({
                url: `/admin/blogs/show/${id}`,
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: displayPostDetails,
                
            });
        });
    });

    function displayPostDetails(data) {
        $('#modal-title').text(data.title);
        $('#authorName').text(data.author);
        $('#createdAt').text(data.created_at);
        $('#updatedAt').text(data.updated_at);
        $('#postContent').html(data.content);

        const postPicture = $('#postPicture');
        postPicture.attr('src', data.picture ? `${data.picture}` : '');
        const type = $('#modal-type');
        type.text(getType(data.type));
        const statusBadge = $('#statusBadge');
        statusBadge.html(getStatusButton(data.status));
    }

    function getStatusButton(status) {
        const statusMap = {
            'draft': 'badge badge-outline-warning',
            'published': 'badge badge-outline-success',
            'archived': 'badge badge-outline-danger'
        };
        return `<span class="${statusMap[status] || ''}">${getStatusText(status)}</span>`;
    }

    function getStatusText(status) {
        switch (status) {
            case 'draft': return 'Nháp';
            case 'published': return 'Công khai';
            case 'archived': return 'Ẩn';
            default: return '';
        }
    }

    function getType(type) {
        return `${getTypeText(type)}`;
    }

    function getTypeText(type) {
        switch (type) {
            case 'news': return 'Tin tức';
            case 'incentives': return 'Ưu đãi';
            case 'blog': return 'Thông báo';
            case 'vexeretip': return 'Vexere Tip';
            case 'relatedContent': return 'Nội dung liên quan';
            case 'new': return 'Loại bài viết mới';
            default: return '';
        }
    }
});

// Helper Functions

function closeDeleteModal(event) {
    toggleModal(event, 'deleteModal', true);
}

function closeDetailModal(event) {
    toggleModal(event, 'detailModal', true);
}

function setupModalEventHandlers(buttonSelector, modalId) {
    $(buttonSelector).each(function () {
        $(this).on('click', function () {
            const Id = $(this).data('id');
            const modal = $(`#${modalId}`);
            modal.data('Id', Id);
            modal.removeClass('hidden');
        });
    });

    $(`#${modalId}`).on('click', modalId === 'deleteModal' ? closeDeleteModal : closeDetailModal);
}

function toggleModal(event, modalId, isHidden) {
    if (!event || event.target.id === modalId) {
        $(`#${modalId}`).toggleClass('hidden', isHidden);
    }
}

function delete_post() {
    const Id = $('#deleteModal').data('Id');
    $.ajax({
        url: `/admin/blogs/destroy/${Id}`,
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            toastr.success(data.message);
            setTimeout(() => location.reload(), 1000);
        },
        error: function (error) {
            handleError(error);
        }
    });
}

function handleResponse(response) {
    if (!response.ok) {
        return response.json().then(errors => {
            for (let key in errors.errors) {
                toastr.error(errors.errors[key]);
            }
            throw new Error('Validation errors');
        });
    }
    return response.json();
}

function handleError(error) {
    console.error('Error:', error);
    toastr.error('Có lỗi xảy ra. Vui lòng kiểm tra lại console để biết thêm chi tiết.');
}