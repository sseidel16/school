<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = getenv('MOODLE_DOCKER_DBTYPE');
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'moodledb';
$CFG->dbname    = getenv('MOODLE_DOCKER_DBNAME');
$CFG->dbuser    = getenv('MOODLE_DOCKER_DBUSER');
$CFG->dbpass    = getenv('MOODLE_DOCKER_DBPASS');
$CFG->prefix    = 'm_';
$CFG->dboptions = ['dbcollation' => getenv('MOODLE_DOCKER_DBCOLLATION')];

$CFG->wwwroot   = getenv('MOODLE_DOCKER_WWWROOT');
$CFG->sslproxy  = true;

$CFG->dataroot  = '/var/www/moodledata';
$CFG->admin     = 'admin';
$CFG->directorypermissions = 0777;
$CFG->smtphosts = 'mailhog:1025';
$CFG->noreplyaddress = 'noreply@example.com';

// Path parameters
$CFG->pathtophp = '/usr/local/bin/php';

$CFG->cronclionly = 0;

// Debug options - possible to be controlled by flag in future..
// $CFG->debug = (E_ALL | E_STRICT); // DEBUG_DEVELOPER
// $CFG->debugdisplay = 1;
// $CFG->debugstringids = 1; // Add strings=1 to url to get string ids.
// $CFG->perfdebug = 15;
// $CFG->debugpageinfo = 1;
// $CFG->allowthemechangeonurl = 1;
// $CFG->passwordpolicy = 0;

require_once(__DIR__ . '/lib/setup.php');
