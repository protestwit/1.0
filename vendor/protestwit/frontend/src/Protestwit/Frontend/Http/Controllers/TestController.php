<?php namespace Protestwit\Frontend\Http\Controllers;

use App\Comment;
use App\Dispatch;
use App\Event;
use App\Tag;
use App\Tweet;
use App\Vote;
use App\Zip;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Routing\Controller;
use Protestwit\Csv\Facades\Csv;
use Protestwit\Csv\Models\ZipsImport;
use Protestwit\Finance\Nyse;
use Protestwit\Frontend\Http\Requests\Dispatch\CommentRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\CommentStoreRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\VoteDownRequest;
use Protestwit\Frontend\Http\Requests\Dispatch\VoteUpRequest;
use Protestwit\Frontend\Http\Requests\Home\IndexRequest;
use Protestwit\Group\Models\Group;
use Weidner\Goutte\GoutteFacade;

class TestController extends Controller
{




    public function index(IndexRequest $request, Group $group)
    {




        $test = 0;


        if($test == 1)
        {
            $zip = Zip::all()->first();

            dd($zip->toArray());

        }

        //Test Import Of Zips
        try {
            $csv = Csv::load(base_path().DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR.'datafiles'.DIRECTORY_SEPARATOR.'usa_zipcodes.csv', ZipsImport::getModel());
        } catch (FileNotFoundException $e) {
            dd($e->getMessage());
            return back();
        }

        $csv->getReader()->process();

        if ($csv->getReader()->hasError()) {
            dd($csv->getReader()->errorString);
        } else {
            $request->session()->flash('notification', [
                'type' => 'success',
                'msg' => 'CSV Imported Successfully',
            ]);
        }
        dd('done');
        return back();



        //Geography

        dd(config('geography'));

        $output = \Os::load('getLegislators',['id' => 'WI','output' => 'json']);
        dd($output);


        //Provides sector total of specified politician's receipts
        $output = \Os::load('orgSummary',['id' => 'D000032305','output' => 'json']);
        dd($output);

        //Provides sector total of specified politician's receipts
        $output = \Os::load('getOrgs',['org' => 'City','output' => 'json']);
        dd($output);

        //Provides sector total of specified politician's receipts
        $output = \Os::load('congCmteIndus',['cmte' => 'HARM','congno' => '114','indus' => 'F10','output' => 'json']);
        dd($output);

        //Provides sector total of specified politician's receipts
        $output = \Os::load('candSector',['cid' => 'N00026914','cycle' => '2014','output' => 'json']);
        dd($output);

        //provides total contributed to specified candidate from specified industry for specified cycle
        $output = \Os::load('candIndByInd',['cid' => 'N00026914','cycle' => '2014','ind' => 'K02','output' => 'json']);
        dd($output);


        //Top industries contributing to a specified politician
        $output = \Os::load('candIndustry',['cid' => 'N00026914','cycle' => '2014','output' => 'json']);
        dd($output);

        //Get Candidate Contributors (Expenses, Spend) Data
        $output = \Os::load('candContrib',['cid' => 'N00026914','cycle' => '2014','output' => 'json']);
        dd($output);

        //Get Candidate Summary (Expenses, Spend) Data
        $output = \Os::load('candSummary',['cid' => 'N00026914','cycle' => '2014','output' => 'json']);
        dd($output);

        //Get legislator information specific to their id
        $output = \Os::load('memPFDprofile',['cid' => 'N00026914','year' => '2016','output' => 'json']);
        dd($output);




        //Get legislators for a particular state
        $output = \Os::load('getLegislators',['id' => 'WI','output' => 'json']);
        dd($output);



        foreach(Tag::all() as $tag)
        {
            $tag->buildHotnessScore();
        }

        dd();




        $v = 'nodapl';

        $tag = Tag::Create(['value' => strtolower($v)]);

        dd($tag->tweets);


        dd($tag->toArray());



        $faker = \Faker\Factory::create();


        $tweet = Tweet::create([
            'id' => $faker->numberBetween(99,99999999),
            'json' => json_encode([]),
            'tweet_text' => 'Test With A #tagincluded',
            'user_id' => $faker->numberBetween(999,99999),
            'user_screen_name' => $faker->word. $faker->numberBetween(1,99),
        ]);



die();





//        $response = \GooglePlaces::placeDetails('ChIJiQmtGEFRDogRPVxlkKz2wPY',[]);
//        dd($response);
        $response = \GooglePlaces::placeAutocomplete('SunCoke Energy');
        foreach($response as $item)
        {
            foreach($item as $address)
            {
                dd($address);
            }

        }

        dd();
        dd($response->items);
        
        $nyse = Nyse::setSymbol('SUN')->quotes;
        $instagram = \Instagram::searchTags('nodapl');



        $event = Event::create([
            'name' => $faker->name,
            'description' => $faker->sentence(),

        ]);

        $group = Group::all()->random()->first();
        $tags = Tag::all()->random()->take(2);
        $comments = Comment::all()->random()->take(2);
        $votes = Vote::all()->random()->take(2);

        $event->groups()->save($group);
        $event->tags()->attach($tags)->save();
        $event->comments()->attach($comments)->save();
        $event->votes()->attach($votes)->save();

        echo "<pre>";
        var_dump($event->groups);
        var_dump($event->tags);
        var_dump($event->comments);
        var_dump($event->votes);







        dd();
        $dispatch = Dispatch::create(
            [
                'content' => 'http://www.inforum.com/opinion/columnists/4169822-column-standing-rock-opposed-pipeline-early-2014-new-tape-reveals',
                'tweet_id' => $faker->numberBetween(99,99999999),
            ]
        );

        $comment = Comment::create([
            'content' => $faker->sentence(),
        ]);

        $dispatch->comments()->save($comment);
        dd($dispatch->comments()->get()->toArray());

        dd();

        $group = Group::all()->first();
        $tweet = Tweet::create([
            'id' => $faker->numberBetween(99,99999999),
            'json' => json_encode([]),
            'tweet_text' => $faker->sentence(),
            'user_id' => $faker->numberBetween(999,99999),
            'user_screen_name' => $faker->word. $faker->numberBetween(1,99),
        ]);

        echo "<pre>";
        $group->tweets()->save($tweet);

        var_dump($tweet->groups->toArray());



        dd($group->tweets->toArray());


        dd();







        $tag = Tag::create([
             'value' => $faker->word,
            ]);




        $group = Group::all()->first();
        $tag = Tag::all();
        $group->tags()->attach($tag);
        dd($group->tags->toArray());
        
        
        dd();






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




}