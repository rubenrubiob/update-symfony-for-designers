# Update Symfony2 for designers

We have a local, shared server managed with [ServerPilot](https://serverpilot.io/) at our company, where the designers work with HTML, CSS and more with projects in [Symfony2](https://symfony.com/). We have taught them how to work with git using some GUI tool as [SourceTree](https://www.sourcetreeapp.com/), so they are able to pull changes. But still, they had some problems when the programmers added new composer dependencies, made changes to the database… as these are changes that require some CLI executions after pulling the changes. For them to be independent —no dependency is always a good thing— I wrote this simple script that can be accessed from the browser and that executes some Symfony2 usual commands after pulling changes.

## How to use

To use this script, follow the steps:
1. Download the ```update.php``` file and place it somewhere accessible from your browser.
1. Change the paths to binaries and folders where marked.
1. Add or remove commands as you like.
1. Access the script from your browser.

## Notes

Depending on your filesystem, you may need to change the permissions to files. I didn’t have any problems when working with ServerPilot, as the system username and the webserver username are the same. If you have some problems, try to set the permissions as indicated at the [Symfony2 installation guide](http://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup).

The scripts is intended to send the information as it processes it, using the PHP functions [ob_flush](http://php.net/manual/en/function.ob-flush.php) and [flush](http://php.net/manual/en/function.flush.php). It may not work depending on your server configuration.

If you have any correction, any suggestion… just let me know!