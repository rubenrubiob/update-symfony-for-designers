<?php
//Composer update may take a long time, so we disable the default time limit
set_time_limit(-1);

//Set paths
$phpBin = '/path/to/your/php/binary';
$composerBin = '/path/to/your/composer/binary';
$baseFolder = '/path/to/your/application/main/folder';

//Composer needs this variable set in order to work.
putenv('COMPOSER_HOME=/path/to/your/home/folder/');

//Set here all the commands that you want to execute
$commands = array(
    array(
        'title'     => 'Updating composer...',
        'command'   => "$composerBin -d=$baseFolder --no-scripts -n update  2>&1",
    ),
    array(
        'title'     => 'Updating database...',
        'command'   => "$phpBin $baseFolder/app/console doctrine:schema:update --force",
    ),
    array(
        'title'     => 'Installing assets...',
        'command'   => "$phpBin $baseFolder/app/console assets:install --symlink $baseFolder/web/",
    ),
    array(
        'title'     => 'Clearing cache...',
        'command'   => "$phpBin $baseFolder/app/console cache:clear",
    ),
);

//Send the header, so we can correctly read the information
header('Content-type: text/html; charset=utf-8');

//Once we are set, begin the execution
foreach($commands as $c) {
    //We are printing the information as we are processing the commands
    echo '<strong>'.$c['title'].'</strong><br />';
    ob_flush();
    flush();

    //Execute the command
    $output = null;
    exec($c['command'], $output);

    //Print the output
    foreach($output as $o)
    {
        echo $o.'<br />';
        ob_flush();
        flush();
    }
    echo '<br />';
}