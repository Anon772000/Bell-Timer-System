import subprocess

subprocess.call(['ffplay -autoexit -nodisp /var/www/html/assets/tones/StandardBell.mp3'], shell=True)
