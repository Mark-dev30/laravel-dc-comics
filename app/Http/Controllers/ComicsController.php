<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* Bonus 1 */
use Illuminate\Support\Facades\Validator;
use App\Models\Comic;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Funzione per il reindirizzamento alla pagina index.blade.php(cartella comics) e il passaggio dei dati
    public function index()
    {

        /* Passo i due array associativi. L'array '$menu' è il menu del header.
        L'array $menu_footer è il menu del footer */
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
        //Prendo tutto dalla tabella. Collegamento con il file model Comic.php
        $comics = Comic::all();

        //Ritorno la pagina index.blade.php della cartella comic
        //Con compact passo alla pagina index $comics(array contenente i record della tabella) e i due array dei menu
        return view('comics.index', compact('comics', 'menu', 'menu_footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Funzione per il reindirizzamento alla pagina create.blade.php(cartella comics) e il passaggio dei dati
    //Funzione che permette la creazione di un fumetto
    public function create()
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

        //Reindirizzamento alla cartella comics, al file create.blade.php
        //Con compact passiamo i due array con i menu
        return view('comics.create', compact('menu', 'menu_footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //CON QUESTA FUNZIONE ESEGUIAMO LA LOGICA
    public function store(Request $request)
    {

        // Creiamo le regole di validità utilizzando il metodo validate() fornito dall'oggetto Illuminate\Http\Request
        /* $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'thumb' => 'required|max:255',
            'price' => 'required|max:255',
            'series' => 'required|max:255',
            'sale_date' => 'nullable',
            'type' => 'required|max:255'

        ]); */


        /* $form = $request->all(); */

        $form = $this->validation($request->all());

        //Creiamo un nuovo record
        $newComic = new Comic();

        //QUESTO EQUIVALE
        /* $newComic->title = $form['title'];
        $newComic->description = $form['description'];
        $newComic->thumb = $form['thumb'];
        $newComic->price = $form['price'];
        $newComic->series = $form['series'];
        $newComic->sale_date = $form['sale_date'];
        $newComic->type = $form['type']; */


        $newComic->fill($form); // A SCRIVERE QUESTO. CONDIZIONE CHE IL NAME DEL FORM è UGUALE AL NOME DELLA COLONNA.

        //SALVIAMO IL NUOVO RECORD
        $newComic->save();

        //LA FUNZIONE REDIRECT() REINDIRIZZA AD UN ALTRA PAGINA
        //LA FUNZIONE ROUTE() E' LA ROTTA 
        return redirect()->route('comics.show', ['comic' => $newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //FUNZIONE PER IL RENDIRIZZAMENTO ALLA PAGINA SHOW.BLADE.PHP(CARTELLA COMICS) E IL PASSAGGIO DEI DATI
    //MOSTRA LA PAGINA DETTAGLIO DEL SINGOLO FUMETTO
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
        //FindOrFail TROVA LELEMENTO ALL'INTERNO DELLA TABELLA TRAMITE ID
        $comic = Comic::findOrFail($id);
        //REINDIRIZZA ALLA PAGINA SHOW.BLADE.INDEX
        //COMPACT PASSA ALLA PAGINA L'ELEEMENTO E I DUE ARRAY DEI MENU
        return view('comics.show', compact('comic', 'menu', 'menu_footer'));
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //FUNZIONE PER IL RENDIRIZZAMENTO ALLA PAGINA EDIT.BLADE.PHP(CARTELLA COMICS) E IL PASSAGGIO DEI DATI
    public function edit($id)
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
        //FindOrFail TROVA LELEMENTO ALL'INTERNO DELLA TABELLA TRAMITE ID
        $comic = Comic::findOrFail($id);

        //REINDIRIZZA ALLA PAGINA EDIT.BLADE.INDEX
        //COMPACT PASSA ALLA PAGINA L'ELEEMENTO E I DUE ARRAY DEI MENU
        return view('comics.edit', compact('comic', 'menu', 'menu_footer'));

        //SE NON TROVA LA PAGINA MOSTRA LA CLASSISA PAGINA CON ERRORE 404
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //CON QUESTA FUNZIONE ESEGUIAMO LA LOGICA
    public function update(Request $request, $id)
    {
        //FindOrFail TROVA LELEMENTO ALL'INTERNO DELLA TABELLA TRAMITE ID
        $comic = Comic::findOrFail($id);

        /* $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'thumb' => 'required|max:255',
            'price' => 'required|max:255',
            'series' => 'required|max:255',
            'sale_date' => 'nullable',
            'type' => 'required|max:255'

        ]); */


        $form = $this->validation($request->all());
        /* $form = $request->all(); */

        //ESEGUIAMO L'UPDATE DELL'ELEMENTO
        $comic->update($form);

        //LA FUNZIONE REDIRECT() REINDIRIZZA AD UN ALTRA PAGINA
        //LA FUNZIONE ROUTE() E' LA ROTTA 
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //FUNZIONE PER L'ELIMINAZIONE DEL RECORD NEL DATABASE
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        //ELIMINIAMO IL RECORD NEL DATABASE
        $comic->delete();

        //REINDIRIZZA ALLA PAGINA INDEX.BLADE.PHP
        return redirect()->route('comics.index');
    }


    //CREIAMO UNA FUNZIONE VER LA VALIDAZIONE PERSONALIZZATA DELL'INPUT
    private function validation($data)
    {

        $validator = Validator::make(
            $data,
            [
                'title' => 'required|max:255',
                'description' => 'required|',
                'thumb' => 'required|max:255',
                'price' => 'required|max:255',
                'series' => 'required|max:255',
                'sale_date' => 'nullable',
                'type' => 'required|max:255'

            ],
            [
                'title.required' => 'The title field cannot be left blank',
                'title.max' => 'The title field cannot exceed 255 characters',
                'descrption.required' => 'The descrption field cannot be left blank',
                'thumb.required' => 'The image field cannot be left blank',
                'thumb.max' => 'The image field cannot exceed 255 characters',
                'price.required' => 'The price field cannot be left blank',
                'price.max' => 'The price field cannot exceed 255 characters',
                'series.required' => 'The series field cannot be left blank',
                'series.max' => 'The series field cannot exceed 255 characters',
                'type.required' => 'The type field cannot be left blank',
                'type.max' => 'The type field cannot exceed 255 characters',
            ]
        )->validate();

        return $validator;
    }
}
