# Template PKGBUILD for generic packages

```
# Maintainer: ArchStrike <team@archstrike.org>

buildarch=

pkgname=
pkgver=
pkgrel=
groups=()
arch=()
pkgdesc=
url="https://url.to.package"
license=()
depends=()
makedepends=()
source=("https://link.to/source-${pkgver}.tar.gz")
sha512sums=()

prepare() {
  # make any modifications here
}

build() {
  # build package here
}

package() {
  # install files to proper places here
}
```
