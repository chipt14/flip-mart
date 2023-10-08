$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc không?',
            text: "Xóa dữ liệu này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Tập tin của bạn đã bị xóa.',
                    'success'
                )
            }
        })
    });
});

// Confirm
$(function () {
    $(document).on('click', '#confirm', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc chắn xác nhận?',
            text: "Sau khi xác nhận, bạn sẽ không thể chờ xử lý nữa",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Xác nhận!',
                    'Xác nhận thay đổi',
                    'success'
                )
            }
        })
    });
});

// processing
$(function () {
    $(document).on('click', '#processing', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc chắn xử lý?',
            text: "Sau khi xử lý, bạn sẽ không thể chờ xử lý nữa",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Xử lý',
                    'Xác nhận xử lý',
                    'success'
                )
            }
        })
    });
});

//picked
$(function () {
    $(document).on('click', '#picked', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Xác nhận đóng hàng?',
            text: "Sau khi đóng hàng, không thể xử lý",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Đóng hàng',
                    'Xác nhận đóng hàng',
                    'success'
                )
            }
        })
    });
});

// shipped
$(function () {
    $(document).on('click', '#shipped', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Chắc chắn gửi hàng?',
            text: "Không thể quay lại",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Vận chuyển thành công!',
                    'Xác nhận',
                    'success'
                )
            }
        })
    });
});

//delivered
$(function () {
    $(document).on('click', '#delivered', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Giao hàng thành công?',
            text: "Không thể quay lại",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Giao thành công!',
                    'Xác nhận',
                    'success'
                )
            }
        })
    });
});