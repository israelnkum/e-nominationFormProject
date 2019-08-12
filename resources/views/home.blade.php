<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>E-Voting | Nomination Form</title>
    <link rel="icon" href="{{asset('assets/img/e-voting.png')}}" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/hm-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color_skins.css')}}">
    {{--<link rel="stylesheet" href="{{asset('assets/css/bootstrap-')}}">--}}
</head>

<body class="theme-purple index2">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('assets/img/e-voting.png')}}" width="48" height="48" alt="Oreo"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5 bg-dark">
    <div class="container">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="h-bars"></a>
                    <a class="navbar-brand" href="{{route('home.index')}}"><img src="{{asset('assets/img/e-voting.png')}}" style="border:solid ghostwhite 1px;" width="50" alt="Oreo"><span class="m-l-10">Nomination Form</span></a>
                </div>
            </li>
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                    -
                </a>
            </li>

            <li class="float-right">
                {{--<a href="sign-in.html" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>--}}
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                {{--<a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>--}}
            </li>
        </ul>
    </div>
</nav>


<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane slideRight active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple" class="active"><div class="purple"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush"><div class="blush"></div></li>
                    </ul>
                </div>
                <div class="card theme-light-dark">
                    <h6>Left Menu</h6>
                    <button class="t-light btn btn-default btn-simple btn-round btn-block">Light</button>
                    <button class="t-dark btn btn-default btn-round btn-block">Dark</button>
                    <button class="m_img_btn btn btn-primary btn-round btn-block">Sidebar Image</button>
                </div>
            </div>
        </div>
    </div>
</aside>

<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Hi {{Auth::user()->name}}
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Fill</strong> the form below</h2>
                    </div>
                    <div class="body">
                       @include('layouts.messages')
                        <form action="{{route('home.store')}}" enctype="multipart/form-data" id="wizard_with_validation" method="POST">
                            @csrf
                            <h3>Photo Upload</h3>
                            <fieldset>
                                <div class="form-group row text-center">
                                    <div class="col-md-4 offset-md-4">
                                        <h6 class="text-danger">PLEASE UPLOAD PASSPORT PICTURE</h6>
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{asset('assets/img/profiledefault.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
                                                <input required  type="file" class="form-control" name="image_file"   id="wizard-picture">
                                            </div>
                                            <h6>Choose Picture</h6>

                                            <small class="text-danger">
                                                Dimension - 640 x 640 pixels<br>
                                                Max Size - 500KB
                                            </small>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                            <h3>Position & Vision</h3>
                            <fieldset>
                                <div class="form-group row">
                                   <div class="col-md-4">
                                       <select required name="position" required  class="form-control show-tick ms search-select" data-placeholder="Select">
                                           <option value=""> Select Position</option>
                                           @foreach($positions as $position)
                                               <option value="{{$position->id.' '.$position->position_number}}">{{$position->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select required id="levels" name="levels"  class="form-control show-tick ms search-select">
                                                <option value=""> Select Level</option>
                                                @foreach($levels as $level)
                                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control cgpa"  min="3.0" max="5.0"  name="cgpa" placeholder="CGPA">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea required name="vision"  style="border: solid lightslategrey 0.1px;" cols="30" rows="3" placeholder="Vision *" class="form-control no-resize"></textarea>
                                </div>
                            </fieldset>
                            <h3>Applicant's Profile</h3>
                            <fieldset>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <select required name="title"  class="form-control show-tick ms search-select" data-placeholder="Select">
                                            <option value=""> Select title </option>
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                            <option value="Miss">Miss.</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <select required name="mode_of_study"  class="form-control show-tick ms search-select" data-placeholder="Select">
                                            <option value=""> Mode of Study </option>
                                            <option value="Regular">Regular</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-float">
                                            <input type="hidden"  class="form-control" value="{{Auth::User()->name}}" disabled name="index_number" placeholder="Index Number">
                                            <input required type="text"  class="form-control phone_number"  id="phone_number" minlength="10"   name="phone_number" placeholder="Phone Number">
                                            <span class="err"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row form-float">
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control" placeholder="First name *" name="first_name" id="first_name" >
                                    </div>
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control" placeholder="Last name *" name="last_name" id="last_name" >
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Other name *" name="other_name" id="other_name" >
                                    </div>
                                </div>
                                <div class="form-group row form-float">
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control date" placeholder="Date of birth*" name="dateOfBirth" id="dateOfBirth" >
                                    </div>
                                    <div class="col-md-4">
                                        <input required type="email"  class="form-control " placeholder="Email *" name="email" id="email" >
                                    </div>
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control" placeholder="Nationality *" name="nationality" id="nationality" >
                                    </div>
                                </div>
                                <div class="form-group row form-float">
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control" placeholder="Home Town *" name="home_town" id="home_town" >
                                    </div>
                                    <div class="col-md-4">
                                        <input required type="text"  class="form-control" placeholder="Postal Address *" name="postal_address" id="postal_address" >
                                    </div>

                                    <div class="col-md-4">
                                    <select required name="region"  id="region" class="form-control show-tick ms search-select" data-placeholder="Select">
                                        <option value=""> Region </option>
                                        <option value="Greater Accra">Greater Accra</option>
                                        <option value="Central">Central</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="Ashanti">Ashanti</option>
                                        <option value="Northern">Northern</option>
                                        <option value="Upper West">Upper West</option>
                                        <option value="Upper East">Upper East</option>
                                        <option value="Western">Western</option>
                                        <option value="Volta">Volta</option>
                                        <option value="Brong Ahafo">Brong Ahafo</option>
                                    </select>
                                </div>
                                </div>
                            </fieldset>

                            <h3>Position Held</h3>
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Have you held any Executive position in any institution?</label>
                                        <br>
                                        <div class="radio inlineblock m-r-20">
                                            <input type="radio" onclick="show2();" name="held" id="Yes" class="with-gap" value="Yes" >
                                            <label for="Yes">Yes</label>
                                        </div>
                                        <div class="radio inlineblock">
                                            <input type="radio" onclick="show1();" name="held" id="No" class="with-gap" value="No" >
                                            <label for="No">No</label>
                                        </div>

                                        <hr>
                                        <div  id="box" style="display:none">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Institution *" name="institution" id="institution" >
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Position Held *" name="positionHeld" id="positionHeld" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <p class="m-b-0">© {{date('Y')}} Nomination Form by <a href="javascript:void(0)"><small> <b class="text-dark">ANA Technologies</b> </small></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade hide" id="check_img_size" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-danger" id="exampleModalCenterTitle">Check Picture Dimension</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger" id="displayError"> <b><span id="boldertext"></span></b> pixels</p>
            </div>
            <div class="modal-footer text-right">
                <input type="hidden" class="btn btn-primary">.
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->

<script src="{{asset('assets/js/pages/forms/jquery.validate.js')}}"></script> <!-- Jquery Validation Plugin Css -->
<script src="{{asset('assets/js/pages/forms/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->

<script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/jquery.inputmask.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index2.js')}}"></script>
{{--<script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>--}}
<script src="{{asset('assets/js/pages/mask.init.js')}}"></script>
<script>



    $(document).ready(function(){
        var _URL = window.URL;
        $("#wizard-picture").change(function () {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                let fileType =file['type'];
                let validImageType = ["image/jpeg","image/jpg",'image/png'];

                img.onload = function () {

                    if (this.width!==640  && this.height!==640){
                        $('#check_img_size').modal('show');
                        $('#displayError').text("Picture size dimension should be  640x640 pixels");
                        document.getElementById('wizard-picture').value = '';
                        $("#wizardPicturePreview").attr("src",'profiledefault.png');
                    }else if($.inArray(fileType, validImageType) <0){
                        $('#check_img_size').modal('show');
                        $('#displayError').text("CHOOSE AN IMAGE");
                        document.getElementById('wizard-picture').value = '';
                        $("#wizardPicturePreview").attr("src",'profiledefault.png');
                    }else if(file.size>500000){
                        $('#check_img_size').modal('show');
                        $('#displayError').text("Image size shoulbe be <=500kb");
                        document.getElementById('wizard-picture').value = '';
                        $("#wizardPicturePreview").attr("src",'profiledefault.png');
                    }
                };
                img.src = _URL.createObjectURL(file);
            }
            // alert("Width:" + this.width + "   Height: " + this.height);
            readURL(this);

        });
    });



    //Function to show image before upload

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');

            };

            reader.readAsDataURL(input.files[0]);


        }
    }

