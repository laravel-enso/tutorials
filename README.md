<!--h-->
# Tutorial Manager

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/282735fb74e647c4b630056271b66d77)](https://www.codacy.com/app/laravel-enso/TutorialManager?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=laravel-enso/TutorialManager&amp;utm_campaign=Badge_Grade)
[![StyleCI](https://styleci.io/repos/85628545/shield?branch=master)](https://styleci.io/repos/85628545)
[![License](https://poser.pugx.org/laravel-enso/tutorialmanager/license)](https://https://packagist.org/packages/laravel-enso/tutorialmanager)
[![Total Downloads](https://poser.pugx.org/laravel-enso/tutorialmanager/downloads)](https://packagist.org/packages/laravel-enso/tutorialmanager)
[![Latest Stable Version](https://poser.pugx.org/laravel-enso/tutorialmanager/version)](https://packagist.org/packages/laravel-enso/tutorialmanager)
<!--/h-->

Tutorial management dependency for [Laravel Enso](https://github.com/laravel-enso/Enso).

[![Screenshot](https://laravel-enso.github.io/tutorialmanager/screenshots/Selection_023_thumb.png)](https://laravel-enso.github.io/tutorialmanager/screenshots/Selection_023.png)

[![Watch the demo](https://laravel-enso.github.io/tutorialmanager/screenshots/Selection_026_thumb.png)](https://laravel-enso.github.io/tutorialmanager/videos/demo_01.webm)
<sup>click on the photo to view a short demo in compatible browsers</sup>

### Features

- allows for a user friendly way of teaching users how to use the interface of the application
- permits adding, updating and deleting tutorial entries that can be then automatically shown for the selected route
- tutorials start automatically the first time you visit a page that has any tutorial entries set
- the tutorial functionality may be restarted from the right-hand sidebar, using the `?` button

### Under the Hood

- the `tutorials` table is used for the tutorial module and has several key attributes:
   - `permission_id` -  the permission where they're in use, since permissions are tied to routes, and we're using permissions to know which tutorials to load for a page
   - `element` - identifies the element within the DOM, and may be an id, in which case it should be prefixed with a `#` or a class, in which case it should be prefixed with `.`
   - `placement` -  sets the position of the tutorial dialog, relative to the DOM element, and can be: top, bottom, left sau right.
   - `order` - gives the order in which a particular tutorial element should be displayed, in the context of the available tutorials for a certain page.
- tutorial entries are displayed using [Bootstrap Tour](http://bootstraptour.com)

### Publishes
- `php artisan vendor:publish --tag=tutorials-component` - the VueJS component
- `php artisan vendor:publish --tag=enso-update` - a common alias for when wanting to update the VueJS component,
once a newer version is released

### Notes

The [Laravel Enso Core](https://github.com/laravel-enso/Core) package comes with this package included.

<!--h-->
### Contributions

are welcome. Pull requests are great, but issues are good too.

### License

This package is released under the MIT license.
<!--/h-->