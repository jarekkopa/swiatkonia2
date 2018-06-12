<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\EquipmentAdvert;
use App\Region;
use App\Category;
use App\Subcategory;
use App\Picture;
use App\Color;
use DB;
use Auth;

use Illumiante\Support\Facades\Input;

class AdvertsController extends Controller
{
    // Metoda do pobierania subkategorii w formularzu dodawania ogłoszenia
    public function getSubcategories($id)
    {
        $subcategories = DB::table("subcategories")->where("category",$id)->pluck("name","id");
        return json_encode($subcategories);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advert = EquipmentAdvert::orderBy('id', 'desc')->paginate(5);
        $picture = Picture::all();
        $category = Category::all();
        return view('pages.index')->with(['adverts' => $advert, 'pictures' => $picture, 'categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $region = Region::all(); // pobranie wszystkich województw z bazy
        $categories = DB::table('categories')->pluck("name","id");
        $color = Color::all(); // pobieram kolory
        return view('pages.adverts.create')->with(['regions' => $region, 'categories' => $categories, 'colors' => $color]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // WALIDACJA DANYCH
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'region' => 'required',
            'phone' => 'numeric',
            'category' => 'required',
            'price' => 'numeric',
            'color' => 'required',
            'file' => 'mimes:jpeg,jpg,png',
        ]);

        // DODANIE OGŁOSZENIA DO BAZY
        $advert = new EquipmentAdvert;
        $advert->user = Auth::id(); // pobranie ID zalogowanego usera i przypisanie do pola user w DB
        $advert->title = $request->input('title'); // dodanie tytułu
        $advert->description = $request->input('description'); // dodanie opisu
        $advert->state = $request->input('region'); // dodanie województwa
        $advert->color = $request->input('color');
        if($request->price) // jeśli pole cena nie jest puste
        {
            $advert->price = $request->input('price'); // dodanie ceny
        }
        else{ // w przeciwnym wypadku wybrano opcję za darmo
            $advert->price = $request->input('price-checkbox'); // dodanie ceny
        }
        
        $advert->phone = $request->input('phone'); // dodanie telefonu
        $advert->category = $request->input('category'); // dodanie kategorii
        if ($request->input('subcategory')) { // jeśli wybrano = dodanie subkategorii
            $advert->subcategory = $request->input('subcategory');
        }
        $advert->save();

        // DODAWANIE ZDJĘCIA
        if($request->hasFile('file')) // sprawdzenie czy w requescie jest plik
        {
            // pobranie ostatniego ogłoszenia usera z bazy
            $lastUserAdvert = EquipmentAdvert::orderby('id', 'desc')->where('user', Auth::id())->first();
            // przypisanie ID ostatniego ogłoszenia do zmiennej 
            $lastUserAdvertId = $lastUserAdvert->id;
            
            foreach($request->file as $file)
            {
                $fileName = $file->getClientOriginalName();
                $filesize = $file->getClientSize();
                // potrzebuję ID ogłoszenia więc najpierw muszę je dodać a potem pobrać ostatnie ogłoszenia (id) i dodać do zdjęć
                $unique_filename = md5(time())."_".$fileName; // zmieniam nazwę pliku na unikatową dodając timestamp i łącząc go z nazwą pliku
                $path = '/public/images'; // zapis pliku do storage/app/public/advert_mages
                $file->storeAs($path, $unique_filename); // wskazuję ścieżkę do zapisu pliku i go zapisuję
                
                // zapis danych o pliku w DB
                $picture = new Picture; 
                $picture->fileName = $unique_filename;
                $picture->fileSize = $filesize;
                $picture->advertId = $lastUserAdvertId; // zapisanie w bazie ID ogłoszenia do którego przypisane są zdjęcia
                $picture->save();
            }
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'ID ogłoszenia to:' . $id . 'Działa, ale nie ma widoku';
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
