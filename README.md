# Tutorial Manager
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/282735fb74e647c4b630056271b66d77)](https://www.codacy.com/app/laravel-enso/TutorialManager?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=laravel-enso/TutorialManager&amp;utm_campaign=Badge_Grade)
[![StyleCI](https://styleci.io/repos/85628545/shield?branch=master)](https://styleci.io/repos/85628545)
[![Total Downloads](https://poser.pugx.org/laravel-enso/tutorialmanager/downloads)](https://packagist.org/packages/laravel-enso/tutorialmanager)
[![Latest Stable Version](https://poser.pugx.org/laravel-enso/tutorialmanager/version)](https://packagist.org/packages/laravel-enso/tutorialmanager)

Tutorial management dependency for [Laravel Enso](https://github.com/laravel-enso/Enso).

![Screenshot](https://laravel-enso.github.io/tutorialmanager/screenshots/Selection_023.png)

### Details

- allows for a user friendly way of teaching users how to use the interface of the application
- permits adding, updating and deleting tutorial entries that can be then automatically shown for the selected route
- tutorial entries are displayed using [Bootstrap Tour](http://bootstraptour.com)

### Publishes
- `php artisan vendor:publish --tag=tutorials-component` - the VueJS component
- `php artisan vendor:publish --tag=enso-update` - a common alias for when wanting to update the VueJS component, 
once a newer version is released

### Notes

The [Laravel Enso Core](https://github.com/laravel-enso/Core) package comes with this package included.

### Contributions

are welcome