# This project does not have a soul (:
 <pre>
 This is my fourth asignment from my instructor.

Before you start i'd recommend reading the entire readme.


Things you need to know:
1. You will need XAMPP, mysql workbench, composer and doctrine.
2. This project is a ClownFiesta because i was leaning how to use doctrine while making it.
3. The admin login is <b>(username: test@mail.com password: password)</b>
4. The edit page only works after you login.


How to setup:
1. You will need to get my project and move it to htdocs folder,
i would recommend leaving the project name project_without_a_soul.

2. After you have all the files open windows command console or gitbash in your project folder.

3. You will now need to add all the vendor packages to the project.
To do this write: <b>php ../composer.phar require doctrine/orm</b> 
then <b>php ../composer.phar require symfony/cache</b>
and <b>php ../composer.phar require doctrine/annotations</b>.
And to reload everything type: php ../composer.phar dump-autoload .
Note that ../ is how many folders away you are from your composer.phar file.

4.After this open XAMPP and run Apache and MySQL.
Then open your Mysql workbench and import the soulless_scheme.sql.

5.At this point everything should be ready. To open the page you need to go to your localhost/folder name.
It should look something like this: http://localhost/project_without_a_soul/ .

    And that's it!
    The page should be working! If it is go pat yourself on the back you deserve it ;) .
</pre>