</script>


<script>
    function show1(){
        document.getElementById('box').style.display ='none';
        $('#institution').removeAttr('required');
        $('#positionHeld').removeAttr('required');
    }
    function show2(){
        document.getElementById('box').style.display = 'block';
        $('#institution').attr('required', true);
        $('#positionHeld').attr('required', true);
    }

</script>

<script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
        img.src = 'loader.gif';
        div.innerHTML = "Submitting Form...<br />";
        div.style.cssText = 'position: fixed; top: 5%; left: 40%; z-index: 5000; width: 422px; text-align: center; background: #EDDBB0; border: 1px solid #000';
        div.appendChild(img);
        document.body.appendChild(div);
        return true;
        // These 2 lines cancel form submission, so only use if needed.
        //window.event.cancelBubble = true;
        //e.stopPropagation();
    }
</script>
{{--<script>
    $(function () {
        $('.knob').knob({
            draw: function () {
            }
        });
    });

    /*global $ */
    $(document).ready(function() {
        "use strict";
        $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI

        $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');

        $(".menu > ul > li").hover(function(e) {
            if ($(window).width() > 943) {
                $(this).children("ul").stop(true, false).fadeToggle(150);
                e.preventDefault();
            }
        });
        //If width is more than 943px dropdowns are displayed on hover
        $(".menu > ul > li").click(function() {
            if ($(window).width() <= 943) {
                $(this).children("ul").fadeToggle(150);
            }
        });
        //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)

        $(".h-bars").click(function(e) {
            $(".menu > ul").toggleClass('show-on-mobile');
            e.preventDefault();
        });
        //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)

    });
</script>--}}

</body>
</html>