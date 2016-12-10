# Writing a PKGBUILD

[Template PKGBUILD for Git packages](/wiki/contributing/pkgbuilds/gitpackages)

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

#### pkgver()

This function generates the `pkgver` variable for -git/-svn packages. **Only for -git/-svn packages.**

#### prepare()

A preparation function. We can make changes to the files in this function. A common use is to patch files. **Not essential**

#### build()

A build function. We build the package source in this function if it needs to be built. **Not essential**

#### package()

The main function for packaging the source. Here we install the necessary files to the fakeroot. **Essential**
