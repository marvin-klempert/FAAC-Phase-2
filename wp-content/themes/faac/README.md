# fwd-boilerplate-theme
WordPress boilerplate theme for use as a starting point for development

## Features
* [Webpack](https://webpack.js.org/) for packaging assets
* Modern JavaScript support
* [SCSS](https://sass-lang.com/) for writing styles
* Image optimization for GIF, JPEG, PNG, and WebP

## Requirements
Mostly normal WordPress requirements, but you'll need a couple of extra things if you don't have them. This theme does require terminal commands, but only a couple!

* [WordPress](https://wordpress.org), obviously
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.2
* [Composer](https://getcomposer.org/doc/00-intro.md) >= 1.8.4
* [Node.js](https://nodejs.org/en/) >= 11.9.0
* [Yarn](https://yarnpkg.com/en/) >= 1.13.0

This theme also requires you to use Advanced Custom Fields as a plugin once your theme is set up, which you can get [here](https://www.advancedcustomfields.com/).

## Theme Installation
Put this project folder into your themes folder. Then, from the terminal:
```
cd /your/themes/folder
$ composer install
```
By default, there are no PHP library dependencies, but this will create the ```vendor``` directory and ```autoload.php``` file. This should take very little time. Once that is complete:
```
$ yarn install
```
Wait for the installation to complete, and you're pretty much done!

## Build & Watch
This theme includes two terminal commands: ```yarn build``` and ```yarn watch```. ```yarn build``` will package assets together and ```yarn watch``` will do the same, but also keep Webpack running on any updated files.

## What's Included
Aside from the Webpack setup, there are a few things included in the theme:

### Separate ```app``` Folder
Not everything has to be in a gigantic ```functions.php``` file! Theme functionality is broken up in folders under the ```app``` directory for simpler code management.

### Page Templates Folder
All page templates are loaded from the ```page-templates``` directory

### Helper PHP Functions
* ```fwd_nav_menu()``` creates a navigation menu without the cruft of ```wp_nav_menu()```
* ```fwd_sub_nav()``` creates sub-navigation menu items. Required by ```fwd_nav_menu()```
* ```get_partial()``` includes files from the ```layouts``` folder
* ```get_picsum_img_url()``` generates a placeholder image URL with the [Picsum](https://picsum.photos/) API
* ```get_placeholder_img_url()``` generates a placeholder image URL using the [Placeholder.com](https://placeholder.com/) API
* ```get_svg()``` to return SVG element code

*Note*: By default, the ```get_xxx()``` functions to not output code, but only return it. To output code, either use ```echo get_xxx()``` or, where one exists, use ```the_xxx()```. Refer to the ```helpers``` directory for which functions have which capabilities.

### ACF Local JSON Support
This theme will save and load ACF field groups via local JSON files in the ```resources``` directory

### TypeKit Support
The theme ships with an included setting for a [TypeKit](https://typekit.com/) collection ID, if needed.

