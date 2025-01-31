-- 创建表
CREATE TABLE `students` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(100),
`age` TINYINT UNSIGNED,
`grade` VARCHAR(10)
) COMMENT='学生表';

-- 添加数据到表中
INSERT INTO `students` (`name`, `age`, `grade`) VALUES ('张三', 18, 'A');

-- 查询当前表(students)的所有数据
SELECT * FROM `students`;

-- 只查询需要的数据的时候, 在 SELECT 关键字后面写上对应的字段名就可以了
-- 一般情况下推荐大家用这种办法查询, 只获取需要的信息. 执行速度比 SELECT * ... 要快
SELECT `name`, `grade` FROM `students`;
-- 根据 WHERE 关键字来查询满足条件的数据
SELECT `name`, `grade` FROM `students` WHERE `grade` = 'B';
SELECT `name`, `grade` FROM `students` WHERE `grade` = 'B' AND `name` = 'HANA';
SELECT `name`, `age`, `grade` FROM `students` WHERE `grade` = 'B' OR `age` < 20;

-- 通过 UPDATE 关键字来修改数据中的值, !!!⚠️大家在更新数据的时候一定要注意加上 WHERE 条件, 不然的话就会对整个表中的数据进行更新
UPDATE `students` SET `grade` = 'C' WHERE `name` = '王五';

-- 通过 DELETE 关键字来删除表中的数据, 和 UPDATE 关键字一样也是需要跟上 WHERE 条件的, 不然会删除掉表中的所有数据
DELETE FROM `students` WHERE `name` = '张三';

-- 模糊查询
SELECT * FROM students WHERE name LIKE '张%';

/* 表的关系通常情况下分为
一对一 「用户表」和「用户详细信息表」
一对多 「用户表」和「收货地址表」
多对多 「学生表」和「课程表」每个学生可以选择多个课程, 每个课程对应不同的学生,
这种情况下我们会新增一个中间表来表示对应关系我们把它叫做「学生课程关系表」 */

-- 使用 INNER JOIN 进行多表联合查询
SELECT `students`.`name` AS `student_name`, `courses`.`name` AS `course_name` FROM `students`
INNER JOIN `student_courses` ON `students`.`id` = `student_courses`.`student_id`
INNER JOIN `courses` ON `student_courses`.`course_id` = `courses`.`id`;
-- 使用 LEFT JOIN 查询所有学生及其选修的课程
SELECT students.name AS student_name, courses.name AS course_name
FROM students
LEFT JOIN student_courses ON students.id = student_courses.student_id
LEFT JOIN courses ON student_courses.course_id = courses.id;
-- 使用 RIGHT JOIN 查询所有课程及其选修的学生
SELECT students.name AS student_name, courses.name AS course_name
FROM students
RIGHT JOIN student_courses ON students.id = student_courses.student_id
RIGHT JOIN courses ON student_courses.course_id = courses.id;

-- 使用 COUNT(*) 来统计当前数据表中有多少条数据
SELECT COUNT(*) AS `total_student` FROM `students` WHERE `grade` = 'B';
-- 计算所有学生的年龄总和
SELECT SUM(`age`) AS `total_age` FROM `students`;
-- 计算所有学生的平均年龄
SELECT AVG(age) AS average_age FROM students;
-- 找到学生的最大和最小年龄
SELECT MAX(age) AS max_age, MIN(age) AS min_age FROM students;

-- 按年级分组统计每个年级的学生人数
SELECT grade, COUNT(*) AS total_students
FROM students
GROUP BY grade;

-- 按年龄排序学生
SELECT * FROM students
ORDER BY age DESC;

-- 限制结果集：使用 LIMIT 限制返回的记录数，尤其在分页查询时。
SELECT name, age FROM students LIMIT 3;

-- EXPLAIN 语句：使用 EXPLAIN 语句分析查询语句的执行计划，找出性能瓶颈并进行优化。
EXPLAIN SELECT * FROM students WHERE age > 18;

-- 子查询优化：尽量避免使用子查询，尤其是嵌套子查询。可以使用连接（JOIN）替代子查询，提高查询性能。
-- 子查询
SELECT * FROM students WHERE id IN (SELECT student_id FROM student_courses);
-- IN 关键字的用法
SELECT * FROM students WHERE id IN (1, 2);
-- BETWEEN 关键字的用法
SELECT * FROM students WHERE birth_date BETWEEN '2000-01-01' AND '2000-12-31';

-- 查询不重复的年级
-- DISTINCT 关键字去重
SELECT DISTINCT grade FROM students;
