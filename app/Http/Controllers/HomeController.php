<?php

namespace App\Http\Controllers;

use App\Level;
use App\Nominee;
use App\NomineeToken;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->name.""), true, JSON_PRETTY_PRINT);

        //return $json;
        $loggedInUser  = NomineeToken::with('department','voting')
            ->where('id',Auth::User()->id)->get();

        foreach ($loggedInUser as $logged){

        }


        $nominee_info = Nominee::with('position','level')
            ->where('index_number',$logged->name)->get();



        if($logged->done == 1){
            return view('nominee_info')
                ->with('nominee_info',$nominee_info)
                ->with('loggedInUser',$loggedInUser)
                ->with('success','Nomination Form Sent');
        }else{
            $levels = Level::all()->where('department_id',Auth::user()->department_id);
            $positions = Position::all()->where('department_id',Auth::user()->department_id);
            return view('home')
                ->with('loggedInUser',$loggedInUser)
                ->with('levels',$levels)
                ->with('positions',$positions);
        }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        //return $request;

        $this->Validate($request, [
            'image_file'=>'image|mimes:jpeg,png,jpg|max:50000',
        ]);
        $nominee = new Nominee();
        $nominee->voting_id=Auth::User()->voting_id;
        $nominee->title=$request->input('title');
        $nominee->first_name=$request->input('first_name');
        $nominee->last_name=$request->input('last_name');
        $nominee->other_name=$request->input('other_name');
        $nominee->mode_of_study=$request->input('mode_of_study');
        $nominee->vision=$request->input('vision');
        $nominee->date_of_birth=$request->input('dateOfBirth');
        $nominee->home_town=$request->input('home_town');
        $nominee->region=$request->input('region');
        $nominee->home_address=$request->input('postal_address');
        $nominee->telephone=$request->input('phone_number');
        $nominee->email=$request->input('email');
        $nominee->level_id=$request->input('levels');
       $indexnumber= $nominee->department_id =Auth::User()->department_id;
        $nominee->index_number=Auth::User()->name;
        $nominee->cgpa=$request->input('cgpa');
        $nominee->nationality=$request->input('nationality');
        $nominee->position_id=substr($request->input('position'),0,strpos($request->input('position'),' '));
        $nominee->position_number = substr($request->input('position'),strpos($request->input('position'),' '));
        if ($request->input('held') == "Yes"){
            $nominee->position_held=$request->input('institution').",".$request->input('positionHeld');
        }else{
            $nominee->position_held="No";
        }
        $image = $request->file('image_file');

        if ($image != ''){


           // $image = Input::file('image');
            $image_name  = Auth::User()->name . '.' . $image->getClientOriginalExtension();

            $path = public_path('img/nominee_img/' . $image_name);


            Image::make($image->getRealPath())->resize(640, 640)->save($path);



            $nominee->image=$image_name;
            $nominee->added_by=Auth::user()->name;

            $checkNominee = Nominee::all()
                ->where('index_number',Auth::user()->name)
                ->count();
            if ($checkNominee>0){
                return redirect('/home')
                    ->with('error','Nominee  already exist');
            }else{
                if ($nominee->save()){
                    $nominee_token = NomineeToken::find(Auth::User()->id);
                    $nominee_token->done = 1;
                    $nominee_token->save();

                    $lastInsertedId = $nominee->id;
                    $nominee_info = Nominee::with('position','level')
                        ->where('id',$lastInsertedId)->get();

                    $loggedInUser  = NomineeToken::with('department','voting')
                        ->where('id',Auth::User()->id)->get();
                    foreach($nominee_info as $nominee){

                    }
                    foreach($loggedInUser as $logged){

                    }

                    /*
                     * GEnerate Qr Code
                     */

                    QrCode::format('png')->merge(public_path('assets/img/e-voting.png'), 0.3, true)
                        ->size(500)->errorCorrection('H')
                        ->generate(
                            'Name---'.$nominee->title." ".$nominee->first_name." ". $nominee->last_name." ". $nominee->other_name.
                            ' Position Vying For---'.$nominee->position->name." ".
                            //' Department(s) --- '.$logged->department->name.
                                Hash::make(Auth::user()->name)
                            ,public_path('assets/qr_codes/'.Auth::user()->name.'.png'));

                   /* QR_Code::png(

                        public_path('assets/qr_codes/'.Auth::user()->name.'.png'));

                    $getPosition  = Position::where('id', substr($request->input('position'),0,strpos($request->input('position'),' ')))->get();
*/


//                    send email

                   /* $data = array(
                        'title' =>$request->input('title'),
                        'position' =>$getPosition[0]->name,
                        'first_name' =>$request->input('first_name'),
                        'last_name' =>$request->input('last_name'),
                        'other_name' =>$request->input('other_name'),
                        'index_number' =>$indexnumber
                    );

                    Mail::to($request->input('email'))->send(new  SendMail($data));*/


                    return view('show')
                        ->with('nominee_info',$nominee_info)
                        ->with('loggedInUser',$loggedInUser)
                        ->with('success','Nomination Form Sent');
                }
            }
        }else{
            return redirect('/home')
                ->with('error','Select a Profile Photo');
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
        $nominee_info = Nominee::with('position','level')
            ->where('id',$id)->get();

        $loggedInUser  = NomineeToken::with('department','voting')
            ->where('id',Auth::User()->id)->get();



        return view('show')
            ->with('nominee_info',$nominee_info)
            ->with('loggedInUser',$loggedInUser);
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


    }

}
