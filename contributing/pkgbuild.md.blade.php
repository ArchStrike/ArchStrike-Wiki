# Writing a PKGBUILD

[Template PKGBUILD for Git packages](/wiki/contributing/templates/gitpackages)

## Parts of a PKGBUILD

### Variables

`buildarch` : This is a variable specific to the ArchStrike PKGBUILD files. You can find more information about this variable on the [contribution guide](/wiki/contribution/details)

`pkgname` : The name of the package.

`pkgver` : The version number of the package.

`pkgrel` : The build iteration of the package. Updates to the PKGBUILD without updating the `pkgver` means this variable should be bumped by 1.

`groups` : Groups the package will be in.

`arch` : Architectures this package is supported on. This defines what the `buildarch` variable will be.

`pkgdesc` : Short description of the package.

`url` : URL for the package (for example the github page or the website)

`license` : License of the package. Use `custom` for uncommon licenses.

`depends` : Dependencies of the package.

`makedepends` : Dependencies for making the package.

`source` : Source file or git/svn repository link for the package.

`sha512sums` : Checksums for the source. Use `SKIP` for -git or -svn packages. Run `updpkgsums` after adding the `source` to automatically generate and add sums.

### Functions

#### pkgver() | **Only for -git/-svn packages**

This function generates the `pkgver` variable for -git/-svn packages.

* Leave `pkgver` empty while writing the PKGBUILD. Afterwards run `makepkg` or `makechrootpkg` to generate the real pkgver.

* `pkgver` cannot contain spaces or hyphens (-). Using sed to correct this is common.

#### prepare() | **Only needed when a modification needs to be made to source**

A preparation function. We can make changes to the files in this function. A common use is to patch files.

#### build() | **Only needed when source needs to be built before installation**

A build function. We build the package source in this function if it needs to be built.

#### package() | **ESSENTIAL**

The main function for packaging the source. Here we install the necessary files to the fakeroot.

* The `package()` function is the only required function in a PKGBUILD. If you must only copy files into their respective directories to install a program, do not put it in the `build()` function, put that in the `package()` function.
