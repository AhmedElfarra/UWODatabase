USE aelfarr2assign2db;
SELECT * FROM OtherUniversity;
LOAD DATA LOCAL INFILE 'univerData.txt' INTO TABLE OtherUniversity FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';
SELECT * FROM OtherUniversity;
SELECT * FROM WesternUniversityCourses;



INSERT INTO WesternUniversityCourses VALUES("cs1026", "Computer Science Fundamentals I", "0.5", "A/B");
INSERT INTO WesternUniversityCourses VALUES("cs1027", "Computer Science Fundamentals II", "0.5", "A/B");
INSERT INTO WesternUniversityCourses VALUES("cs2210", "Algorithms and Data Structures", "1.0", "A/B");
INSERT INTO WesternUniversityCourses VALUES("cs3319", "Databases I", "0.5", "A/B");
INSERT INTO WesternUniversityCourses VALUES("cs2120", "Modern Survival Skills I: Coding Essentials", "0.5", "A/B");
INSERT INTO WesternUniversityCourses VALUES("cs4490", "Thesis", "0.5", "Z");
INSERT INTO WesternUniversityCourses VALUES("cs0020", "Intro to Coding using Pascal and Fortran", "1.0", "");
INSERT INTO WesternUniversityCourses VALUES("cs2233", "Intro to Web Development", "0.5", "A/B");

SELECT * FROM WesternUniversityCourses;
SELECT * FROM OtherUniversity;
INSERT INTO OtherUniversity VALUES("29", "University of Ahmed", "Ahmed", "ON", "UoA");

SELECT * FROM OtherUniversity;
SELECT * FROM OtherCourses;

INSERT INTO OtherCourses VALUES("CompSci022","Introduction to Programming","1","0.5","2");
INSERT INTO OtherCourses VALUES("CompSci033","Intro to Programming for Med students","3","0.5","2");
INSERT INTO OtherCourses VALUES("CompSci021","Packages","1","0.5","2");
INSERT INTO OtherCourses VALUES("CompSci222","Introduction to Databases","2","1.0","2");
INSERT INTO OtherCourses VALUES("CompSci023","Advanced Programming","1","0.5","2");
INSERT INTO OtherCourses VALUES("CompSci011","Intro to Computer Science","2","0.5","4");
INSERT INTO OtherCourses VALUES("CompSci123","Using UNIX","2","0.5","4");
INSERT INTO OtherCourses VALUES("CompSci021","Intro Programming","1","1.0","66");
INSERT INTO OtherCourses VALUES("CompSci022","Advanced Programming","1","0.5","66");
INSERT INTO OtherCourses VALUES("CompSci319","Using Databases","3","0.5","66");
INSERT INTO OtherCourses VALUES("CompSci333","Graphics","3","0.5","55");
INSERT INTO OtherCourses VALUES("CompSci444","Networks","4","0.5","55");
INSERT INTO OtherCourses VALUES("CompSci022","Using Packages","1","0.5","77");
INSERT INTO OtherCourses VALUES("CompSci101","Introduction to Using Data Structures","2","0.5","77");
INSERT INTO OtherCourses VALUES("CompSci044","Objected Ortiented Design","2","0.5","29");
INSERT INTO OtherCourses VALUES("CompSci055","Analysis of Algoritms","1","0.5","29");

SELECT * FROM OtherCourses;
SELECT * FROM equivalence;

INSERT INTO equivalence VALUES ("cs1026", "CompSci022", "2", "2015-05-12");
INSERT INTO equivalence VALUES ("cs1026", "CompSci033", "2", "2013-01-02");
INSERT INTO equivalence VALUES ("cs1026", "CompSci011", "4", "1997-02-09");
INSERT INTO equivalence VALUES ("cs1026", "CompSci021", "66", "2010-01-12");
INSERT INTO equivalence VALUES ("cs1027", "CompSci023", "2", "2017-06-22");
INSERT INTO equivalence VALUES ("cs1027", "CompSci022", "66", "2019-09-01");
INSERT INTO equivalence VALUES ("cs2210", "CompSci101", "77", "1998-07-12");
INSERT INTO equivalence VALUES ("cs3319", "CompSci222", "2", "1990-09-13");
INSERT INTO equivalence VALUES ("cs3319", "CompSci319", "66", "1987-09-21");
INSERT INTO equivalence VALUES ("cs2120", "CompSci022", "2", "2018-12-10");
INSERT INTO equivalence VALUES ("cs0020", "CompSci022", "2", "1999-09-17");


SELECT * FROM equivalence;
UPDATE equivalence SET dateStamp="2018-09-19"
WHERE WesternCourseCode="cs0020"
AND uniID="2"
AND courseCode = "CompSci022";

SELECT * FROM equivalence;
SELECT * FROM OtherCourses;

UPDATE OtherCourses
SET courseYear="1"
WHERE otherCourseName LIKE "Intro%";

SELECT * FROM OtherCourses;

