<?php namespace Protestwit\Tweet\Listeners;

use App\Dispatch;
use App\Image;
use App\Tag;
use App\Tweet;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Protestwit\Group\Models\Group;
use Weidner\Goutte\GoutteFacade;

class DispatchAfterCreate
{


    protected $dispatch;
    protected $images;



    public function extractUrls($string)
    {
        $regex = '/https?\:\/\/[^\" \n]+/i';
        preg_match_all($regex, $string, $matches);
        //return (array_reverse($matches[0]));
        return ($matches[0]);
    }


    public function getImages($crawler)
    {
        $images = $crawler->filterXpath("//meta[@name='twitter:image']")->extract(array('content'));

        if(!$images)
        {
            $images = $crawler->filterXpath("//meta[@property='og:image']")->extract(array('content'));

        }
        $images = is_array($images) && isset($images[0]) ? $images[0] : $images;
        return $images;
    }


    public function getHtml(\Symfony\Component\DomCrawler\Crawler $crawler)
    {
        $html = $crawler->html();

        return $html;
    }
    

    public function handle(Dispatch $dispatch)
    {
        \Log::info('Dispatch After Create');
        $this->dispatch = $dispatch;
        $this->images = Image::getModel()->newCollection();
        

        $extracted_urls = $this->extractUrls($dispatch->content);
//        var_dump($extracted_urls);
        foreach($extracted_urls as $url) {
            $crawler = GoutteFacade::request('GET', $url);
//            var_dump($this->getHtml($crawler));
            var_dump($this->getImages($crawler));

            if (is_array($this->getImages($crawler))) {
                foreach ($this->getImages($crawler) as $image) {
                    $image = Image::findOrCreate([
                        'url' => $image,
                    ]);
                    $this->images->add($image);
                }
            }else{
                $image = Image::findOrCreate([
                    'url' => $this->getImages($crawler)
                ]);
                $this->images->add($image);
            }
        }

        foreach($this->images as $image)
        {
            $dispatch->images()->save($image);
        }
        
        dd($this->images->toArray());
        
    }
}