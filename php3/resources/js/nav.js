// Xử lý Dropdown trên Mobile
const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
    dropdown.addEventListener('click', function(e) {
        // Chỉ áp dụng logic click xổ xuống cho màn hình nhỏ
        if (window.innerWidth <= 768) {
            // Nếu click vào nút Dịch vụ hoặc mũi tên
            if (e.target.classList.contains('dropbtn') || e.target.classList.contains('arrow')) {
                e.preventDefault(); // Ngăn chặn chuyển trang
                this.classList.toggle('active'); // Mở/đóng menu con
            }
        }
    });
});