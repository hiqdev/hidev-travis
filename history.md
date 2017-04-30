# hiqdev/hidev-travis

## [Under development]

    - [e3ca730] 2017-04-30 renamed `hidev.yml` <- .hidev/config.yml [sol@hiqdev.com]
    - [ba6d018] 2017-04-30 redoing for new hidev [sol@hiqdev.com]
    - [aba4794] 2017-03-23 Removed global requirement on FXP/composer-asset-plugin [d.naumenko.a@gmail.com]
    - [a145e72] 2016-10-17 added getting language from package [sol@hiqdev.com]
    - [dd0d81c] 2016-10-16 added manual PHP installation when not PHP language [sol@hiqdev.com]

## [0.4.0] - 2016-05-21

- Changed: redone to `composer-config-plugin`
    - [e09c223] 2016-05-21 redoing to composer-config-plugin [sol@hiqdev.com]
    - [c83e225] 2016-05-21 redoing to composer-config-plugin [sol@hiqdev.com]

## [0.3.5] - 2016-04-15

- Fixed `hiqdev/composer-extension-plugin` version constraint
    - [7565a3c] 2016-04-15 fixed `hiqdev/composer-extension-plugin` version constraint [sol@hiqdev.com]

## [0.3.4] - 2016-04-14

- Fixed build with asset-packagist
    - [7fcf300] 2016-04-14 fixed build with asset-packagist [sol@hiqdev.com]
- Changed to `hidev-config` <- `extension-config`
    - [2f4865c] 2016-04-13 redone to `hidev-config` <- `extension-config` [sol@hiqdev.com]

## [0.3.3] - 2016-03-30

- Changed `extension-config` <- `yii2-extraconfig`
    - [9638234] 2016-03-30 redoing to `extension-config` <- `yii2-extraconfig` [sol@hiqdev.com]

## [0.3.2] - 2016-03-22

- Fixed badge with github `full_name`
    - [ec053e3] 2016-03-22 fixed badge with github `full_name` [sol@hiqdev.com]

## [0.3.1] - 2016-01-17

- Fixed: improved `before_install` section
    - [776b362] 2016-01-17 improved `before_install` section [sol@hiqdev.com]
    - [2f43c7f] 2016-01-17 improved `before_install` section [sol@hiqdev.com]
    - [9fd04b8] 2016-01-17 improved `before_install` section [sol@hiqdev.com]
    - [74e506a] 2016-01-17 + `travis` default goal to imitate running on Travis [sol@hiqdev.com]

## [0.3.0] - 2016-01-15

- Fixed tests
    - [490419f] 2016-01-15 phpcsfixed [sol@hiqdev.com]
    - [8a5b26f] 2016-01-15 + gitignore phars [sol@hiqdev.com]
    - [d3df8fb] 2016-01-15 fixed tests [sol@hiqdev.com]
- Removed `before_install` processing, use .travis.yml
    - [d9c1c34] 2016-01-14 removed `before_install` processing - use .travis.yml [sol@hiqdev.com]
    - [f046b5b] 2016-01-14 + `before_install` processing [sol@hiqdev.com]
- Changed: renamed to `hidev-travis` <- `hidev-travis-ci`
    - [685d387] 2016-01-13 finishing renaming [sol@hiqdev.com]
    - [c8cc9f0] 2016-01-13 renaming to travis <- travis-ci to avoid ambiguity [sol@hiqdev.com]
- Changed: redone with yii2-extraconfig
    - [10881cd] 2016-01-14 removed Plugin.php in favour of yii2-extraconfig.php [sol@hiqdev.com]
    - [c8a8a0f] 2016-01-06 changed config structure [sol@hiqdev.com]
    - [cc68296] 2016-01-06 fixed typo [sol@hiqdev.com]
    - [4aec11c] 2016-01-06 redoing with yii2-extraconfig [sol@hiqdev.com]

## [0.2.2] - 2015-12-23

- Fixed minor issue
    - [6fdf02b] 2015-12-23 php-cs-fixed [sol@hiqdev.com]

## [0.2.1] - 2015-12-23

- Fixed heavy typo
    - [df2f9e6] 2015-12-23 fixed heavy typo [sol@hiqdev.com]

## [0.2.0] - 2015-12-23

- Added more Travis actions: `before/after_install/script/success/failure`
    - [824bf2d] 2015-12-23 + more Travis actions: `before/after_install/script/success/failure` [sol@hiqdev.com]
- Added `markdownBadges`
    - [c119d69] 2015-12-23 fixed build [sol@hiqdev.com]
    - [9a67fda] 2015-12-23 + `markdownBadges` [sol@hiqdev.com]

