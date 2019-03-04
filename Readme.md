## Instructions:
To run this test programme, one should have installed 
`PHP7.2`, `Composer`, `MySQL` and of course `git` in their machine.

After cloning, composer install command should be run:
`composer install`

Next step would be for the database layer, database settings
should be added in the `src/bin/Database.php` file. 
And then the doctrine command should be executed: 

`vendor/bin/doctrine orm:schema-tool:update`

Next step is to configure mailer, for that you need entries in two files. 
First one is `src/service/EmailService.php`, there one should add
a proper gmail account with it's password as well proper email address
indicating outgoings from email. 

The second place which is just to add a static moderator email, 
normally these things should be done in settings file (YMAL, XML, ect), 
but for this example, I preferred to statically define them. 
So in `src/controller/PostController.php` line `74` moderator email 
should be added. 

That's it, start your favourite web-server and go to this URL (in case of localhost)
`localhost/jobposts/public`

