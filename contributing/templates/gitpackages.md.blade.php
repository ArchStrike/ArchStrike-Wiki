# Template PKGBUILD for Git Packages

```
# Maintainer: ArchStrike <team@archstrike.org>

buildarch=

pkgname="something-git"
pkgver=
pkgrel=
groups=()
arch=()
pkgdesc=
url="https://url.of.the.git.repo"
license=()
depends=()
makedepends=('git')
source=("${pkgname}::git+${url}.git")
sha512sums=('SKIP')

pkgver() {
  cd ${pkgname}
  printf "%s.r%s" "$(git show -s --format=%ci master | sed "s/\ .*//g;s/-//g")" "$(git rev-list --count HEAD)"
}

prepare() {

}

build() {

}

package() {

}
```
