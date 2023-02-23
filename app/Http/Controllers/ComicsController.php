<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = [
            'movies' => '/movies',
            'tv' => '/tv',
            'games' => '/games',
            'collectibles' => '/collectibles',
            'videos' => '/videos',
            'fans' => '/fans',
            'news' => '/news',
            'shop' => '/shop'
        ];

        $menu_footer = [
            "comics" => [
                'Characters' => '/characters',
                'Comics' => '/comics',
                'Movies' => '/movies',
                'Tv' => '/tv',
                'Games' => '/games',
                'Videos' => '/videos',
                'News' => '/news',
            ],
            "shop" => [
                'Shop DC' => '/shop-dc',
                'Shop DC Collectibles' => '/shop-dc-collectibles',
            ],
            "dc" => [
                'Term Of Use' => '/term-of-use',
                'Privacy policy (New)' => '/privacy-policy',
                'Ad Choices' => '/ad-choices',
                'Advertising' => '/advertising',
                'Jobs' => '/jobs',
                'Subscriptions' => '/subscriptions',
                'Talent Workshops' => '/talent-workshops',
                'CPSC Certificates' => '/cpsc-certificates',
                'Ratings' => '/ratings',
                'Shop Help' => '/shop-help',
                'Contact Us' => '/contact-us',

            ],
            "sites" => [
                'DC' => '/dc',
                'MAD Magazine' => '/mad-magazine',
                'DC Kids' => '/dc-kids',
                'DC Universe' => '/dc-universe',
                'DC Power Visa' => '/dc-power-visa',
            ],
            "img_social" => [
                'footer-facebook.png',
                'footer-twitter.png',
                'footer-youtube.png',
                'footer-pinterest.png',
                'footer-periscope.png'
            ],
        ];
        $comics = Comic::all();

        return view('comics.index', compact('comics', 'menu', 'menu_footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $menu = [
            'movies' => '/movies',
            'tv' => '/tv',
            'games' => '/games',
            'collectibles' => '/collectibles',
            'videos' => '/videos',
            'fans' => '/fans',
            'news' => '/news',
            'shop' => '/shop'
        ];

        $menu_footer = [
            "comics" => [
                'Characters' => '/characters',
                'Comics' => '/comics',
                'Movies' => '/movies',
                'Tv' => '/tv',
                'Games' => '/games',
                'Videos' => '/videos',
                'News' => '/news',
            ],
            "shop" => [
                'Shop DC' => '/shop-dc',
                'Shop DC Collectibles' => '/shop-dc-collectibles',
            ],
            "dc" => [
                'Term Of Use' => '/term-of-use',
                'Privacy policy (New)' => '/privacy-policy',
                'Ad Choices' => '/ad-choices',
                'Advertising' => '/advertising',
                'Jobs' => '/jobs',
                'Subscriptions' => '/subscriptions',
                'Talent Workshops' => '/talent-workshops',
                'CPSC Certificates' => '/cpsc-certificates',
                'Ratings' => '/ratings',
                'Shop Help' => '/shop-help',
                'Contact Us' => '/contact-us',

            ],
            "sites" => [
                'DC' => '/dc',
                'MAD Magazine' => '/mad-magazine',
                'DC Kids' => '/dc-kids',
                'DC Universe' => '/dc-universe',
                'DC Power Visa' => '/dc-power-visa',
            ],
            "img_social" => [
                'footer-facebook.png',
                'footer-twitter.png',
                'footer-youtube.png',
                'footer-pinterest.png',
                'footer-periscope.png'
            ],
        ];
        $comic = Comic::findOrFail($id);

        return view('comics.show', compact('comic', 'menu', 'menu_footer'));
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
