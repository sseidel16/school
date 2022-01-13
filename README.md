# school: Docker Containers for School IT Department

This repository contains Docker configuration aimed toward a private school IT department. It is a work in progress. It currently includes an nginx reverse proxy in front of Moodle LMS, and Exchange mail server, with plans to integrate with Nextcloud and Onlyoffice in the future, and replace Exchange mail server with something similar to mailcow.

## Features:
* Reverse-proxy for single IP address
* Moodle LMS with PostgreSQL server
* Catch-all smtp server and web interface to messages using [MailHog](https://github.com/mailhog/MailHog/)
* Zero-configuration approach

## Prerequisites
* [Docker](https://docs.docker.com) and [Docker Compose](https://docs.docker.com/compose/) installed

## 3HACADEMY Quick start

```bash
# Prerequisites:
# 1. create directory somehwere .../moodle
#    moodle directory does not need write permissions (docker will make read only volume)
# 2. clone moodle repo (https://github.com/moodle/moodle) contents into moodle directory
#    git clone -b MOODLE_311_STABLE https://github.com/moodle/moodle.git /path/to/moodle
# 3. create directory somewhere .../data *with full read/write permissions* see below
#    chmod 777 data
# 5. add the following line to /etc/hosts for testing
#    127.0.0.1	staff.3hacademy.org
#    127.0.0.1	mail.3hacademy.org
#    127.0.0.1	learning.3hacademy.org
# 6. Create ssl crt and key (both named school) in directory .../ssl
#    openssl req -newkey rsa:2048 -nodes -keyout school.key -x509 -days 365 -out school.crt
#    you must have files similar to the following:
#    .../ssl/school.crt
#    .../ssl/school.key

# Set up path to Moodle code
export SCHOOL_MOODLE_WWWROOT=/path/to/moodle
# Set up path to data
export SCHOOL_DATAROOT=/path/to/data
# set proper school domain
export SCHOOL_DOMAIN=3hacademy.org
# set ssl dir with key and crt for nginx
export SCHOOL_SSL_DIR=/path/to/ssl
# set mail server ip
export SCHOOL_MAIL_IP=199.66.173.173

# Ensure customized config.php for the Docker containers is in place
cp config.docker-template.php $SCHOOL_MOODLE_WWWROOT/config.php

# Start up containers
bin/school-docker-compose up -d

# Visit staff.3hacademy.org

# Shut down and destroy containers
bin/school-docker-compose down
```

## Contributions

Are extremely welcome!
