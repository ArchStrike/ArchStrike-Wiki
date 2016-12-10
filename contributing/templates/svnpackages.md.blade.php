# Template PKGBUILD for Svn packages

```
# Maintainer: ArchStrike <team@archstrike.org>

buildarch=

pkgname=something-svn
pkgver=
pkgrel=
pkgdesc=""
url="http://url.to.package"
license=()
depends=()
arch=()
makedepends=('subversion')
source=("${pkgname}::svn+http://link.to.svn/trunk")
sha512sums=('SKIP')

pkgver() {
  cd ${pkgname}
  svnversion | tr -d [A-z]
}

build() {
}

package() {
}
```
