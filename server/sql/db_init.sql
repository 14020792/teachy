SET FOREIGN_KEY_CHECKS=0;

DELETE FROM `instructor`;
DELETE FROM `subject`;
DELETE FROM `criterion`;
DELETE FROM `user` WHERE `username` = 'hainh';
DELETE FROM `instructor_subject`;
DELETE FROM `assessment`;

INSERT INTO `instructor`(id, name, email, code, info, avatar) VALUES
(1, 'TS. Hoàng Xuân Tùng', 'hxtung@vnu.edu.vn', '003', '', 'http://api.teachy.dev/img/instructors/1/01.jpg')
, (2, 'TS. Trịnh Nhật Tiến', 'tientn@vnu.edu.vn', '004', '', 'http://api.teachy.dev/img/instructors/2/02.jpg');

INSERT INTO `subject`(id, name, code) VALUES
(1, 'Các giải thuật phân tán', 'INT6005')
, (2, 'Cơ sở dữ liệu', 'CSDL1005');

INSERT INTO `instructor_subject`(id, instructor_id, subject_id) VALUES
(1, 1, 1), (2, 2, 1), (3, 1, 2), (4, 2, 2);

INSERT INTO `criterion`(id, text) VALUES
(1, 'Cách chấm điểm')
, (2, 'Cách dạy');

INSERT INTO `user`(id, username, password, email, name, code)
VALUES (1, 'hainh', '$2y$10$SLC3mK5NWIDc6JK8RqI1euBluSPFIti35q/B27272g0OmrictX7kO', '14020792@vnu.edu.vn', 'Nguyễn Hoàng Hải', '14020792');

INSERT INTO `assessment`(ins_sub_id, criterion_id, user_id, value) VALUES
(1, 1, 1, FLOOR(1 + RAND()*5))
, (1, 2, 1, FLOOR(1 + RAND()*5))
, (2, 1, 1, FLOOR(1 + RAND()*5))
, (2, 2, 1, FLOOR(1 + RAND()*5))
, (3, 1, 1, FLOOR(1 + RAND()*5))
, (3, 2, 1, FLOOR(1 + RAND()*5))
, (4, 1, 1, FLOOR(1 + RAND()*5))
, (4, 2, 1, FLOOR(1 + RAND()*5));
SET FOREIGN_KEY_CHECKS=1;

