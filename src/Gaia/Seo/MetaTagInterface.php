<?php namespace Gaia\Seo;


interface MetaTagInterface
{


    public function __construct(array $config = array());
    public function generate();
    public function setTitle($title);
    public function setDescription($description);
    public function setKeywords($keywords);
    public function setFacebookTags($array);
    public function setTwitterDescription($desc);
    public function addMeta($meta, $value = null, $name = 'name');
    public function getTitle();
    public function getTitleSeperator();
    public function getKeywords();
    public function getDescription();
    public function getFacebookTags();
    public function getTwitterDescription();
    public function reset();
}