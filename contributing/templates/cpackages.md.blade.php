# Template PKGBUILD for C or similar source packages

```
# Maintainer: ArchStrike <team@archstrike.org>

buildarch=

pkgname=some-package
pkgver=
pkgrel=1
groups=()
arch=()
pkgdesc=
url="https://url.of.package"
license=()
depends=()
makedepends=()
source=("https://link.to/source-${pkgver}.tar.gz")
sha512sums=()

prepare() {

}

build() {
  cd source-${pkgver}
  ./configure --prefix=/usr
  make

}

package() {
  cd source-${pkgver}
  make DESTDIR=${pkgdir} install # add DESTDIR patch in prepare() if DESTDIR doesn't exist in Makefile
}
```
