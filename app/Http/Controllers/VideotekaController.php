<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;
use File;

class VideotekaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmovi = DB::table('filmovi')->paginate(5);
        return view('list',['videoteka' => $filmovi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Custom validation rules
        $validator = Validator::make($request->all(),[
            'naslov' => 'required | max:30',
            'zanr' => 'required | max:50',
            'trajanje'=>'required | max:250',
            'film_slika' => 'required|mimes:jpg,png,jpeg|max:2000',
            'godina'=>'required',
            
        ]);        
        
        //Check if the validation fails or not
        if ($validator->fails()) 
        {
         return redirect('/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $naslov    = $request->naslov;
            $zanr   = $request->zanr;
            $godina  = $request->godina;
            $trajanje = $request->trajanje;
            


            // checking file is valid.
            if (Input::file('film_slika')->isValid()) 
            {
              $extension = Input::file('film_slika')->getClientOriginalExtension(); 
              $image_name = Input::file('film_slika')->getClientOriginalName(); 
              $fileName = time().'_'.$image_name;
              Input::file('film_slika')->move(public_path('uploads') . '/', $fileName); 

               //Insert array
              $data_insert['film_naslov']    = $naslov;
              $data_insert['film_zanr']   = $zanr;
              $data_insert['film_godina']  = $godina;
              $data_insert['film_trajanje'] = $trajanje;
              $data_insert['film_slika']   = $fileName;
              $data_insert['created_on']  = date('Y-m-d H:i:s');

              //Insert the record into the database
             if(DB::table('filmovi')->insert($data_insert))
             {
                Session::flash('success', 'Film uspješno dodan');
                return Redirect::to('videoteka');  
             }
             else
             {
                Session::flash('error', 'Dogodila se greška, molimo vas pokušajte ponovo');
                return Redirect::to('/create');
             }
              
            }
            else 
            {
              Session::flash('error', 'Slika nije ispravna, provjerite veličinu slike ili ekstenziju');
              return Redirect::to('/create');
            }
        }

    }

    /**
     * Display the specified resource.
     *  
     * @param  int  $id
     * @return \Illuminate\Http\m_responsekeys(conn, identifier)
     */
    public function show($id)
    {
        if($id!='')
        {
            $data_update = array('film_id'=>$id);
            $filmovi= DB::table('filmovi')->where($data_update)->get()->first();
            return view('edit',['videoteka' => $filmovi]);
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
        //Custom validation rules
        $validator = Validator::make($request->all(),[
            'naslov' => 'required | max:30',
            'zanr' => 'required | max:50 ',
            'godina'=>'required | max:250',
            'trajanje'=>'required',
            'film_slika' => 'mimes:jpg,png,jpeg|max:2000',
        ]);        
        

        //Check if the validation fails or not
        if ($validator->fails()) 
        {
         return redirect('videoteka/show/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
              $naslov    = $request->naslov;
              $zanr   = $request->zanr;
              $godina  = $request->godina;
              $trajanje = $request->trajanje;
              
              
              //If new image is not updated get the old image
              if(!Input::file('film_slika'))
              {
                 $data_update['film_slika']   = $request['old_img'];
              }
              else
              {
                // checking file is valid.
                if (Input::file('film_slika')->isValid()) 
                {
                    $file    = array('image' => Input::file('film_slika'));
                    $extension = Input::file('film_slika')->getClientOriginalExtension(); 
                    $image_name = Input::file('film_slika')->getClientOriginalName(); 
                    $fileName = time().'_'.$image_name;
                    $data_update['film_slika']   = $fileName;

                    //Unlink the old image
                    $old_img = $request['old_img'];

                    //Unlink the old image
                    $old_img_path = public_path().'/uploads/'.$old_img;
                    File::delete($old_img_path);

                    //Move the new file
                    Input::file('film_slika')->move(public_path('uploads') . '/', $fileName); 
                }
                else 
                {
                    Session::flash('error', 'Slika nije ispravna, provjerite veličinu slike ili ekstenziju');
                    return Redirect::to('videoteka/edit');
                }

              }
            
               //Update array
              $data_update['film_naslov']    = $naslov;
              $data_update['film_zanr']   = $zanr;
              $data_update['film_godina']  = $godina;
              $data_update['film_trajanje'] = $trajanje;                       
              $data_update['modified_on']  = date('Y-m-d H:i:s');

              //Update the record into the database
             if(DB::table('filmovi')->where('film_id', $id)->update($data_update))
             {
                Session::flash('success', 'Film uspješno uređen!');
                return Redirect::to('videoteka');  
             }
             else
             {
                Session::flash('error', 'Dogodila se greška, pokušajte ponovno');
                return Redirect::to('videoteka/show/'.$id);
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
        if($id!='')
        {
            if(DB::table('filmovi')
            ->where('film_id', $id)
                    
            ->delete())
             {
                Session::flash('success', 'Film uspješno izbrisan');
                return Redirect::to('videoteka');  
            }
            else
            {
                Session::flash('danger', 'Dogodila se greška,pokušajte ponovno');
                return Redirect::to('videoteka');  
            }
        }
    }

    /**
    ** Function is used to viewing particular 
    **/
    public function view($id)
    {
        if($id!='')
        {
            $data_view = array('film_id'=>$id);
            $filmovi = DB::table('filmovi')->where($data_view)->get()->first();
            return view('view',['videoteka' => $filmovi]);
        }
    }
    public function brojfilmova()
    {
        $con=mysqli_connect("localhost","root","","kolekcija");
$query = "select count(film_id) from filmovi
 where deleted=0";
$dave= mysqli_query($con,$query) or die(mysql_error());
while($row = mysqli_fetch_assoc($dave)){
    foreach($row as $cname => $cvalue){
       
    }
     
}
    }
 }