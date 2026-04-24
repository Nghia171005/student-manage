# Student Manager Plugin

Plugin WordPress quản lý sinh viên bằng Custom Post Type, Custom Meta Box và Shortcode.

## Chức năng

- Tạo Custom Post Type: Sinh viên
- Hỗ trợ Title dùng làm Họ tên sinh viên
- Hỗ trợ Editor dùng làm Tiểu sử/Ghi chú
- Thêm Meta Box gồm:
  - MSSV
  - Lớp/Chuyên ngành
  - Ngày sinh
- Lưu dữ liệu an toàn bằng Nonce và Sanitize
- Hiển thị danh sách sinh viên bằng shortcode

## Cấu trúc thư mục

```text
student-manager/
├── student-manager.php
├── includes/
│   ├── cpt-student.php
│   ├── meta-box-student.php
│   └── shortcode-student.php
├── assets/
│   └── style.css
├── screenshots/
│   ├── danh_sách_sinh_viên_ngoài_ Frontend.png
│   └── ảnh_nhập_sinh_viên_trong_admin.png
└── README.md
```

## Screenshots

### Nhập sinh viên trong trang quản trị

![Nhập sinh viên trong admin](<./screenshots/ảnh_nhập_sinh_viên_trong_admin.png>)

### Danh sách sinh viên ngoài frontend

![Danh sách sinh viên ngoài frontend](<./screenshots/danh_sách_sinh_viên_ngoài_ Frontend.png>)
