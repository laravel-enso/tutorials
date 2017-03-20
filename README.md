# Log Manager

Library for LaravelEnso tutorials management

# Don't forget to

php artisan vendor:publish --tag=tutorialmanager-migrations
php artisan vendor:publish --tag=tutorialmanager-resources
php artisan migrate

add in permission.php model the following relation

>>>
    public function tutorials()
    {
        return $this->hasMany('LaravelEnso\TutorialManager\Tutorial');
    }
>>>

## Upgrade from laravel-enso v2

Correct the includes
