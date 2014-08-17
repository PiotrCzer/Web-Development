<?php
class Flickr
{
    private $apiKey = '2ba25f83313d24c95e821e637ae77490';
    
    public function __construct()
    {
    }
    
    public function search($query = null)
    {
        // API documentation: https://www.flickr.com/services/api/flickr.photos.search.html
        $search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $this->apiKey . '&tags=' . urlencode($query) . '&per_page=14&sort=relevance&format=php_serial&extras=geo&has_geo=true';
        $result = file_get_contents($search);
        $result = unserialize($result);
        return $result;
    }
}
?>