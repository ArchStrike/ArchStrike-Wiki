# Template PKGBUILD for python2/3 library packages


```
# Maintainer: ArchStrike <team@archstrike.org>

buildarch=

pkgname=python-something #python2-something
pkgver=
pkgrel=
groups=()
arch=()
pkgdesc=
url="http://url.of.package"
license=()
depends=('python') #python2
makedepends=('python-setuptools') #python2-setuptools
source=("https://link.to/source-${pkgver}.tar.gz")
sha512sums=()

prepare() {
  # fix shebangs to python2 if source is python2
  grep -iRl 'python' source-${pkgver} | xargs sed -i 's|python$|python2|g'
}

build() {
  cd source-${pkgver}
  python setup.py build
}

package() {
  cd source-${pkgver}
  python setup.py install --root=${pkgdir} --optimize=1
}
```
