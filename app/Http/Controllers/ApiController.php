<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CatalogJSON;
use Validator;
 
class ApiController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = CatalogJSON::all();
        if(is_null($catalog)){
            return response()->json(['message'=>'Records not found'], 404);
        }else{
            return response()->json($catalog, 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $rules= [
'titlemovie' => 'required|min:3',
'moviecountry' => 'required|min:3|max:40',
        ];
        $validator = Validator::make($request->all(), $rules);
if($validator->fails()){
    return response()->json($validator->errors(), 400);
}
        $catalog = new CatalogJSON();

        $catalog->titlemovie = $request->titlemovie;
        $catalog->moviedescription = $request->moviedescription;
        $catalog->moviecountry = $request->moviecountry;

        $catalog->typesmovie = implode(' ', (array) $request->typesmovie);
        $catalog->created_at = $request->created_at;
        $catalog->updated_at = $request->updated_at;
        if($catalog->save()){
            if($request->has('imageUrl')){
                $imgUrl = $request->get('imageUrl');
                $fileName = md5($catalog->id);
                $image = file_get_contents($imgUrl);
            
                $destinationPath = base_path() . '/storage/img/emovie/' . $fileName;
            
                file_put_contents($destinationPath, $image);
                $attributes['image'] = $fileName;
            }
            return response()->json($catalog, 201);
        }else{
            return response()->json(['message'=>'No Record added, Bad request'], 400);
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
        $catalog = CatalogJSON::find($id);
        if(is_null($catalog)){
            return response()->json(['message'=>'Record not found'], 404);
        }else{
            return response()->json($catalog);
        }
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

            $catalog = CatalogJSON::find($id);
            if(is_null($catalog)){
                return response()->json(['message'=>'No Record found'], 404);
            }else{
                $rules= [
                    'titlemovie' => 'required|min:3',
                    'moviecountry' => 'required|min:3|max:40',
                            ];
                            $validator = Validator::make($request->all(), $rules);
                    if($validator->fails()){
                        return response()->json($validator->errors(), 400);
                    }else{
                        $catalog -> update($request->all());
                        return response()->json($catalog, 201);
                    }
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
            $catalog = CatalogJSON::find($id);
            if(is_null($catalog)){
                return response()->json(['message'=>'No Record found'], 404);
            }else{
                $catalog->delete();
                return response()->json(['ID:'=>$id,'status'=>'Deleted successfully'], 200);
            }
        
    }
    public function searchTitle(Request $request, $title)
    {
       
        $catalog = CatalogJSON::where('titlemovie', 'like', "%{$title}%")->get();
        if($catalog->isEmpty()){
            return response()->json(['message'=>'Search Key Was Not Found'], 404);
        }else{
            return Response()->json([
            'status' => 'success',
            'title' => $catalog
        ], 200);
        }
    }
}
