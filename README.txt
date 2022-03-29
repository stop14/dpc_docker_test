INSTALLATION
- copy sample.env as .env
- Edit .env file and change the PROJECTNAME. Also change the LOCAL_STORAGE_DIR if you want to store the codebase, database, and Drupal files folder elsewhere (like an external drive)
- Create a ./codebase folder to house your composer-based Drupal instance.
- Install your codebase. Do this before running the containers. If you miss this step docker compose
  may install some files in your codebase folder, preventing you from cloning your repo.
- Copy ./settings/settings.local.php into the ./codebase/docroot/sites/default directory of your codebase.
- If this is a new build without a settings file, copy ./settings/settings.php into ./codebase/docroot/sites/default as well.
- Copy files into ./files folder
- For existing sites, create a ./codebase/backup folder and move sql code there. Make sure that it's not compressed (e.g. a .sql or .mysql file and not a .tar.gz or .zip file)
- Log into the container via docker exec -ti containername-drupal bash
- If replacing a site with a new database, delete the old database via drush sql-drop (make sure you have a backup if there's anything important you want to keep in the db)
- For existing sites, load the database via drush sql-cli / SOURCE /var/www/drupal/backup/backup-filename.sql
- Exit the SQL-CLI (via exit) if you’re in there. 
- Clear the drupal cache via drush cr

NOTE: REBUILDING THE DOCKER CONTAINER
- The docker container uses an Agile Docker image from DockerHub. The current version will be pulled when you run docker-compose up.
- If you want to build a container from scratch, run docker-compose -f docker-compose-rebuild.yml up.
- This will create a new container that runs the Dockerfiles in the /agilebase and /agilebase-db 
  folders.
- The new container can be committed, tagged, and pushed to Dockerhub to capture permanent changes 

NOTE: SSL CERTIFICATES
- You may need to update self-signed certificates inside the container.
- The ssl folder is volume mapped. Inside the container it can be found at /etc/ssl
- Outside the container it can be found at ./ssl
- To update certs:
   - create /etc/ssl/certs directory, if it doesn't exist
   - run update-ca-certificates from inside the container
   - if that doesn't work, try apt-get install ca-certificates first