# PiVPN GUI WG - Stable - State: Usable

**Based on [OpenRSD](https://github.com/mitchellurgero/openrsd) and [PiVPN GUI](https://github.com/dpinse/pivpn-gui)

### What is PiVPN GUI
PiVPN GUI is a set of PHP scripts, JS, HTML, and BootStrap CSS to create a beautiful, easy to use, responsive Dashboard to manage PiVPN for the RPi2-3.

### What is PiVPN GUI WG
PiVPN GUI WG is an update of the PiVPN GUI that supports WireGuard and newer versions of the PiVPN Project and cli tools. Note that this version of the GUI does not currently support OpenVPN, only WireGuard.

PiVPN GUI WG seems to be stable but has only seen minimal testing. Please mention any issues you may find here on GitHub. 


### How to install

1. This script is only tested on Raspbian, please make sure you are running a distro based on that, or running Raspbian.
2. Once Raspbian (Or Raspbian based OS) is installed, run (Note: Some of the following dependencies may not be readily available for the OS/kernel versions you are using - you may have to get creative. Also, the following is just the BARE MINIMUM to get pivpgui to run properly. PiVPN and Samba must be installed separately!):
	
```sudo apt-get update && sudo apt-get install git apache2 php5.6 libapache2-mod-php5.6 php5.6-mcrypt expect geoip-bin```
	
3. Once that is done, run "sudo nano /etc/apache2/apache2.conf" Edit the User and Group to the user/group pi, it should look like this.
	

	```
	
	...Some Config stuff...
	User pi
	Group pi
	...Some Config stuff...
	
	```
4. Then run: ```sudo service apache2 restart```
5. Then run: ```cd /var/www/html```
6. Then run: ```rm -f index.html``` *Optional!
7. Then run: ```git clone https://github.com/magicaljose/pivpn-gui-wg```

Please visit [pivpn.io](http://pivpn.io) for more information.
