// custom.js

// Pastikan Anda telah menyertakan SweetAlert dalam proyek Laravel Anda.

document.addEventListener("DOMContentLoaded", function () {
    // Periksa apakah ada pesan success dari session
    const successMessage = "{{ session('success') }}";

    if (successMessage) {
        Swal.fire({
            title: "Success!",
            text: successMessage,
            icon: "success",
            confirmButtonText: "OK",
        });
    }
});
