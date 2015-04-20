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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

INSERT INTO articles VALUES("53","32","Open FTP Site in Windows Explorer","2014-10-08","2015-04-19","Gabriel Sanchez","FTP","","<p>If FTP pages not showing up in the familiar Explorer view and instead are showing in a list view. Do the following:</p>\n\n<ol>\n	<li>In IE, go to Tools-&gt;Internet Options.</li>\n	<li>Check the following items and then click &lsquo;OK&#39;:<br />\n	<br />\n	<img alt=\"\" src=\"/avocadocms/data/articles/images/FTP/ftp-in-explorer-1.jpg\" style=\"height:529px; width:411px\" /><br />\n	<br />\n	<img alt=\"\" src=\"/avocadocms/data/articles/images/FTP/ftp-in-explorer-2.jpg\" style=\"height:528px; width:410px\" /><br />\n	&nbsp;</li>\n	<li>Done.<br />\n	<br />\n	<br />\n	&nbsp;</li>\n</ol>\n");
INSERT INTO articles VALUES("54","31","Unable to connect to SQL Server Express from a remote machine","2014-11-26","","Henry Sanchez","SQL","","<p><img alt=\"\" src=\"/avocadocms/data/articles/images/SQL/sql-1.jpg\" style=\"height:309px; width:415px\" /></p>\n\n<p>If unable to connect to SQL Server standard or Express edition (using 2008) from another machine using SQL management studios try the step in this&nbsp;<a href=\"http://www.linglom.com/2009/03/28/enable-remote-connection-on-sql-server-2008-express/\" target=\"_blank\">Blog post</a>&nbsp;&nbsp;(from a previous post) and if that still does not resolve the issue, like in my case today, them it is the firewall. Make sure you open UDP port 1434 on the server machine. That took care of the connection problem in my case. This page from Microsoft&rsquo;s support site gives more details on what else to look for &ndash;&gt; <a href=\"http://www.microsoft.com/products/ee/transform.aspx?ProdName=Microsoft+SQL+Server&amp;EvtSrc=MSSQLServer&amp;EvtID=-1\" target=\"_blank\">Microsoft SQL Support.</a></p>\n\n<p>The above helped resolved the following connection errors.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/SQL/sql-2.jpg\" style=\"height:192px; width:612px\" /></p>\n\n<p>NOTE: Connecting to a default instance of SQL Server (not the Express Edition) does not required the instance name, only the server name like so.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/SQL/sql-3.jpg\" style=\"height:359px; width:480px\" /></p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/SQL/sql-4.jpg\" style=\"height:165px; width:611px\" /></p>\n\n<p>&nbsp;</p>\n");
INSERT INTO articles VALUES("55","27","How to perform a backup & recovery of your hard drive using REDO","2014-12-02","","Henry Sanchez","REDO","","<p>This is a quick run through on how to peform a backup of your hard drive using Redo &ndash; Backup &amp; Recovery. If you are not familiar with Redo, it is a very simple yet powerfull utility use to make complete backup images of your hard drive. &nbsp;It does have other features included but it is mainly use to peform backups and restores of your system, by cloning your drive and allowing you to save the image file as a backup. In case of failure or disaster you will be able to restore your system to the state it was in when the backup was taken. Redo is one one my favorite utilities to use for this purpose. For more info you can visit their website at&nbsp;<a href=\"http://redobackup.org\" target=\"_blank\">redobackup.org</a>.</p>\n\n<p>So here it is:</p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 1</strong></span>: Dowload the latest version of Redo from their website &ndash; &nbsp;<a href=\"http://redobackup.org\" target=\"_blank\">redobackup.org</a>&nbsp;and burn the ISO to a CD.</p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 2</strong></span>: Boot your machine from this CD (make sure you select the CD-ROM drive in your boot menu options or in the BIOS).</p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP3</strong></span>: Select &lsquo;Start Redo Backup&rsquo; from the main screen.<br />\n<br />\n<img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-1.jpg\" style=\"height:482px; width:640px\" /></p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 4</strong></span>: Click on the Gears icon on the bottom left corner and select &lsquo;Redo Backup &amp; Recovery&rsquo;.&nbsp;If backing up to an external hard drive make sure you have it connected to your machine now.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-2.jpg\" style=\"height:250px; width:277px\" /></p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 5</strong></span>: &nbsp;Select &lsquo;Backup&rsquo;.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-3.jpg\" style=\"height:480px; width:640px\" /></p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 6</strong></span>: Select the source drive.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-4.jpg\" style=\"height:599px; width:800px\" /></p>\n\n<p><strong><span style=\"color:#99cc00\">STEP 7</span></strong>: Select the partitions to save.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-5.jpg\" style=\"height:480px; width:640px\" /></p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 8</strong></span>: Select the destination drive. This can be a drive attached locally or a network share.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-6.jpg\" style=\"height:479px; width:639px\" /></p>\n\n<p><strong><span style=\"color:#99cc00\">STEP 9</span></strong>: Select your destination folder. You can create one here or leave the default.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-7.jpg\" style=\"height:600px; width:801px\" /></p>\n\n<p><span style=\"color:#99cc00\"><strong>STEP 10</strong></span>: Name your backup. You can give it a name or leave the default as well.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-8.jpg\" style=\"height:600px; width:799px\" /></p>\n\n<p><strong><span style=\"color:#99cc00\">STEP 11</span></strong>: Click &lsquo;Next&rsquo; and the imaging process will start.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/backup/redo-9.jpg\" style=\"height:600px; width:798px\" /></p>\n\n<p>The process to restore is more or less the same. You would of course select &lsquo;Restore&rsquo; in <span style=\"color:#99cc00\"><strong>STEP 5</strong></span>&nbsp;and then select your image file. But that is it. Very simple.</p>\n\n<p>If you have any questions or comments please don&rsquo;t hesitate to post them here. Thanks for&nbsp;stopping&nbsp;by =)</p>\n");
INSERT INTO articles VALUES("56","24","How to repair a damaged .pst file","2015-01-12","2015-04-19","Gabriel Sanchez","pst files","","<p>I recently used this handy Microsoft tool to recover mail from a damaged .pst file. The tool can be used to repair the .pst file allowing you to open it with Outlook to view your archives. It has worked for me every time I encounter the dreaded error warning.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/outlook/outlook-pst-1.jpg\" style=\"height:158px; width:400px\" /></p>\n\n<p>To use it, you will need to double click on the file name: <span style=\"color:#99cc00\"><strong>scanpst.exe</strong></span>. You can find it in one of its default locations, which can vary depending on the version of Office you have installed on your machine. Here are some of the possible locations in the current versions of Outlook:</p>\n\n<h2>Outlook 2013</h2>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:500px\">\n	<tbody>\n		<tr>\n			<td>32-bit&nbsp;&nbsp;&nbsp;</td>\n			<td>C:\\Program Files\\Microsoft Office\\Office15</td>\n		</tr>\n		<tr>\n			<td>64-bit</td>\n			<td>C:\\Program Files (x86)Microsoft Office\\Office15</td>\n		</tr>\n	</tbody>\n</table>\n\n<h2>Outlook 2010</h2>\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width:502px\">\n	<tbody>\n		<tr>\n			<td>32-bit&nbsp;&nbsp;&nbsp;</td>\n			<td>C:\\Program Files\\Microsoft Office\\Office14</td>\n		</tr>\n		<tr>\n			<td>64-bit</td>\n			<td>C:\\Program Files (x86)Microsoft Office\\Office14</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&nbsp;</p>\n\n<p>Visit this page for more locations:&nbsp;<a href=\"http://www.msoutlook.info/question/77\" target=\"_blank\">MSOutlook.info</a></p>\n\n<p>Double click <span style=\"color:#99cc00\"><strong>scanpst.exe</strong></span>&nbsp;to open it, then browse for the pst you need to repair and click &lsquo;Start&rsquo;.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/outlook/outlook-pst-2.jpg\" style=\"height:302px; width:361px\" /></p>\n\n<p>After the tool finishes scanning the file, it will tell you if it found any errors. If it did, just click repair and it will get to work to repair the file.</p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/outlook/outlook-pst-3.jpg\" style=\"height:310px; width:346px\" /></p>\n\n<p><img alt=\"\" src=\"/avocadocms/data/articles/images/outlook/outlook-pst-4.jpg\" style=\"height:159px; width:239px\" /></p>\n\n<p>For more information see this <a href=\"http://office.microsoft.com/en-us/outlook-help/repair-outlook-data-files-pst-and-ost-HA010354964.aspx\" target=\"_blank\">Microsoft page</a>.</p>\n");
INSERT INTO articles VALUES("57","2","How to recover the data from a failed Windows Home Server","2015-02-18","","Henry Sanchez","Windows","","<p>After 3 years running, my HP Home server&nbsp;finally&nbsp;gave up (WHS 2003). It happened while I was trying to configure the Wake on LAN settings and somehow I lost connection to the server and all share folders. I am not sure exactly what&nbsp;caused&nbsp;it but I could not bring it back to life no matter what I did. I tried rebooting, doing a recovery, and even a system factory reset, trying each several times.. but none of it worked. I finally had to give up (after trying for two days)&nbsp;and decided to buy a new box. After setting up my new&nbsp;micro server&nbsp;with WHS 2011, I searched the web for how to safely recover my data from my spanned drives (3 tb).</p>\n\n<p>The most usefull article was this one:&nbsp;<a href=\"http://social.microsoft.com/Forums/en-US/whsfaq/thread/cf354b5d-b37b-4b7f-a0d5-8e573697777f\" target=\"_blank\">How to recover data after server failure</a> by&nbsp;Olaf Engelke. I followed it to the T. Especially usefull was the part about the&nbsp;hidden DE folder. I have to admit that I panicked after I mounted my drives in my new box and saw nothing in neither drives even after seeing a &lsquo;Healthy&rsquo; status in disk management. The key here is to make sure you are able to see &lsquo;Hidden Files&rsquo; in Windows Explorer (Tools&ndash;Folder Options&ndash;View) to make sure you are able to see these DE folders. I was relieved after seeing all my files were there. I just copied them to an external drive I had as backup, finished the drive setup on my new box, and then copied the files back to the server.</p>\n\n<p>Hope this was&nbsp;useful.</p>\n");



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



