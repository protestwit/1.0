<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Comment;
use App\Dispatch;
use App\Tag;
use App\Tweet;
use App\Vote;
use Illuminate\Routing\Controller;
use Protestwit\Frontend\Http\Requests\Dispatch\CommentRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\CommentStoreRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\VoteDownRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\VoteUpRequest;
use Protestwit\Frontend\Http\Requests\Home\IndexRequest;
use Protestwit\Group\Models\Group;
use Weidner\Goutte\GoutteFacade;

class TestController extends Controller
{


    public function extractUrls($string)
    {
        $regex = '/https?\:\/\/[^\" \n]+/i';
        preg_match_all($regex, $string, $matches);
        //return (array_reverse($matches[0]));
        return ($matches[0]);
    }

    public function getMetaDescription(\Symfony\Component\DomCrawler\Crawler $crawler)
    {
        $meta_description = $crawler->filterXpath("//meta[@name='title']")->extract(array('content'));
        $meta_description = is_array($meta_description)? $meta_description[0] : $meta_description;

        return $meta_description;
    }

    public function getMetaTitle(\Symfony\Component\DomCrawler\Crawler $crawler)
    {
        $meta_title = $crawler->filterXpath("//meta[@name='description']")->extract(array('content'));
        $meta_title = is_array($meta_title) && isset($meta_title[0])? $meta_title[0] : $meta_title;

        return $meta_title;
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



    public function index(IndexRequest $request, Group $group)
    {

        Dispatch::create(
           [
               'content' => 'http://www.inforum.com/opinion/columnists/4169822-column-standing-rock-opposed-pipeline-early-2014-new-tape-reveals',
               'tweet_id' => 804247391385751553,
           ]
        );


        dd();

        $dispatch = Dispatch::orderByRaw("RAND()")->first();
        echo($dispatch->content);
        $extracted_urls = $this->extractUrls($dispatch->content);

        foreach($extracted_urls as $url)
        {
            $crawler = GoutteFacade::request('GET', $url);

            if (is_array($this->getImages($crawler))) {
                foreach ($this->getImages($crawler) as $image) {
                    echo '<img src="' . $image . '"/>';
                }
            }else{
                echo '<img src="' . $this->getImages($crawler) . '"/>';
            }
            var_dump($this->getMetaTitle($crawler));
            dd($this->getHtml($crawler));
            dd($this->getMetaDescription($crawler));


            $urls = $crawler
                ->filterXpath('//img')
                ->extract(array('src'));
            dd($urls);

            \Log::info($url);

            die();

        }


        dd();



        $group = Group::find(1);
        dd($group->tweets()->toSql());
        var_dump($group->toArray());


        dd();


       $tweet = Tweet::where('id','=','803825705360519168')->first();
        dd($tweet->tags);
    }

   


}