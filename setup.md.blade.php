# Instructions to set up the repository (for Arch Linux users)

** If you want to install ArchStrike from scratch, you need to look at the [Beginner's Guide](/wiki/beginners).**

## I. Install the Repository

**Notes**:

* This guide assumes you already have a working copy of [Arch Linux](https://www.archlinux.org)
* Lines beginning with `#` are command line operations that should be run as root or using `sudo`
* Lines beginning with `$` are command line operations that can be run as either root _or_ a user

### 1. Setup the master ArchStrike repository mirror

Add the following to the bottom of your `/etc/pacman.conf`:

```conf
[archstrike]
Server = https://mirror.archstrike.org/$arch/$repo
```

**Note**: x86_64 users should also ensure that the `multilib` repository is enabled.

Refresh the pacman package database by running:

```bash
# pacman -Syy
```

### 2. Bootstrap and install the ArchStrike keyring

Initialize the pacman keyring and start dirmngr, then import and sign the key used to sign the `archstrike-keyring` package:

```bash
# pacman-key --init
# dirmngr < /dev/null
# pacman-key -r 9D5F1C051D146843CDA4858BDE64825E7CBC0D51
# pacman-key --lsign-key 9D5F1C051D146843CDA4858BDE64825E7CBC0D51
```

**If you are having issues importing the key from the keyserver, run the following commands to manually download the public key:**
```
# pacman-key --init
# dirmngr < /dev/null
# wget https://archstrike.org/keyfile.asc
# pacman-key --add keyfile.asc
# pacman-key --lsign-key 9D5F1C051D146843CDA4858BDE64825E7CBC0D51
```

SHA512 of the keyfile.asc file: `46997d19790b15f023b5e7c548d35f17f745a879ed035b8d1dbfc970dee502508951cf7ac1cd037921e2c7812c6bbe05f492d5df400882bf6c5ffdf1a10214e4`

You can run the following commands to verify the checksum:
```
$ wget https://archstrike.org/keyfile-checksum
$ sha512sum -c keyfile-checksum
keyfile.asc: OK
```

### 3. Install required packages

Install `archstrike-keyring` and `archstrike-mirrorlist` to import the keyring and setup the mirrorlist:

```bash
# pacman -S archstrike-keyring
# pacman -S archstrike-mirrorlist
```

### 4. Configure pacman to use the mirrorlist

Open `/etc/pacman.conf` and replace the following block you added above:

```conf
[archstrike]
Server = https://mirror.archstrike.org/$arch/$repo
```

with a new block that uses the mirrorlist instead:

```conf
[archstrike]
Include = /etc/pacman.d/archstrike-mirrorlist
```

Refresh the pacman package database again to reflect the changes above by running:

```bash
# pacman -Syy
```

## II. Groups and Packages

The list of ArchStrike packages can be viewed by running:

```bash
$ pacman -Sl archstrike
```

The list of ArchStrike groups available can be viewed by running:

```bash
$ pacman -Sg | grep archstrike
```

The list of packages in a specific group can be viewed by running:

```bash
$ pacman -Sgg | grep archstrike-<groupname>
```
