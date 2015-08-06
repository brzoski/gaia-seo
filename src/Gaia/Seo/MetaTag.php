<?php namespace Gaia\Seo;

use Gaia\Seo\MetaTagInterface;
use Illuminate\Config\Repository as Config;


class MetaTag implements MetaTagInterface
{

    protected $title;
    protected $title_seperator;
    protected $description;
    protected $keywords = [];
    protected $metatags = [];
    protected $facebooktags = [];
    protected $twitterdescription;
    protected $config;
    protected $webmasterTags = [
        'google'   => "google-site-verification",
        'bing'     => "msvalidate.01",
        'alexa'    => "alexaVerifyID",
        'pintrest' => "p:domain_verify",
        'yandex'   => "yandex-verification"
    ];

   	

    /**
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        $this->config = new Config($config);
    }

   
    public function generate()
    {
        $this->loadWebMasterTags();

        $title        = $this->getTitle();
        $description  = $this->getDescription();
        $keywords     = $this->getKeywords();
        $metatags     = $this->metatags;
        $facebooktags = $this->getFacebookTags();
        $twitterdescription = $this->getTwitterDescription();

        $html   = [];

        if($title):
            $html[] = "<title>$title</title>";
        endif;

        if(!empty($description)):
            $html[] = "<meta name=\"description\" content=\"{$description}\" />";
        endif;

        if (!empty($keywords)):
            $html[]   = "<meta name=\"keywords\" content=\"{$keywords}\" />";
        endif;

        foreach ($metatags as $key => $value):
            $name    = $value[0];
            $content = $value[1];
            $html[]  = "<meta {$name}=\"{$key}\" content=\"{$content}\" />";
        endforeach;


        foreach($facebooktags as $key => $val)
        {
            $html[]  = "<meta property=og:\"{$key}\" content=\"{$val}\" />";
        }

        if (!empty($twitterdescription)):
            $html[]   = "<meta name=\"twitter:description\" content=\"{$twitterdescription}\" />";
        endif;


        return implode(PHP_EOL, $html);
    }


    /**
     * Sets the title
     *
     * @param string $title
     * @param string $suffix
     * @param boolean $has_suffix
     *
     * @return MetaTagsContract
     */
    public function setTitle($title)
    {
        // clean title
        $title = strip_tags($title);

        // store title
        $this->title = $this->parseTitle($title);

        return $this;
    }


    /**
     * @param string $description
     *
     * @return MetaTagsContract
     */
    public function setDescription($description)
    {
        // clean and store description
        $this->description = strip_tags($description);

        return $this;
    }


    /**
     * Sets the list of keywords, you can send an array or string separated with commas
     * also clears the previously set keywords
     *
     * @param string|array $keywords
     *
     * @return MetaTagsContract
     */
    public function setKeywords($keywords)
    {
        // store keywords
        $this->keywords = $keywords;

        return $this;
    }


    /**
     * Add a custom meta tag.
     *
     * @param string|array $meta
     * @param string       $value
     * @param string       $name
     *
     * @return MetaTagsContract
     */
    public function addMeta($meta, $value = null, $name = 'name')
    {
        if (is_array($meta)):
            foreach ($meta as $key => $value):
                $this->metatags[$key] = array($name, $value);
            endforeach;
        else:
            $this->metatags[$meta] = array($name, $value);
        endif;
    }

    /**
     * Takes the title formatted for display
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title ?: $this->config->get('defaults.title', null);
    }


    /**
     * takes the title that was set
     *
     * @return string
     */
    public function getTitleSeperator()
    {
        return $this->title_seperator ?: $this->config->get('defaults.separator', ' - ');
    }

    /**
     * Get the Meta keywords.
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords ?: $this->config->get('defaults.keywords', []);
    }

    /**
     * Get the Meta description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description ?: $this->config->get('defaults.description', null);
    }


    /**
     * Takes the title formatted for display
     *
     * @return string
     */
    public function getFacebookTags()
    {
        if(!$this->facebooktags)
        {
            $this->facebooktags = [
                'title' => $this->config->get('defaults.title', null),
                'description' => $this->config->get('defaults.description', null),
                'image' => $this->config->get('defaults.image', null),
                'url' => url('/')
            ];
        }
        return $this->facebooktags;
    }


    public function getTwitterDescription()
    {
        return $this->twitterdescription ?: $this->config->get('defaults.description', null);
    }


    /**
     * Reset all data.
     *
     * @return void
     */
    public function reset()
    {
        $this->description   = null;
        $this->metatags      = [];
        $this->keywords      = [];
    }

    /**
     * Get parsed title.
     *
     * @param string $title
     * @param string @suffix
     *
     * @return string
     */
    protected function parseTitle($title)
    {
        return $this->config->get('defaults.title') ? $title . $this->getTitleSeperator() . $this->config->get('defaults.title', null) : $title;
    }


    public function setFacebookTags($array)
    {
        $this->facebooktags = $array;
    }



    public function setTwitterDescription($desc)
    {
        $this->twitterdescription = $desc;
    }


    protected function loadWebMasterTags()
    {
        foreach ($this->config->get('webmaster_tags', []) as $name => $value):
            if (!empty($value)):
                $meta = array_get($this->webmasterTags, $name, $name);
                $this->addMeta($meta, $value);
            endif;
        endforeach;
    }

}