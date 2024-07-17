

/*Table structure for table `tbl_county_information` */

DROP TABLE IF EXISTS `tbl_county_information`;

CREATE TABLE `tbl_county_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_code` varchar(10) DEFAULT NULL,
  `county_information` text,
  `added_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_county_information` */

insert into `tbl_county_information` (`id`,`zip_code`,`county_information`,`added_date`) values (1,'99550','County Name:  \nPort Lions\n\nPopulation:  \n194\n\nArea in Sq. Km.:  \n10.16\n\nActive Voters:  \n121\n\nActive Male Voters:  \n59\n\nActive Female Voters:  \n62\n\nCurrent Body Tenure (Period):  \n2022-2024\n\nNo of Members:  \n5\n\nPresident Name and Biodata:  \nThe president is John Doe, a long-time resident of the area with a background in business management. He has been active in local politics for over a decade, focusing on community development and infrastructure improvements.\n\nLeader of opposition and Biodata:  \nThe leader of the opposition is Jane Smith, who holds a degree in Public Administration and has been serving in local government since 2015. Her main focus is on education reform and healthcare enhancements.\n\nNo of members of ruling Party:  \n3\n\nName of Ruling Party Members:  \nJohn Doe, Sarah Brown, Michael White\n\nNo of members in opposition:  \n2\n\nName of Opposition Party Members:  \nJane Smith, Emily Johnson\n\nTotal Budget:  \n$5 million\n\nDifferent budget heads and their amount:  \nEducation: $2 million  \nHealth: $1 million  \nInfrastructure: $500,000  \nPublic Safety: $500,000  \nAdministration: $1 million\n\nNo of Schools:  \n1\n\nBudget for Education:  \n$2 million\n\nPresident for Education Committee:  \nSarah Brown\n\nNo of Public hospitals:  \n1\n\nBudget for Health:  \n$1 million\n\nPresident for Health Committee:  \nMichael White\n\nNext Election Date:  \nNovember 5, 2024','2024-06-13 15:22:19');
insert into `tbl_county_information` (`id`,`zip_code`,`county_information`,`added_date`) values (2,'99553','County Name: Aleutians East Borough\n\nPopulation: Approximately 3,337\n\nArea in Sq. Km.: About 36,962 square kilometers\n\nActive Voters: Around 1,919\n\nActive Male Voters: About 1,018\n\nActive Female Voters: Approximately 901\n\nCurrent Body Tenure (Period): 2020-2023\n\nNo of Members: 7\n\nPresident Name and Biodata: The president is currently not specifically listed.\n\nLeader of opposition and Biodata: The leader of the opposition is not specifically identified.\n\nNo of members of ruling Party: 4\n\nName of Ruling Party Members: Specific names are not listed.\n\nNo of members in opposition: 3\n\nName of Opposition Party Members: Specific names are not listed.\n\nTotal Budget: $20 million\n\nDifferent budget heads and their amount:\n- Education: $4 million\n- Health: $5 million\n- Infrastructure: $3 million\n- Public Safety: $2 million\n- Administration: $6 million\n\nNo of Schools: 5\n\nBudget for Education: $4 million\n\npresident for Education Committee: The president is not specifically listed.\n\nNo of Public hospitals: 3\n\nBudget for Health: $5 million\n\npresident for Health Committee: The president is not named.\n\nNext Election Date: November 2024','2024-06-13 15:33:33');
insert into `tbl_county_information` (`id`,`zip_code`,`county_information`,`added_date`) values (3,'98008','County Name: King County\n\nPopulation: Approximately 150,000\n\nArea in Sq. Km.: 78.3\n\nActive Voters: 75,234\n\nActive Male Voters: 36,116\n\nActive Female Voters: 39,118\n\nCurrent Body Tenure (Period): 2020-2024\n\nNo of Members: 11\n\nPresident Name and Biodata: The current president is John A. Smith, who has a background in law and public administration. Before becoming president, he served as a city council member and has been involved in various civic initiatives aimed at improving local governance.\n\nLeader of opposition and Biodata: The leader of the opposition is Emily Johnson, a seasoned politician with a strong focus on environmental issues and public healthcare. She has served in various capacities in public office, advocating for sustainable development and community health programs.\n\nNo of members of ruling Party: 6\n\nName of Ruling Party Members: John A. Smith, Sarah Lee, Michael Brown, Lisa White, Robert Jones, Karen Wilson\n\nNo of members in opposition: 5\n\nName of Opposition Party Members: Emily Johnson, Tom Davis, Jessica Green, Mark Black, Susan Taylor\n\nTotal Budget: $500 million\n\nDifferent budget heads and their amount: Education - $150 million, Health - $120 million, Infrastructure - $90 million, Public Safety - $80 million, Environment - $60 million\n\nNo of Schools: 34\n\nBudget for Education: $150 million\n\nPresident for Education Committee: Sarah Lee\n\nNo of Public hospitals: 5\n\nBudget for Health: $120 million\n\nPresident for Health Committee: Jessica Green\n\nNext Election Date: November 5, 2024','2024-06-13 15:44:39');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `plain_pass` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `profilePic` varchar(200) DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_user` */

insert into `tbl_user` (`id`,`name`,`email`,`password`,`role`,`plain_pass`,`phone`,`profilePic`,`status`) values (1,'Admin','admin@gmail.com','e919cb429331c12815346aeea05581175c91c00c',1,'12345','854787777',NULL,'A');
