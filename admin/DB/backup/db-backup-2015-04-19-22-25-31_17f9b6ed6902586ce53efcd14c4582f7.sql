DROP TABLE articles;

CREATE TABLE `articles` (
  `article_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `article_title` varchar(100) NOT NULL,
  `article_date` date NOT NULL,
  `article_editDate` date DEFAULT NULL,
  `article_author` varchar(50) NOT NULL,
  `article_keywords` text NOT NULL,
  `article_image` text NOT NULL,
  `article_content` text NOT NULL,
  PRIMARY KEY (`article_id`),
  FULLTEXT KEY `article_content` (`article_content`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

INSERT INTO articles VALUES("53","32","Open FTP Site in Windows Explorer","2014-10-08","2015-04-19","Gabriel Sanchez","FTP","","<p>If FTP pages not showing up in the familiar Explorer view and instead are showing in a list view. Do the following:</p>
INSERT INTO articles VALUES("54","31","Unable to connect to SQL Server Express from a remote machine","2014-11-26","","Henry Sanchez","SQL","","<p><img alt=\"\" src=\"/avocadocms/data/articles/images/SQL/sql-1.jpg\" style=\"height:309px; width:415px\" /></p>
INSERT INTO articles VALUES("55","27","How to perform a backup & recovery of your hard drive using REDO","2014-12-02","","Henry Sanchez","REDO","","<p>This is a quick run through on how to peform a backup of your hard drive using Redo &ndash; Backup &amp; Recovery. If you are not familiar with Redo, it is a very simple yet powerfull utility use to make complete backup images of your hard drive. &nbsp;It does have other features included but it is mainly use to peform backups and restores of your system, by cloning your drive and allowing you to save the image file as a backup. In case of failure or disaster you will be able to restore your system to the state it was in when the backup was taken. Redo is one one my favorite utilities to use for this purpose. For more info you can visit their website at&nbsp;<a href=\"http://redobackup.org\" target=\"_blank\">redobackup.org</a>.</p>
INSERT INTO articles VALUES("56","24","How to repair a damaged .pst file","2015-01-12","2015-04-19","Gabriel Sanchez","pst files","","<p>I recently used this handy Microsoft tool to recover mail from a damaged .pst file. The tool can be used to repair the .pst file allowing you to open it with Outlook to view your archives. It has worked for me every time I encounter the dreaded error warning.</p>
INSERT INTO articles VALUES("57","2","How to recover the data from a failed Windows Home Server","2015-02-18","","Henry Sanchez","Windows","","<p>After 3 years running, my HP Home server&nbsp;finally&nbsp;gave up (WHS 2003). It happened while I was trying to configure the Wake on LAN settings and somehow I lost connection to the server and all share folders. I am not sure exactly what&nbsp;caused&nbsp;it but I could not bring it back to life no matter what I did. I tried rebooting, doing a recovery, and even a system factory reset, trying each several times.. but none of it worked. I finally had to give up (after trying for two days)&nbsp;and decided to buy a new box. After setting up my new&nbsp;micro server&nbsp;with WHS 2011, I searched the web for how to safely recover my data from my spanned drives (3 tb).</p>



DROP TABLE categories;

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

INSERT INTO categories VALUES("2","Home Server");
INSERT INTO categories VALUES("24","Outlook");
INSERT INTO categories VALUES("27","Backup");
INSERT INTO categories VALUES("30","License");
INSERT INTO categories VALUES("31","SQL");
INSERT INTO categories VALUES("32","Explorer");



DROP TABLE comments;

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `article_id` int(10) NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO comments VALUES("4","57","Gabi","gabi@hsnyc.co","Just a sample of a comment..","April 19, 2015","approved");
INSERT INTO comments VALUES("6","54","Henry","ninja@hsnyc.co","This is an awesomeeee article :)","April 19, 2015","approved");



DROP TABLE users;

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","Henry","8e5d78eb164975acb85c0bfac04081c1","admin");
INSERT INTO users VALUES("2","Gabi","68a7379f1a45cde6a37ad75211336d91","admin");
INSERT INTO users VALUES("3","guest","6f87e73217b6f148b002f58f0349b87e","user");


