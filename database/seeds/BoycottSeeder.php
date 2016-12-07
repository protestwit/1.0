<?php

use Illuminate\Database\Seeder;

class BoycottSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_created_parent_groups = 10;

        $faker = Faker\Factory::create();

        \App\Boycott::truncate();
        \App\Company::truncate();
        \App\Place::truncate();

        $boycott = [
            [
                'name' => 'Sunoco',
                'symbol' => 'SUN',
                'public_tag' => 'defundsun',
                'is_public' => 1,
                'statistics' =>[
                    [
                        'name' => 'Hazardous Liquid Incidents Since 2006',
                        'type' => 'value_over_timespan',
                        'start_date' => '1-1-2006',
                        'end_date' => '3-1-2016',
                        'value' => '257',
                        'label' => 'Hazardous Liquid Incedents',
                        'cite' => 'https://en.wikipedia.org/wiki/Sunoco',
                    ]
                ],
                'events' =>
                    [
                        [
                            'name' => 'John Heins Wildlife Refuge Oil Leak',
                            'description' => '1900 gallons of oil leaked into John Heanz Wildlife Refuge',
                            'date' =>     '2000',
                            'cite' => 'https://en.wikipedia.org/wiki/Sunoco'
                        ],
                        ['name' => 'Helicopter Crash Senator John Heinz, 2 Children Dead',
                            'description' => '1900 gallons of oil leaked into John Heanz Wildlife Refuge',
                            'date' => 'April 4, 1991',
                            'cite' => 'https://en.wikipedia.org/wiki/Sunoco'
                        ],
                    ],
                'links' => [
                    [
                        'url' => ''
                    ]
                ],
                'affiliates' => [
                    [
                        'name' => 'NASCAR',
                        'symbol' => 'TRK',
                        'cite' => 'https://en.wikipedia.org/wiki/Sunoco',
                    ],
                    [
                        'name' => 'Travel Plazas',
                        'cite' => 'https://en.wikipedia.org/wiki/Sunoco',
                    ],
                    [
                        'name' => 'Verizon Indy Car Series',
                        'cite' => 'https://en.wikipedia.org/wiki/Sunoco',
                    ],
                ],
                'subsidiaries' => [
                    [
                        'name' => 'Aloha Petroleum',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Refining and Marketing Company',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sunoco, Inc. (R&M)',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sunco Foundation',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Radnor Corp',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun-Del Pipeline LLC',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Executive Services Company',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Triad Carriers Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Oil Argentina Ltd',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Oil Export Co',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Oil Company (U.K) Ltd',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Oil Company',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun-Del Services, Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Coke Co',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sunoco Receivables Corporation, Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Atlantic Refining & Marketing Co',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'SunCoke Energy, Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Mascot, Inc (MA)',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sunoco Overseas Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Geollogic & Seismic Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'The Claymont Investment Company',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Transport LLC',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Coal & Coke Co',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Oil International, Inc',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Alternate Energy Corp',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],
                    [
                        'name' => 'Sun Services Corp',
                        'cite' => 'https://www.google.com/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=sunco%20subsidiaries'
                    ],

                ]

            ],
            [
                'name' => 'Citibank',
                'symbol' => 'C',
                'public_tag' => 'defundcitigroup',
                'is_public' => 1,
                'employees' =>[
                    [
                        'name' => 'Richard F Hohlt',
                        'title' => 'lobbyist',
                        'cite' => 'https://en.wikipedia.org/wiki/Citigroup',
                    ],
                    [
                        'name' => 'Richard F Hohlt',
                        'title' => 'lobbyist',
                        'cite' => 'https://en.wikipedia.org/wiki/Citigroup',
                        'links' => [
                            ['url' => 'https://en.wikipedia.org/wiki/Richard_F._Hohlt']
                        ],
                    ],
                    [
                        'name' => 'Edward Skyler',
                        'title' => 'lobbyist',
                        'cite' => 'https://en.wikipedia.org/wiki/Citigroup',
                        'links' => [
                            ['url' => 'https://en.wikipedia.org/wiki/Edward_Skyler']
                        ],
                    ],
                ],
                'statistics' =>[
                    [
                        'name' => 'Part Of The 2008 Global Financial Crisis',
                        'type' => 'statement',
                        'start_date' => '1-1-2008',
                        'end_date' => '12-31-2008',
                        'value' => '45 Billion',
                        'label' => 'Dollars Given To Citigroup',
                        'cite' => 'https://en.wikipedia.org/wiki/Citigroup',
                    ]
                ],
                'events' =>
                    [

                    ],
                'links' => [
                    ['url' => 'https://en.wikipedia.org/wiki/Citigroup']
                ],
                'affiliates' => [
                    [
                        'name' => 'American Airlines',
                        'symbol' => 'AAL',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'Hilton',
                        'url' => 'www3.hilton.com',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'American Express',
                        'symbol' => 'AXP',
                        'url' => 'www.americanexpress.com',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'AT&T',
                        'symbol' => 'T',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'Amazon',
                        'symbol' => 'AMZN',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'Citgo',
                        'url' => 'citgo.com',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'Dell',
                        'symbol' => 'DELL',
                        'url' => 'dell.com',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
                    [
                        'name' => 'Expedia',
                        'url' => 'www.expedia.com',
                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
                    ],
//                    [
//                        'name' => 'ExxonMobil',
//                        'symbol' => 'XOM',
//                        'url' => 'www.exonmobil.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Ford',
//                        'symbol' => 'F',
//                        'url' => 'www.ford.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Macys',
//                        'url' => 'macys.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Office Depot',
//                        'url' => 'ntb.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Phillips 66',
//                        'url' => 'phillips66.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Polaris',
//                        'url' => 'www.polaris.com/',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Bloomingdales',
//                        'url' => 'bloomingdales.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Dunlop',
//                        'url' => 'www.delsfarmsupply.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Bailey Banks and Biddle',
//                        'url' => 'https://www.baileybanksandbiddle.com/',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Big O Tires',
//                        'url' => 'bigotires.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Choice Card',
//                        'url' => 'choice-strategies.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Blains Farm & Fleet',
//                        'url' => 'farmandfleet.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//
//                    [
//                        'name' => 'Brand Source',
//                        'url' => 'brandsource.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Brooks Brothers',
//                        'url' => 'brooksbrothers.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//
//
//                    [
//                        'name' => 'Dels Feed and Farm Supply',
//                        'url' => 'www.delsfarmsupply.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//
//
//                    [
//                        'name' => 'Fred Meyer Jewlers',
//                        'url' => 'fredmeyerjewlers.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Indian Motorcycle',
//                        'url' => 'indianmotorcycle.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Kelly Tires',
//                        'url' => 'kellytires.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'La Quinta',
//                        'url' => 'lq.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Lincoln',
//                        'url' => 'lincoln.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Littman Jewlers',
//                        'url' => 'littmanjewlers.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//
//                    [
//                        'name' => 'Merchants Tire',
//                        'url' => 'merchantstire.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Best Buy',
//                        'url' => 'bestbuy.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'NTB National Tire & Battery',
//                        'url' => 'ntb.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//
//                    [
//                        'name' => 'Pacific Sales',
//                        'url' => 'www.pacificsales.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//
//                    [
//                        'name' => 'Conoco',
//                        'url' => 'conocophillips.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'RadioShack',
//                        'url' => 'radioshack.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Rogers Jewlers',
//                        'url' => 'rogersjewlers.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Ross Simons Jewlers',
//                        'url' => 'ross-simons.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Sears',
//                        'url' => 'sears.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Shell',
//                        'url' => 'shell.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Sidney Thomas Jewlers',
//                        'url' => 'sidneythomas.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Staples',
//                        'url' => 'staples.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Sunoco',
//                        'url' => 'sunoco.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Bombay Company',
//                        'url' => 'bombaycompany.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Brooks Brothers',
//                        'url' => 'brooksbrothers.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Childrens Place',
//                        'url' => 'childrensplace.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Goodyear',
//                        'url' => 'goodyear.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Home Depot',
//                        'url' => 'homedepot.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Tire Kingdom',
//                        'url' => 'tirekingdom.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Tractor Supply Co',
//                        'url' => 'tractorsupply.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Verizon',
//                        'url' => 'verizon.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Volkswagen',
//                        'url' => 'volkswagen.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
//                    [
//                        'name' => 'Zales',
//                        'url' => 'zales.com',
//                        'cite' => 'https://www.citi.com/CRD/html/Citi_Affiliates.html',
//                    ],
                ],
                'subsidiaries' => [
                    [
                        'name' => 'Banamex',
                        'symbol' => 'BANAMEX',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Aeromexico',
                        'symbol' => 'AEROMEX',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Diners Club International',
                        'symbol' => 'CLUB',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank India',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citi Private Bank',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Global Consumer Banking Singapore',
                        'url' => 'citibank.com.sg',
                        'symbol' => 'CBKKY',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Global Consumer Banking Singapore',
                        'url' => 'citibank.com.sg',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Korea',
                        'url' => 'citibank.co.kr',
                        'symbol' => 'CBKKY',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Red Roof Inn',
                        'telephone' => '614-744-2600',
                        'fax' => '614-224-9724',
                        'url' => 'redroof.com',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Hong Kong',
                        'url' => 'citibank.com.hk',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Czech Republic',
                        'url' => 'citibank.cz',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Institutional Clients',
                        'url' => 'citibank.com/icg/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Canada',
                        'url' => 'citibank.com/canada/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Australia',
                        'url' => 'citibank.com.au/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Nikko Cordial',
                        'url' => 'https://www.smbcnikko.co.jp/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citi Technology Services Ltd',
                        'url' => 'www.citi.com/citi/press/2009/090120e.htm',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Remy International',
                        'url' => 'www.delcoremy.com',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Metalmark Capital',
                        'url' => 'www.metalmarkcapital.com',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup Pty',
                        'url' => 'www.citibank.com.au',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citicorp Railmark Inc',
                        'url' => 'https://en.wikipedia.org/wiki/Citicorp_Railmark_Inc._(Citirail)',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Yield Book Inc',
                        'url' => 'https://www.yieldbook.com/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup Global Markets Japan',
                        'url' => 'https://en.wikipedia.org/wiki/Citigroup_Global_Markets_Japan',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank China',
                        'url' => 'https://www.citibank.com.cn',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Romania',
                        'url' => 'www.citibank.ro/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Taiwan',
                        'url' => 'https://www.citibank.com.tw',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Banco Nacional de Mexico',
                        'url' => 'www.bnamericas.com/company-profile/en/banco-nacional-de-mexico-sa-banamex',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'CitiCapital',
                        'url' => 'http://www.wikinvest.com/stock/Citigroup_(C)/Citicapital',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Japan Ltd',
                        'url' => 'https://www.citibank.co.jp',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Salmon Brothers International LTD',
                        'url' => 'http://www.bloomberg.com/profiles/companies/3648383Z:LN-citigroup-global-markets-ltd',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup Funding Inc',
                        'url' => 'http://www.bloomberg.com/profiles/companies/ESK:US-citigroup-funding-inc',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Lava Trading Inc',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=122328',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup Global Services Limited',
                        'url' => 'http://www.citi.com/citi/press/2008/081231a.htm',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citi Fund Services Inc',
                        'url' => 'https://www.citibank.com/mss/products/investor_svcs/fund/fa.html',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Bisys Group',
                        'url' => 'http://www.referenceforbusiness.com/history/St-Th/The-BISYS-Group-Inc.html',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Old Lane Partners',
                        'url' => 'http://blogs.wsj.com/marketbeat/2008/06/12/a-brief-history-of-old-lane-partners/',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citifinancial Consumer Finance India',
                        'url' => 'https://www.linkedin.com/company/citifinancial-consumer-finance-india-ltd',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank A.S',
                        'url' => 'www.citibank.com.tr',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Associates First Capital',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=347788',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citi International Financial Services',
                        'url' => 'https://citi.netxinvestor.com/web/cifs/login',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup Global Markets(asia)',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=23898085',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup Morgage Loan Trust Inc',
                        'url' => 'http://www.bloomberg.com/profiles/companies/0726702D:US-citigroup-mortgage-loan-trust-inc',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citigroup North America',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=3544845',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Banamex USA',
                        'url' => 'banamexusa.com',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'CitiFinancial Auto Corporation',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=4204485.com',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citibank Colombia S.A',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=21010581',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citicorp Trust Bank FSB',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=28045624',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citi Residential Lending',
                        'url' => 'http://www.bloomberg.com/research/stocks/private/snapshot.asp?privcapId=37508534',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                    [
                        'name' => 'Citicorp Credit Services Inc',
                        'url' => 'http://www.hoovers.com/company-information/cs/company-profile.citicorp_credit_services_inc_(usa).9d8dda9c0e0abe9f.html',
                        'symbol' => 'C',
                        'cite' => 'https://www.google.com/search?q=citibank+nyse&oq=citibank+nyse&aqs=chrome..69i57j0l5.3584j0j9&sourceid=chrome&ie=UTF-8#q=citigroup+subsidiaries',
                    ],
                ]

            ],



        ];
        
        foreach($boycott as $boycott) {
            $companyData = [
                'name' => $boycott['name'],
                'symbol' => $boycott['symbol'],
                'public_tag' => $boycott['public_tag'],
                'is_public' => $boycott['is_public'],
            ];
            $existingCompany = \App\Company::findOrCreate($companyData);
            $existingCompany->statistics = $boycott['statistics'];
            $existingCompany->events = $boycott['events'];
            $existingCompany->links = $boycott['links'];
            $existingCompany->affiliates = $boycott['affiliates'];
            $existingCompany->subsidiaries = $boycott['subsidiaries'];

            $boycottData = [
                'name' => $boycott['name'],
                'symbol' => $boycott['symbol'],
                'public_tag' => $boycott['public_tag'],
                'is_public' => $boycott['is_public'],
            ];
                        
            $boycott = \App\Boycott::findOrCreate($boycottData);
            $boycott->companies()->save($existingCompany);

            $boycott->companies = $existingCompany->subsidiaries;
            
            
            
            
        }
    }
}