## [0.0.4] - 2015-12-18

- Removed global require fxp asset plugin and composer fixed version
    - [c30294c] 2015-12-18 + manual fixed composer version in `before_install` [sol@hiqdev.com]
    - [f9bd6ff] 2015-12-18 + manual require fxp plugin in `before_install` [sol@hiqdev.com]
    - [b08bad2] 2015-12-18 removed fxp asset plugin and composer fixed version from travis [sol@hiqdev.com]
    - [14191e1] 2015-12-18 removed global require fxp plugin [sol@hiqdev.com]
- Fixed tests
    - [3e7f0ba] 2015-12-14 + require-dev yii2-pluginmanager [sol@hiqdev.com]
    - [f54ff68] 2015-12-14 fixed tests [sol@hiqdev.com]

## [0.0.3] - 2015-12-14

- Added wget hidev.phar
    - [0b38d77] 2015-12-14 fixing build [sol@hiqdev.com]
    - [a666ee6] 2015-12-14 + wget hidev.phar [sol@hiqdev.com]
    - [c79d554] 2015-12-03 + sort global requires [sol@hiqdev.com]

## [0.0.2] - 2015-11-24

- Added tests and Travis CI
    - [f60dad0] 2015-11-24 + tests and Travis CI [sol@hiqdev.com]
- Added actual install and script actions
    - [22decc8] 2015-11-24 +  to make hidev defaults [sol@hiqdev.com]
    - [e390746] 2015-11-23 + actual install and script actions [sol@hiqdev.com]
    - [5fbc875] 2015-11-21 + build proper composer requires [sol@hiqdev.com]

## [0.0.1] - 2015-11-20

- Added basics
    - [3723280] 2015-11-20 require dev hidev modules [sol@hiqdev.com]
    - [7da138c] 2015-11-20 trying travis [sol@hiqdev.com]
    - [63198ee] 2015-11-19 + actual .travis.yml generation [sol@hiqdev.com]
    - [c51c401] 2015-11-19 fixed basics [sol@hiqdev.com]
    - [842f147] 2015-11-18 adding actual code [sol@hiqdev.com]
    - [96d9f94] 2015-11-18 renamed to `hidev-travis-ci` [sol@hiqdev.com]
    - [f9189d2] 2015-07-26 php-cs-fixed [sol@hiqdev.com]
    - [6e0b536] 2015-07-25 php-cs-fixed [sol@hiqdev.com]
    - [42bf696] 2015-07-25 trying [sol@hiqdev.com]
    - [8f91367] 2015-07-25 inited [sol@hiqdev.com]

## [Development started] - 2015-07-25

