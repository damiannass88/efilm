<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Catalog;
 
class BaseControllerView extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Catalog::paginate(10);
        return view('collection.index', array('catalog' => $catalog, 'sear'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $catalog = new Catalog();

            $catalog->titlemovie = $request->titlemovie;
            $catalog->moviedescription = $request->moviedescription;
            $catalog->moviecountry = $request->moviecountry;

            $catalog->typesmovie = implode(' ', (array) $request->get('typesmovie'));
             
            if($catalog->save()){
                if($request->hasFile('foto')){
                    $image = $request->file('foto');
                    $hashname = md5($catalog->id);
                    $request->file('foto')->move(public_path('/storage/img/emovie/'), $hashname);
                }
                return redirect('/movies');
            } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = Catalog::find($id);
        return view('collection.show', array('catalog' => $catalog));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $catalog = Catalog::find($id);
            return view('collection.edit', array('catalog' => $catalog));
        
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
            $catalog = Catalog::find($id);
            $catalog->titlemovie = $request->titlemovie;
            $catalog->moviedescription = $request->moviedescription;
            $catalog->moviecountry = $request->moviecountry;

            $catalog->typesmovie = implode(' ', (array) $request->get('typesmovie'));

            if($request->hasFile('foto')){
                $image = $request->file('foto');
                $hashname = md5($catalog->id);
                $request->file('foto')->move(public_path('/storage/img/emovie/'), $hashname);
            }

            if($catalog->save()){
                return redirect('/movies/'.$catalog->id);
            }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $catalog = Catalog::find($id);
            $catalog->delete();

            return redirect('/movies');
        
    }


    public function search(Request $request){

        $catalog = Catalog::where('titlemovie', 'LIKE', '%'.$request->input('sear').'%')->paginate(10);

        return view('collection.index', array('catalog' => $catalog, 'sear'=>$request->input('sear')));
    }
}
