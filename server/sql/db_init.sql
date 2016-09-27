SET FOREIGN_KEY_CHECKS=0;

DELETE FROM `instructor`;
DELETE FROM `subject`;
DELETE FROM `criterion`;
DELETE FROM `user` WHERE `username` = 'hainh';
DELETE FROM `instructor_subject`;
DELETE FROM `assessment`;

INSERT INTO `instructor`(id, name, email, code, info) VALUES
(1, 'TS. Hoàng Xuân Tùng', '', '003', '');

INSERT INTO `subject`(id, name, code) VALUES
(1, 'Các giải thuật phân tán', 'INT6005');

INSERT INTO `instructor_subject`(id, instructor_id, subject_id) VALUES
(1, 1, 1);

INSERT INTO `criterion`(id, text) VALUES
(1, 'Cách chấm điểm')
, (2, 'Cách dạy');

INSERT INTO `user`(id, username, password, email, name, code)
VALUES (1, 'hainh', '$2y$10$SLC3mK5NWIDc6JK8RqI1euBluSPFIti35q/B27272g0OmrictX7kO', '14020792@vnu.edu.vn', 'Nguyễn Hoàng Hải', '14020792');

INSERT INTO `assessment`(ins_sub_id, criterion_id, user_id, value) VALUES
(1, 1, 1, FLOOR(1 + RAND()*5))
, (1, 2, 1, FLOOR(1 + RAND()*5));
SET FOREIGN_KEY_CHECKS=1;

