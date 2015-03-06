# Create Timetable for Student UET

Fries gồm các thành viên: Trần Văn Tú, Trần Minh Quý, Bùi Minh Thái, Nguyễn Tiến Minh, Nguyễn Văn Thành.
Giáo viên hướng dẫn: Trương Anh Hoàng.

Demo Online: [12a1pro.info](http://12a1pro.info)

![Version 1.0](https://cloud.githubusercontent.com/assets/7255177/6105580/4a973aa8-b08b-11e4-9aae-d0e00d9e6a27.jpg)

***
## Mô tả:
Phần mềm giúp hỗ trợ sinh viên lập **thời khóa biểu** hợp lý trước mỗi khi đăng ký môn học của mỗi kì.
* Hỗ trợ tìm môn học
* Tạo thời khóa biểu hợp lý theo ý muốn
* Tối ưu thời gian của lịch học
* ..................

## Công nghệ
* HTML5
* CSS (Bootstrap)
* Javascript ([Jquery](//jquery.com))
* PHP & MySQL


## thanhnv_58 chú thích: 
* các file up lên : 
	+ config.php : lưu thông tin database dùng đê connect
	+ dbconnect.php : dùng để connecting database
	+ form_nhap_db.php : dùng để lấy thông tin 
	+ save_data.php : lưu thông tin lấy ở form_nhap_db.php vào database
	+ getSubject.php : truy xuất data từ database theo yêu cầu của Tú Trần
* khi các bạn sử dụng cần chạy form_nhap_db.php trước để lưu thông tin vô database
* nếu cần dữ liệu thì chạy getSubject.php (ok)	