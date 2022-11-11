Resources:
https://www.mysqltutorial.org/mysql-distinct.aspx#:~:text=Introduction%20to%20MySQL%20DISTINCT%20clause,clause%20in%20the%20SELECT%20statement.&text=In%20this%20syntax%2C%20you%20specify,after%20the%20SELECT%20DISTINCT%20keywords.
https://stackoverflow.com/questions/6638520/1052-column-id-in-field-list-is-ambiguous
https://dba.stackexchange.com/questions/129023/selecting-data-from-another-table-using-a-foreign-key
https://stackoverflow.com/questions/42217521/how-to-connect-each-person-in-a-table-to-another-table-respectively-in-a-databas
https://www.mysqltutorial.org/mysql-if-statement/
https://www.w3schools.com/mysql/func_mysql_if.asp
https://dev.mysql.com/doc/refman/8.0/en/select.html
https://stackoverflow.com/questions/3247229/is-there-a-way-to-view-past-mysql-queries-with-phpmyadmin
https://stackoverflow.com/questions/36146747/add-foreign-key-in-phpmyadmin
https://stackoverflow.com/questions/37615586/how-to-create-a-foreign-key-in-phpmyadmin
https://stackoverflow.com/questions/8965426/what-is-the-difference-between-default-null-and-the-checkbox-null-mysql
https://stackoverflow.com/questions/18472873/phpmyadmin-what-is-the-parameter-null
https://dba.stackexchange.com/questions/61342/storing-a-shipping-address-best-practice
https://www.youtube.com/watch?v=gInhdzPeVU8&list=PLk-EmIiBIYGF8WCitdIVq7dvvacqY0rdl&index=6
https://stackoverflow.com/questions/53634922/sql-select-average-from-results-of-distinct-rows
https://stackoverflow.com/questions/41818610/mysql-count-distinct-rows-by-another-column-and-group-results

PART 2:
1:
ALTER TABLE `students` ADD `state` VARCHAR(20) NOT NULL AFTER `phone`, ADD `city` VARCHAR(20) NOT NULL AFTER `state`, ADD `street` VARCHAR(100) NOT NULL AFTER `city`, ADD `zip` INT(5) NOT NULL AFTER `street`;

2:
ALTER TABLE `courses` ADD `section` INT(2) NOT NULL AFTER `title`, ADD `year` INT(4) NOT NULL AFTER `section`;

3:
CREATE TABLE `websyslab7`.`grades` ( `id` INT NOT NULL AUTO_INCREMENT ,  `CRN` INT NOT NULL ,  `RIN` INT NOT NULL ,  `grade` INT(3) NOT NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

4:
INSERT INTO `courses` (`CRN`, `prefix`, `number`, `title`, `section`, `year`) VALUES ('78486', 'ITWS', '4500', 'Web Science Systems Dev', '02', '2023');
INSERT INTO `courses` (`CRN`, `prefix`, `number`, `title`, `section`, `year`) VALUES ('76101', 'CSCI', '2300', 'Introduction to Algorithms', '02', '2023'), ('78505', 'CSCI', '2600', 'Principles Of Software', '01', '2023'), ('80260', 'CSCI', '2961', 'RCOS', '04', '2023');
INSERT INTO `courses` (`CRN`, `prefix`, `number`, `title`, `section`, `year`) VALUES ('76101', 'CSCI', '2300', 'Introduction to Algorithms', '02', '2023'), ('78505', 'CSCI', '2600', 'Principles Of Software', '01', '2023'), ('80260', 'CSCI', '2961', 'RCOS', '04', '2023');

5:
INSERT INTO `students` (`RIN`, `RCSID`, `first-name`, `last-name`, `alias`, `phone`, `state`, `city`, `street`, `zip`) VALUES ('662029451', 'liny18', 'Yuxiang', 'Lin', 'Terry', '9173229626', 'NY', 'Fresh Meadows', '69-11 165th Street', '11365'), ('000000000', 'linb18', 'Berry', 'Lin', '', '0000000000', 'NY', 'Fresh Meadows', '69-12 165th Street', '11365'), ('111111111', 'linm18', 'Merry', 'Lin', '', '1111111111', 'NY', 'Fresh Meadows', '69-13 165th Street', '11365'), ('222222222', 'link18', 'Kerry', 'Lin', '', '2222222222', 'NY', 'Fresh Meadows', '69-14 165th Street', '11365');

6:
INSERT INTO `grades` (`id`, `CRN`, `RIN`, `grade`) VALUES (NULL, '76101', '333333333', '68'), (NULL, '76101', '222222222', '86'), (NULL, '78505', '333333333', '12'), (NULL, '78505', '222222222', '21'), (NULL, '80260', '111111111', '0'), (NULL, '80260', '662029451', '100'), (NULL, '78486', '662029451', '100'), (NULL, '78486', '111111111', '80'), (NULL, '80735', '662029451', '100'), (NULL, '80735', '333333333', '92');

7:
SELECT * FROM `students` ORDER BY `students`.`RIN`  ASC
SELECT * FROM `students` ORDER BY `students`.`last-name` ASC
SELECT * FROM `students` ORDER BY `students`.`RCSID` ASC
SELECT * FROM `students` ORDER BY `students`.`first-name` ASC

8:
SELECT DISTINCT students.RIN, `first-name`, `last-name`, street, city, state, zip
FROM students
INNER JOIN grades
ON `students`.`RIN` = `grades`.`RIN`
WHERE `grades`.`grade` > 90

9:
SELECT courses.title, AVG(grade) as "Average Grade"
FROM grades
INNER JOIN courses
ON courses.CRN = grades.CRN
GROUP BY grades.CRN

10:
SELECT courses.title, COUNT(DISTINCT `RIN`) as "Count"
FROM grades
INNER JOIN courses
ON courses.CRN = grades.CRN
GROUP BY grades.CRN;
