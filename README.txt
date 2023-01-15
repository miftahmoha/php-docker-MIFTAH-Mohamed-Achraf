INFORMATIONS: Last Name: MIFTAH, First Name: Mohamed Achraf

This my WEB-DEV project that I've developed during ING-1 with PHP connected to a MYSQL database and phpMyAdmin interface.

I've dockerized the later, making it into a  development stack infrastructure. There is a volume attached for the MYSQL database in the document 'sqlvolume' to save and keep files.

When the container is run, the website will connect to the SQL server. A network will be created by default with 'docker-compose' command that'll assure such connection.

To run the docker container, open a terminal in the following directory and entrer 'docker-compose up'.

To modify the code, it's possible through the directory 'src'. But, one must delete the contrainers with 'docker-compose down' and to delete the old project image before running 'docker-compose up' again.

The website can be accessed in localhost:8080 and the phpMyAdmin will be accessed in localhost:8081. To connect to the phpMyAdmin interface, enter 'root' as username and 'secret' as password.