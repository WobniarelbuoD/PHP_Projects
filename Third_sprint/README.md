# sprint_meister
 <pre>
 This is my playlist sprint project.

Before you start i'd recommend reading the entire readme.

Things you need to know:
1. You will need XAMPP and mysql workbench.
2. There are 2 users on this project admin and user. 
  The only difference between them is that admin has my entire spotify playlist.
3.Mysql file does not have a password so if you get asked to enter just leave it blank.
  The website logins are: 
  <b>'user@mail.com'</b> and <b>'test@mail.com'</b> 
  with the password being <b>'password'</b> for both.

How to setup:
1. Download the zip file from my page or this link:
  https://github.com/WobniarelbuoD/sprint_meister/archive/refs/heads/main.zip.
2. extract the folder into your XAMPP htdocs folder. The file is usualy located in:
  This PC > Local Disk (C:) > xampp > htdocs
3. In mysql workbench create a connection and import the sprint_table.sql as a self contained file.
  You can find the data import in the server tab. !!!IMPORTNANT!!! ----> Import from self-Contained-File. 
  (After the import is done you should have 2 Schemas named 'new_prank' and 'user').
4.Open your XAMPP and start Apache and MySQL.
5.Once all of the above steps are done you can open the website by writing: 
  localhost/'project folder name here' which would usualy look like this: localhost/sprint_meister-main .
  You should see a login screen.
6.At this point you can login with
  email: 'test@mail.com' password: 'password' or email: 'user@mail.com' password: 'password'

And thats it! You should be able to see my playlist or an empty playlist and start adding you own songs!

For testing purposes you can check if the order changes by pressing on the Song name for example.
Or creating a new user in mysql user table.

</pre>
