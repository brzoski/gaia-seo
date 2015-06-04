<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\Translatable;
use Vinkla\Translator\Contracts\Translatable as TranslatableContract;

class Seo extends Model implements TranslatableContract
{
	use Translatable;

	protected $table = 'seo';
	protected $fillable = ['meta_title', 'meta_keywords', 'meta_description', 'facebook_title', 'facebook_description', 'facebook_image', 'twitter_title', 'twitter_image', 'twitter_description', 'seoable_type', 'seoable_id'];
	protected $translatedAttributes = ['meta_title', 'meta_keywords', 'meta_description', 'facebook_title', 'facebook_description', 'twitter_title', 'twitter_description'];
	protected $translator = 'App\Models\SeoTranslation';
	

	/**
	 * Polymorphism function
	 * @return type
	 */
	public function seoable()
	{
		return $this->morphTo();
	}


	/**
	 * Create/Update Seo model
	 * @return type
	 */
	public function updateFromInput($input)
    {
    	$this->meta_title 	 	      = $input['meta_title'];
    	$this->meta_keywords 	      = $input['meta_keywords'];
    	$this->meta_description  	  = $input['meta_description'];

    	$this->facebook_title 	      = $input['facebook_title'];
    	$this->facebook_description   = $input['facebook_description'];

    	$this->twitter_title 	      = $input['twitter_title'];
    	$this->twitter_description    = $input['twitter_description'];

    	$this->save();

    	return true;
    }

}
