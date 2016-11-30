# Testing PKGBUILD files

You can contribute to the project by fixing problems in PKGBUILD files which are used to build packages. The best way to build your PKGBUILD's is in a clean chroot environment.

## Building the chroot environment on your Arch Linux install

Run the following commands to initialize your chroot environment for building **ArchStrike** packages.

```
# pacman -S devtools
$ mkdir -p ~/chroot # chroot can be anything that you want, it's just the name for your chroot folder
$ wget https://raw.githubusercontent.com/ArchStrike/pacman-config/master/x86_64/makepkg.conf # this downloads the x86_64 makepkg config for the chroot
$ wget https://raw.githubusercontent.com/ArchStrike/pacman-config/master/x86_64/pacman.conf # this downloads the x86_64 pacman config for the chroot
$ CHROOT=$HOME/chroot # define the CHROOT variable, you will want to put this in your bashrc/zshrc for persistence
# mkarchroot -C pacman.conf -M makepkg.conf $CHROOT/root base-devel # this initializes the chroot environment
```

If you're experiencing problems with the mirrors, generate a pacman mirrorlist using `reflector` and replace your `/etc/pacman.d/mirrorlist` file with the new mirrorlist.

## Building packages in the clean chroot environment

First, make sure your chroot is up to date.

```
# arch-nspawn $CHROOT/root pacman -Syyu
```

To build a package in the chroot, go into the directory containing the `PKGBUILD` file for your package.

```
$ makechrootpkg -c -r $CHROOT
```

The -c flag makes sure that the $CHROOT is cleaned before building anything.

## Testing packages

You might want to test packages in the chroot. You will need to install the package to the chroot in order to do that.

```
# makechrootpkg -c -r $CHROOT -- -i
```

This will initialize a clean chroot, build the package on it then install the package.

You can then test if your package is working properly:

```
# arch-nspawn $CHROOT/$USER <executable_name_of_package>
```

Replace <executable_name_of_package> with the executable of the package.

If you have questions or didn't understand something, contact team@archstrike.org or PM one of the developers in our IRC channel (#archstrike @ freenode.net).