[e09c223]: https://github.com/hiqdev/hidev-travis/commit/e09c223
[c83e225]: https://github.com/hiqdev/hidev-travis/commit/c83e225
[7565a3c]: https://github.com/hiqdev/hidev-travis/commit/7565a3c
[7fcf300]: https://github.com/hiqdev/hidev-travis/commit/7fcf300
[2f4865c]: https://github.com/hiqdev/hidev-travis/commit/2f4865c
[9638234]: https://github.com/hiqdev/hidev-travis/commit/9638234
[ec053e3]: https://github.com/hiqdev/hidev-travis/commit/ec053e3
[776b362]: https://github.com/hiqdev/hidev-travis/commit/776b362
[2f43c7f]: https://github.com/hiqdev/hidev-travis/commit/2f43c7f
[9fd04b8]: https://github.com/hiqdev/hidev-travis/commit/9fd04b8
[74e506a]: https://github.com/hiqdev/hidev-travis/commit/74e506a
[490419f]: https://github.com/hiqdev/hidev-travis/commit/490419f
[8a5b26f]: https://github.com/hiqdev/hidev-travis/commit/8a5b26f
[d3df8fb]: https://github.com/hiqdev/hidev-travis/commit/d3df8fb
[d9c1c34]: https://github.com/hiqdev/hidev-travis/commit/d9c1c34
[f046b5b]: https://github.com/hiqdev/hidev-travis/commit/f046b5b
[685d387]: https://github.com/hiqdev/hidev-travis/commit/685d387
[c8cc9f0]: https://github.com/hiqdev/hidev-travis/commit/c8cc9f0
[10881cd]: https://github.com/hiqdev/hidev-travis/commit/10881cd
[c8a8a0f]: https://github.com/hiqdev/hidev-travis/commit/c8a8a0f
[cc68296]: https://github.com/hiqdev/hidev-travis/commit/cc68296
[4aec11c]: https://github.com/hiqdev/hidev-travis/commit/4aec11c
[6fdf02b]: https://github.com/hiqdev/hidev-travis/commit/6fdf02b
[df2f9e6]: https://github.com/hiqdev/hidev-travis/commit/df2f9e6
[824bf2d]: https://github.com/hiqdev/hidev-travis/commit/824bf2d
[c119d69]: https://github.com/hiqdev/hidev-travis/commit/c119d69
[9a67fda]: https://github.com/hiqdev/hidev-travis/commit/9a67fda
[c30294c]: https://github.com/hiqdev/hidev-travis/commit/c30294c
[f9bd6ff]: https://github.com/hiqdev/hidev-travis/commit/f9bd6ff
[b08bad2]: https://github.com/hiqdev/hidev-travis/commit/b08bad2
[14191e1]: https://github.com/hiqdev/hidev-travis/commit/14191e1
[3e7f0ba]: https://github.com/hiqdev/hidev-travis/commit/3e7f0ba
[f54ff68]: https://github.com/hiqdev/hidev-travis/commit/f54ff68
[0b38d77]: https://github.com/hiqdev/hidev-travis/commit/0b38d77
[a666ee6]: https://github.com/hiqdev/hidev-travis/commit/a666ee6
[c79d554]: https://github.com/hiqdev/hidev-travis/commit/c79d554
[f60dad0]: https://github.com/hiqdev/hidev-travis/commit/f60dad0
[22decc8]: https://github.com/hiqdev/hidev-travis/commit/22decc8
[e390746]: https://github.com/hiqdev/hidev-travis/commit/e390746
[5fbc875]: https://github.com/hiqdev/hidev-travis/commit/5fbc875
[3723280]: https://github.com/hiqdev/hidev-travis/commit/3723280
[7da138c]: https://github.com/hiqdev/hidev-travis/commit/7da138c
[63198ee]: https://github.com/hiqdev/hidev-travis/commit/63198ee
[c51c401]: https://github.com/hiqdev/hidev-travis/commit/c51c401
[842f147]: https://github.com/hiqdev/hidev-travis/commit/842f147
[96d9f94]: https://github.com/hiqdev/hidev-travis/commit/96d9f94
[f9189d2]: https://github.com/hiqdev/hidev-travis/commit/f9189d2
[6e0b536]: https://github.com/hiqdev/hidev-travis/commit/6e0b536
[42bf696]: https://github.com/hiqdev/hidev-travis/commit/42bf696
[8f91367]: https://github.com/hiqdev/hidev-travis/commit/8f91367
[e3ca730]: https://github.com/hiqdev/hidev-travis/commit/e3ca730
[ba6d018]: https://github.com/hiqdev/hidev-travis/commit/ba6d018
[aba4794]: https://github.com/hiqdev/hidev-travis/commit/aba4794
[a145e72]: https://github.com/hiqdev/hidev-travis/commit/a145e72
[dd0d81c]: https://github.com/hiqdev/hidev-travis/commit/dd0d81c
[Under development]: https://github.com/hiqdev/hidev-travis/compare/0.4.0...HEAD
[0.4.0]: https://github.com/hiqdev/hidev-travis/compare/0.3.5...0.4.0
[0.3.5]: https://github.com/hiqdev/hidev-travis/compare/0.3.4...0.3.5
[0.3.4]: https://github.com/hiqdev/hidev-travis/compare/0.3.3...0.3.4
[0.3.3]: https://github.com/hiqdev/hidev-travis/compare/0.3.2...0.3.3
[0.3.2]: https://github.com/hiqdev/hidev-travis/compare/0.3.1...0.3.2
[0.3.1]: https://github.com/hiqdev/hidev-travis/compare/0.3.0...0.3.1
[0.3.0]: https://github.com/hiqdev/hidev-travis/compare/0.2.2...0.3.0
[0.2.2]: https://github.com/hiqdev/hidev-travis/compare/0.2.1...0.2.2
[0.2.1]: https://github.com/hiqdev/hidev-travis/compare/0.2.0...0.2.1
[0.2.0]: https://github.com/hiqdev/hidev-travis/compare/0.0.4...0.2.0
[0.0.4]: https://github.com/hiqdev/hidev-travis/compare/0.0.3...0.0.4
[0.0.3]: https://github.com/hiqdev/hidev-travis/compare/0.0.2...0.0.3
[0.0.2]: https://github.com/hiqdev/hidev-travis/compare/0.0.1...0.0.2
[0.0.1]: https://github.com/hiqdev/hidev-travis/releases/tag/0.0.1
