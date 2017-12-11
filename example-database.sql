CREATE TABLE IF NOT EXISTS `company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `year_of_incorporation` varchar(50) CHARACTER SET utf8 NOT NULL,
  `industry` varchar(150) CHARACTER SET utf8 NOT NULL,
  `country` varchar(150) CHARACTER SET utf8 NOT NULL,
  `subsidiaries` varchar(300) CHARACTER SET utf8 NOT NULL,
  `website` varchar(300) CHARACTER SET utf8 NOT NULL,
  `CEO` varchar(300) CHARACTER SET utf8 NOT NULL,
  `board_members` varchar(300) CHARACTER SET utf8 NOT NULL,
  `key_investors` varchar(300) CHARACTER SET utf8 NOT NULL,
  `asset_price` varchar(300) CHARACTER SET utf8 NOT NULL,
  `mission_statements` varchar(300) CHARACTER SET utf8 NOT NULL,
  `awards` varchar(300) CHARACTER SET utf8 NOT NULL,
  `about` varchar(300) CHARACTER SET utf8 NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `company` (`company_name`, `year_of_incorporation`, `industry`, `country`, `subsidiaries`, `website`, `CEO`, `board_members`, `key_investors`, `asset_price`, `mission_statements`, `awards`, 
`about`) VALUES
('ABC', '2000', 'industry1', 'UK', 'xyz', 'www.abc.com', 'jhon', 'abc, xyz, asd', 'abcd, efgh, ijkl', '$5210', 'abcdefgh', 'award1, award2, award3', 'about comapny' ),
('CEF', '1998', 'industry2', 'USA', 'xyz', 'www.cef.com', 'Jay', 'abc, xyz, asd', 'abcd, efgh, ijkl', '$784', 'abcdefgh', 'award1, award2, award3', 'about comapny' ),
('DEG', '2011', 'industry3', 'India', 'xyz', 'www.deg.com', 'Ram', 'abc, xyz, asd', 'abcd, efgh, ijkl', '$4150', 'abcdefgh', 'award1, award2, award3', 'about comapny' ),
('NWE', '1999', 'industry4', 'UK', 'xyz', 'www.nwe.com', 'Will', 'abc, xyz, asd', 'abcd, efgh, ijkl', '$789', 'abcdefgh', 'award1, award2, award3', 'about comapny' );