SHOW DATABASES;
DROP DATABASE IF EXISTS aelfarr2assign2db;
CREATE DATABASE aelfarr2assign2db;
USE aelfarr2assign2db;
GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON yourwesternuseridassign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;
SHOW TABLES;

CREATE TABLE OtherUniversity (
    uniID CHAR(2) NOT NULL,
    nameofUniversity VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    province CHAR(2) NOT NULL,
    abbreviation VARCHAR(20) NOT NULL,
    PRIMARY KEY(uniID)
);
CREATE TABLE OtherCourses (
    courseCode VARCHAR(10) NOT NULL,
    otherCourseName VARCHAR(50),
    courseYear VARCHAR(1),
    weight VARCHAR(3),
    uniID CHAR(2) NOT NULL,
    PRIMARY KEY(courseCode,uniID),
    FOREIGN KEY(uniID) REFERENCES OtherUniversity(uniID)
);

CREATE TABLE WesternUniversityCourses (
    westernCourseCode VARCHAR(6) NOT NULL,
    courseName VARCHAR(50) NOT NULL,
    weight VARCHAR(3) NOT NULL,
    suffix VARCHAR(3),
    PRIMARY KEY(westernCourseCode)
);
CREATE TABLE equivalence(
    westernCourseCode VARCHAR(6) NOT NULL,
    courseCode VARCHAR(10) NOT NULL,
    uniID VARCHAR(2) NOT NULL,
    dateStamp DATE NOT NULL,
    PRIMARY KEY(westernCourseCode, courseCode, uniID),
    FOREIGN KEY (westernCourseCode) REFERENCES WesternUniversityCourses(westernCourseCode) ON DELETE CASCADE,
    FOREIGN KEY (courseCode) REFERENCES OtherCourses(courseCode) ON DELETE CASCADE,
    FOREIGN KEY (uniID) REFERENCES OtherCourses(uniID) ON DELETE CASCADE

);

SHOW TABLES;
