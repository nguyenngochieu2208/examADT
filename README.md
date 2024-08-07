<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cách chạy code
1. Bước 1: Tải Xampp version: 8.2.12 / PHP 8.2.12 về máy với đường link: https://www.apachefriends.org/download.html.
2. Bước 2: Tải Composer về máy với đường link: https://getcomposer.org/download/.
3. Bước 3: CD tới thư mục vừa clone code, chạy lệnh " composer install " để cài đặt các package của laravel.
4. Bước 4: Sau khi cài đặt xong, chạy các lệnh sau:
- cp .env.example .env
- php artisan key:generate
- touch database/database.sqlite
- php artisan migrate
- php artisan db:seed
5. Bước 5: Sau khi chạy xong các lệnh trên, chạy lệnh " php artisan serve ", sau đó mở đường link được hiển thị phía dưới để xem trang web.

## Công nghệ sử dụng
Trong bài test lần này em đã sử dụng Laravel với mô hình MVC để thực hiện việc lấy access_token, call api từ Bitrix24 để lấy danh sách nhân viên.
Các phần code chính:
- Route: cấu hình các route để gọi đến controller (routes/web.php).
- Controller : xây dựng các chức năng để trả về view, data cho client, call api và xử lý dữ liệu,.. (app/Http/Controllers)
- View: được dây dựng dưới dạng các file blade của laravel giúp xây dựng và hiển thị dữ liệu với HTML,CSS (resources/views).
- Ngoài ra em còn sử dụng Bootstrap để xây dựng giao diện, jQuery để xử lý các sự kiện với giao diện, call api tới controller để lấy dữ liệu hiển thị (chức năng làm mới danh sách, xem chi tiết nhân viên, hightlight tên).




