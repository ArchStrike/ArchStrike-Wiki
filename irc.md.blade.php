# Connecting to ArchStrike IRC

In the ArchStrike IRC channel, you can talk to the developers and join the community chat for ArchStrike.

This guide will cover, step-by-step, how to set up the HexChat IRC client and connect to the ArchStrike IRC channel.

**Note: This guide assumes you are using Archlinux/ArchStrike.**

## Installing an IRC Client

For the sake of simplicity, we will use the HexChat IRC client throughout the guide. You can use another client if you wish so. `weechat` is recommended for a lightweight and command-line alternative to HexChat.

* Download HexChat by running :`# pacman -S hexchat` as root.

## Connecting to freenode

* Launch HexChat from your desktop environment.

 This will be how it looks on your first launch: https://imgur.com/a/N73sz

* Press `Connect`.

 This is how it will look: https://imgur.com/a/DOZj4

* Choose `Nothing, I'll join a channel later` for now, and press `OK`.

 Type this down: `/msg NickServ REGISTER <password_you_pick> <your_email>` on the message bar, replacing `password_you_pick` with the password you want for your freenode account and `your_email` with your e-mail address.
 
 Example: `/msg NickServ REGISTER hunter2 some_legit@email.com`

* Verify your e-mail by clicking the link you receive.

* Time to change some settings.

 Click on `HexChat` on the top bar.

 Choose `Network List...`

 It will look like the first screen.

 Now click on `freenode` and choose `Edit...` on the right side.

 This is how it should look: https://imgur.com/a/GWaUe

 Uncheck `Use global user information`

 Next to `Nick name:`, enter the nickname you used while connecting.

 `Login method:` should be `SASL (username + password)`

 Enter your password next to `Password:`

 Next to `Servers`, you can see `Autojoin channels`.

 Click on `Add` after you switch to `Autojoin channels` tab.

 Add `#archstrike` to the channels list.

 Press `Close`.

## You're set! 

You can close HexChat now. When you start it again, it will automatically identify with the IRC server and connect to the ArchStrike IRC channel.
