CREATE TABLE IF NOT EXISTS `Department` (
  `DeptNo` int(20) NOT NULL,
  `Dname` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  PRIMARY KEY (`DeptNo`)
);


CREATE TABLE IF NOT EXISTS `Employee` (
  `EmpNo` int(20) NOT NULL,
  `Ename` varchar(255) NOT NULL,
  `Job` varchar(255) NOT NULL,
  `MGR` varchar(255) NOT NULL,
  `Hiredate` date NOT NULL,
  `Salary` double NOT NULL,
  `DeptNo` int(20) NOT NULL,
  PRIMARY KEY (`EmpNo`)
);


SELECT DISTINCT d.Dname "DEPARTMENT NAME",COUNT(DISTINCT e.EmpNo) "NUMBER OF EMPLOYEE" FROM Employee e JOIN Department d ON (e.DeptNo=d.DeptNo) GROUP BY d.DeptNo;