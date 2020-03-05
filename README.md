# SlackAttack [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com) [![GPL Licence](https://badges.frapsoft.com/os/gpl/gpl.svg?v=103)](https://opensource.org/licenses/GPL-3.0/) [![Canadian Mental Health Association](https://i.imgur.com/GvXBeY4.png)](https://cmha.ca/donate)
Python software with a PHP webpanel that injects a JS keylogger into the Slack desktop client. This software is confirmed to be working with slack versions 4.3.4 and 4.4 beta 3.

# Setup

## Webpanel
Upload the files from the site folder to your website. Create a database with a table called `messagelog` and one field (VARCHAR 255) called `message`.

Modify `config.php` to include your database username, password, and database name. You can also set a new username/password for the webpanel here.

## Script
Install the requirements listed in `requirements.txt`. Open up `SlackAttack.py` with your IDE/text editor and modify line 10 to include the link to your `upload.php` file.

## Building
Download and install PyInstaller. Build the file but ensure you include the `--noconsole` and `--onefile` options.

# Features
Currently this program is very simple. It injects a JavaScript keylogger into the latest version of Slack. The process is as follows:

- Locates Slack and finds the newest version.
- Kills the slack process.
- Extracts the `app.asar` file into a folder called app.
- Modifies `main-preload-entry-point.bundle.js` to include the keylogger.
- Deletes the `app.asar` file to ensure that slack runs off the app folder.

The keylogger will log all keys entered, and when the user hits "Enter" it will send the currently logged message to your server as POST data. 

# Issues or planned changes
This software isn't perfect, but I will be doing my best to improve it.

- The webpanel currently looks terrible.
- Finding the newest version is kind of janky and should be improved.
- Only works on windows.
- Runs off the app folder when it should repackage it into app.asar.

# Note
This software was made as a proof of concept and is not inteded to be use maliciously. I am not responsible for any legal issues that arise from you using this.
