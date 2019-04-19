<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Printing -Nomination Form</title>

    <!-- Search Engine -->
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Nomination Form Print-Out - ITSU Voting System">
    <meta itemprop="description" content="Nomination Form Print-Out">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Roboto+Condensed:700" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        h6{
            /*line-height: 15px;*/
        }
    </style>
</head>
<body>
@foreach($loggedInUser as $logged)

    @endforeach

@foreach($nominee_info as $nominee)

@endforeach
<div class="container mt-5">
   <div>
       <img class="img-responsive mt-0 img-fluid" src="{{asset('assets/img/e-header.jpg')}}">
   </div>
    <div class="text-center mt-1">
        <h3 class="text-uppercase display-5">Nomination Form</h3>
        <hr class="mt-0">
    </div>
    <div class="row">
        <div class="col-md-8">
            <h6 class="text-uppercase font-weight-bold">Personal Information</h6>
            <hr class="mt-0">
            <div class="row">
                <div class="col-md-3">
                    <h6> <b>Name :</b></h6>
                    <h6><b>Date of Birth:</b></h6>
                    <h6> <b>Department :</b></h6>
                    <h6><b>Voting :</b> </h6>
                </div>

                <div class="col-md-9">
                    <h6> {{$nominee->title." ".$nominee->first_name." ".$nominee->last_name." ".$nominee->other_name}}</h6>
                    <h6> {{$nominee->date_of_birth}}</h6>
                    <h6> {{$logged->department->name}}</h6>
                    <h6> {{$logged->voting->name}}</h6>
                </div>
            </div>

        </div>

        <div class="col-md-4 ">
            <img class="img-fluid img-responsive" height="200" width="200" src="{{asset('img/nominee_img/'.$nominee->image)}}">
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-8" >
            <h6 class="text-uppercase font-weight-bold">Contact Details</h6>
            <hr class="mt-0">

            <div class="row">
                <div class="col-md-4 " >
                    <h6> <b>Home Town :</b></h6>
                    <h6><b>Region:</b></h6>
                    <h6><b>Nationality:</b></h6>
                    <h6> <b>Postal Address :</b></h6>
                    <h6><b>Phone Number :</b> </h6>
                    <h6><b>Email Address :</b> </h6>
                </div>

                <div class="col-md-8">
                    <h6> {{$nominee->home_town}}</h6>
                    <h6> {{$nominee->region}}</h6>
                    <h6> {{$nominee->nationality}}</h6>
                    <h6>{{$nominee->home_address}}</h6>
                    <h6> {{$nominee->telephone}}</h6>
                    <h6> {{$nominee->email}}</h6>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <h6 class="text-uppercase font-weight-bold">Academic Information</h6>
            <hr class="mt-0">

            <div class="row">
                <div class="col-md-6">
                    <h6> <b>Mode of study:</b></h6>
                    <h6> <b>Level :</b></h6>
                    <h6><b>Index Number:</b></h6>
                    <h6> <b>CGPA :</b></h6>
                </div>

                <div class="col-md-6">
                    <h6> {{$nominee->mode_of_study}}</h6>
                    <h6> {{$nominee->level->name}}</h6>
                    <h6> {{$nominee->index_number}}</h6>
                    <h6> {{$nominee->cgpa}}</h6>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <h6 class="text-uppercase font-weight-bold">Position</h6>
            <hr class="mt-0">
            <div class="row">
                <div class="col-md-3">
                    <h6> <b>Position Vying for :</b></h6>
                    <h6><b>Previous Position Held</b></h6>
                </div>

                <div class="col-md-9">
                    <h6> {{$nominee->position->name}}</h6>
                    <h6> {{$nominee->position_held}}</h6>
                </div>

                <div class="col-md-3">
                    <h6><b class="mr-5">Vision: </b></h6>
                </div>
                <div class="col-md-9">
                    <h6>{{$nominee->vision}}</h6>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-6 mt-0" >
            <h6 style="line-height: 15px;"><span class="font-weight-bold">GUARANTORS</span><small><i>(Department Members only)</i></small></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mt-0" style="line-height: 15px;">
            <br>
            <p>Name:........................................................</p>
            <br>
            <p>Index Number:...........................................</p>
            <br>
            <p>Signature:..................................................</p>
        </div>
        <div class="col-md-4 mt-0" style="line-height: 15px;">
            <br>
            <p>Name:........................................................</p>
            <br>
            <p>Index Number:...........................................</p>
            <br>
            <p>Signature:..................................................</p>
        </div>
        <div class="col-md-4 mt-0" style="line-height: 15px;">
            <br>
            <p>Name:........................................................</p>
            <br>
            <p>Index Number:...........................................</p>
            <br>
            <p>Signature:..................................................</p>
        </div>
    </div>

<br>

    {{--Approval remarks--}}

    <div class="row">
        <div class="col-md-6 mt-0">
            <h6 style="line-height: 15px;"><span class="font-weight-bold">APPROVAL REMARKS</span><small><i>(For Office Use only)</i></small></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-11 ">
            <p><b>Remarks</b>:........................................................................................................................................................................................................</p>
            <p>.........................................................................................................................................................................................................................</p>
            <p>.........................................................................................................................................................................................................................</p>


        </div>
    </div>
    <div class="row mt-0 mb-0">
        <div class="col-md-6 mt-0 mb-0 " style="line-height: 15px;">
            <br>
            <p>Name:..............................................................................................</p>
            <br>
            <p>Signature:........................................................................................</p>
            <br>
            <p>Date:................................................................................................</p>
        </div>
        <div class="col-md-6 mt-0 mb-0 " style="line-height: 15px;">
            <br>
            <p>Name:..............................................................................................</p>
            <br>
            <p>Signature:........................................................................................</p>
            <br>
            <p>Date:................................................................................................</p>
        </div>
    </div>

    <div class="text-center mt-0 mb-0">
        <img class="img-responsive img-fluid" width="110" src="{{asset('assets/qr_codes/'.$nominee->index_number.'.png')}}">
        <img class="img-responsive img-fluid m-0" src="{{asset('assets/img/e-footer.png')}}">
        <small>Please submit the form to the department when you are done</small>
    </div>
</div>

<script>
    window.onload = function() {
        window.print();
        window.close();

        document.location.href="/home";
    }
</script>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
