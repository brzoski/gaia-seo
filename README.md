## gaia-seo package
Adds seo model with ability to polymorphic relation with other models (news, page ...). 
The package will publish the following:
* views (a form partial)
* migrations (in database folder)
* models

#### Installation
Run the following command in your terminal 
```
composer require eandraos/gaia-seo
```

Then register this service provider with Laravel in config/app.php
```
Gaia\Seo\GaiaSeoServiceProvider
```

Publish the different files
```
php artisan vendor:publish
```

#### Usage
add the polymorphic relation in another model
```
// ... in News model for example  

public function seoable()
{
	return $this->morphTo();
}
```

in controller method (to add a news with its seo tags)
```
$seo = new Seo;
$seo->updateFromInput($input); //method in model that will save the input (form partial)
$news->seo()->save($seo);
```
