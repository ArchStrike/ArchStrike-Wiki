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

**If you are having issues importing the key from the keyserver, copy and paste the [public key](/wiki/pubkey) into `keyfile.asc` on your computer and run the following commands:**
```
# pacman-key --init
# dirmngr < /dev/null
# pacman-key --add keyfile.asc
# pacman-key --lsign-key 9D5F1C051D146843CDA4858BDE64825E7CBC0D51
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

**Note**: To use the `archstrike-testing` repository you should _also_ add the following block (See the [repositories](/wiki/repositories) page for more information):

```conf
[archstrike-testing]
Include = /etc/pacman.d/archstrike-mirrorlist
```

Refresh the pacman package database again to reflect the changes above by running:

```bash
# pacman -Syy
```

## II. Groups and Packages

The list of ArchStrike packages from each repository can be viewed by running:

```bash
$ pacman -Sl archstrike
$ pacman -Sl archstrike-testing
```

The list of ArchStrike groups available can be viewed by running:

```bash
$ pacman -Sg | grep archstrike
```

The list of packages in a specific group can be viewed by running:

```bash
$ pacman -Sgg | grep archstrike-<groupname>
```
