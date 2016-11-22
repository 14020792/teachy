SET FOREIGN_KEY_CHECKS=0;

DELETE FROM `instructor`;
DELETE FROM `subject`;
DELETE FROM `criterion`;
DELETE FROM `user` WHERE `username` = 'hainh';
DELETE FROM `instructor_subject`;
DELETE FROM `assessment`;

INSERT INTO `instructor`(id, name, email, code, avatar) VALUES
(1, 'TS. Bùi Quang Hưng', 'hungbq@uet.vnu.vn', '001', '/img/instructors/1/01.jpg')
, (2, 'PGS.TS. Nguyễn Hà Nam', 'namnh@uet.vnu.vn', '002', '/img/instructors/1/01.jpg')
, (3, 'PGS.TS. Nguyễn Hải Châu', 'chaunh@uet.vnu.vn', '003', '/img/instructors/1/01.jpg')
, (4, 'PGS.TS. Hà Quang Thụy', 'thuyhq@uet.vnu.vn', '005', '/img/instructors/1/01.jpg')
, (5, 'TS. Phan Xuân Hiếu', 'hieupx@uet.vnu.vn', '006', '/img/instructors/1/01.jpg')
, (6, 'TS. Đặng Văn Hưng', 'hungdv@uet.vnu.vn', '009', '/img/instructors/1/01.jpg')
, (7, 'TS. Nguyễn Thị Huyền Châu', 'chaunth@uet.vnu.vn', '010', '/img/instructors/1/01.jpg')
, (8, 'PGS.TS. Nguyễn Ngọc Bình', 'binhnn@uet.vnu.vn', '011', '/img/instructors/1/01.jpg')
, (9, 'TS. Đặng Đức Hạnh', 'hanhdd@uet.vnu.vn', '012', '/img/instructors/1/01.jpg');

INSERT INTO `subject`(id, name, code) VALUES
(1, 'Quản lý dự án Hệ thống thông tin', 'INT 6124')
, (2, 'Kho dữ liệu và tri thức kinh doanh', 'INT 6133')
, (3, 'Tính toán hiệu năng cao', 'INT 6144')
, (4, 'Chủ đề hiện đại về Hệ thống thông tin', 'INT 6023')
, (5, 'Khai phá dữ liệu', 'INT 6123')
, (6, 'Các vấn đề hiện đại về công nghệ phần mềm', 'INT 6030')
, (7, 'Phân tích thiết kế hệ thống nâng cao', 'INT 6169');

INSERT INTO `instructor_subject`(instructor_id, subject_id) VALUES
(1, 1), (2, 2), (3, 3), (3, 4), (4, 5), (5, 5), (6, 6), (7, 6), (8, 6), (9, 7);

INSERT INTO `criterion`(id, text) VALUES
(1, 'GV cung cấp đầy đủ thông tin về đề cương học phần, lịch trình giảng dạy, phương pháp đánh giá')
, (2, 'GV hướng dẫn phương pháp học tập trong quá trình học tập')
, (3, 'GV tạo cơ hội cho sinh viên tích cực tham gia vào các hoạt động học tập'), (4, 'GV giúp sinh viên phát triển một số kỹ năng mềm cơ bản (giao tiếp, thuyết trình, làm việc nhóm/làm việc độc lập, giải quyết vấn đề...)')
, (5, 'GV giúp sinh viên phát triển các kỹ năng tư duy (phê phán, sáng tạo, logic)')
, (6, 'GV quan tâm đến các vấn đề học tập của sinh viên')
, (7, 'GV có phương pháp chuyển tải rõ ràng, dễ hiểu')
, (8, 'GV thực hiện đủ thời lượng, nội dung của học phần theo kế hoạch,  đề cương học phần')
, (9, 'GV sử dụng hiệu quả các phương tiện, thiết bị dạy học')
, (10, 'GV lên lớp đúng giờ quy định')
, (11, 'Nội dung học phần đáp ứng các mục tiêu kiến thức, kĩ năng và thái độ')
, (12, 'Nội dung học phần cân đối, logic')
, (13, 'Nội dung học phần được cập nhật')
, (14, 'Nội dung học phần có đóng góp trang bị kiến thức, kỹ năng nghề nghiệp cho sinh viên')
, (15, 'Các tài liệu phục vụ học tập đầy đủ, cập nhật')
, (16, 'Phương pháp kiểm tra đánh giá phù hợp với nội dung học phần và phương pháp giảng dạy')
, (17, 'Phương pháp kiểm tra đánh giá đánh giá được mức độ đạt kiến thức, kỹ năng của sinh viên')
, (18, 'Kết quả kiểm tra đánh giá khách quan và chính xác')
, (19, 'Kết quả kiểm đánh giá được công bố đúng thời hạn quy định')
, (20, 'Thông tin phản hồi từ kết quả kiểm tra đánh giá giúp sinh viên cải thiện kết quả học tập')
, (21, 'Giảng đường/phòng học đáp ứng yêu cầu giảng dạy và học tập')
, (22, 'Trang thiết bị tại giảng đường  đáp ứng tốt yêu cầu giảng dạy và học tập')
, (23, 'Điều kiện cơ sở vật chất đáp ứng hoạt động tự học của sinh viên')
, (24, 'Trang thiết bị phòng thí nghiệm (thực hành) đáp ứng yêu cầu học tập');

INSERT INTO `user`(id, username, password, email, name, code)
VALUES (1, 'hainh', '$2y$10$SLC3mK5NWIDc6JK8RqI1euBluSPFIti35q/B27272g0OmrictX7kO', '14020792@vnu.edu.vn', 'Nguyễn Hoàng Hải', '14020792');

/*
INSERT INTO `assessment`(ins_sub_id, criterion_id, user_id, value) VALUES
(1, 1, 1, FLOOR(1 + RAND()*5))
, (1, 2, 1, FLOOR(1 + RAND()*5))
, (2, 1, 1, FLOOR(1 + RAND()*5))
, (2, 2, 1, FLOOR(1 + RAND()*5))
, (3, 1, 1, FLOOR(1 + RAND()*5))
, (3, 2, 1, FLOOR(1 + RAND()*5))
, (4, 1, 1, FLOOR(1 + RAND()*5))
, (4, 2, 1, FLOOR(1 + RAND()*5));
*/
SET FOREIGN_KEY_CHECKS=1;

