# avocadocms
####A simple CMS to kickstart your projects.

Avocado is a simple content management system I created to save, edit, and search documents for my IT Department. You can check out the UI at http://hsnyc.co/portfolio

It is far from complete. I work on it as time allows. 

Please feel free to use it for your own projects, improve it, share it, or whatever use may be of help to you.

NOTE: The files include sample content including a DEMO version of CKFinder which you can freely use during development. If you use CKFinder in production you will need to get a license unless you use another solution for file browsing.

##To get started:
* download the .zip with all the necessary files.
* create a MySQL Database and name it **avocado** or whatever you wish.
* create a db user and edit it's credentials in the **database.php** file in both *includes* and *admin/includes* folder (line 6) and in the **bkdb.php** file in *admin/DB*.
* import the .sql file found in *admin/DB* this will import 4 tables with the sample content: 5 articles, 6 categories, 2 comments, 3 users. 
* If installing on the root, you will need to modify the path in the *admin/DB/bkdb.php* file (line 4) for the backup function to work. Just delete *avocadocms* from the path.
* To log in use the following - user: gabi password: gabi28
* You can also modify the users in the database since I have not yet built a function for this.
* Thats it! Let me know if you encounter any trouble getting started.

If you are interested in contributing please reach out, I will be delighted. 

Thank you for checking out this project.
