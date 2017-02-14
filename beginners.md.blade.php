# Beginner's Guide

##  **Contents**

* Downloading ArchStrike
* Installing to a live medium
* Installing ArchStrike on your computer
* Conclusion

###Downloading ArchStrike

1 - Go to the [ArchStrike Website Downloads Section](https://archstrike.org/downloads)

2 - Choose the appropriate image

* For installing on VMware/Virtualbox, scroll down to the `ArchStrike VirtualBox & VMWare OVA` section. Choose your download. After your download is finished, [import the OVA file](https://www.maketecheasier.com/import-export-ova-files-in-virtualbox/). You don't need to follow the rest of this guide.

* For installing on real hardware, pick the right ISO file for your CPU architecture. (`x86_64` is for 64 bit CPUs, `i686` is for 32 bit CPUs)

3 - Start your download by clicking on the link.

NOTE: For the torrent download, you will need a torrent client such as uTorrent or Transmission.

###Installing to a live medium 

1 - Find a live medium to write the ISO file on. (A USB stick 8GB or larger will do)

2 - Writing the ISO. 

* WIndows users: [Download Rufus](https://rufus.akeo.ie/). Follow the steps on the graphical interface to write the ISO to your USB. **Important: Choose DD image mode on Rufus after you press the start button or the ISO won't boot.**

* Linux users: `dd if=file.iso of=/dev/sdX bs=4M status=progress` where `/dev/sdX` is the drive you want to write the ISO on and `file.iso` is the name of the ISO fie.

* Mac users: `dd if=file.iso of=/dev/diskX` where `/dev/diskX` is the drive you want to write the ISO on and `file.iso` is the name of the ISO file. 


###Installing ArchStrike on your computer

1 - Boot your computer from the USB with the ArchStrike live image written. (Take a look [here](http://lifehacker.com/5991848/how-to-boot-from-a-cd-or-usb-drive-on-any-pc) if you don't know how to boot your computer from a USB).

2 - Ensure you're running the latest version of the `archstrike-installer` with

`sudo pacman -Syy && sudo pacman -S archstrike-installer`

3 - Right click on the desktop and select `Install ArchStrike` from the menu. Follow the on-screen instructions.

**IMPORTANT NOTE: If the installer quits without giving any error, [apply the patch to fix it](https://archstrike.org/news/10022). Sorry for the inconvenience.**

###Conclusion

If you followed the steps here and there were no errors, you should be able to use your new ArchStrike installation by removing the USB drive and booting your computer up normally.

**If there is an issue with the installation process:**

* Send a mail to team@archstrike.org with the installer log from `/tmp/archstrike-installer.log` attached. We will try to help you to the best of our abilities.
