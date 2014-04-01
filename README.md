These are the scripts we use for the automated installation of our music computers.

Boot procedure
==============
The computers boot with PXE. The DHCP-server tells them where to find the TFTP-server and to boot mscboot.kpxe.
mscboot.kpxe (built from ipxe) requests web/ipxe-boot-config.php which tells him how to proceed.
ipxe-boot-config.php will check whether the computers needs to be (re)installed. If that's not needed it will tell iPXE to boot from disk.
If it needs to be installed it will tell iPXE to load pxelinux.0 from the same TFTP-server.
The ubuntu-installer gets loaded and is configured to start installation automatically and use web/ks.cfg for it's configuration.
ks.cfg will do the basic installation and execute web/install.txt to configure the computer.
web/install.txt will use web/config.php to get information about that computer and will set it up.
At the end of install.txt it will request web/setup-complete.txt which flags the computer doesn't need to be install anymore and reboots.

Standby
=======
The standby-manager will check if nobody has been logged in for a while and put the computer in standby.
There were some problems with the computer deciding to go into (some sort of) standby by itself, which the standby-manager will also prevent.

TODO: Explain the rest
