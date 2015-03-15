## thanhnv_58 chú thích:
* các file up lên :
	+ config.php : lưu thông tin database dùng đê connect
	+ dbconnect.php : dùng để connect database
	+ form_nhap_db.php : dùng để lấy thông tin
	+ save_data.php : lưu thông tin lấy ở form_nhap_db.php vào database
	+ getSubject.php : truy xuất data từ database
* khi các bạn sử dụng cần chạy form_nhap_db.php trước để lưu thông tin vô database
* nếu cần dữ liệu thì chạy getSubject.php (ok)
// minhnt_58 chú thích:
* trước khi chạy các file .php thì cần import file .sql ở thư mục MySQL vào database!
## thanhnv_58 chú thích:
* các file up lên : 
	+ get_data_user.php trong file này mình định nghĩa 1 hàm get_data_user($user, $pass)
		có thể truy xuất thông tin từ database;
	+ check_data_user.php có nhiệm vụ kiểm tra xem thông tin user và pass có đúng ko
	+ check_session.php có nhiệm vụ KT xem session đc tạo ra hay chưa mục đích là bảo 
		vệ thông tin trang chủ nếu chưa đăng xuất
