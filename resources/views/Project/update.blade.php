<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('CSS/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('CSS/main.css')}}">
    <title>Update</title>
</head>

@foreach($data as $detail)
@endforeach

<body>

    <!-- {{print_r(explode(',', $detail->hobby))}} -->
    <?php
    $arr =  $detail->hobby ;
    if (strpos($arr,'reading')) {
      echo 'done';
    }  
    ?>
 
    <div class="container-fluid p-0">
        @include('Project.navbar')
        <!-- register form -->
        <div class="container mt-5 w-100">
            <form method="POST" enctype="multipart/form-data">
                <div class="row form-head">

                    <h1 class="text-center col-lg-12 p-1">Update</h1>
                </div>
                <div class="row form-body">

                    <div class="col-lg-6 ">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="first_name" class="">First Name</label>
                            <input class="form-control" type="text" name="firstName" id="first_name" value="{{$detail->first_name}}">
                            <small>@error('firstName'){{$message}} @enderror </small>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input class="form-control" type="text" name="lastName" id="last_name" value="{{$detail->last_name}}">
                            <small>@error('lastName'){{$message}} @enderror </small>
                        </div>

                        <label for="">Gender <small>@error('gender'){{$message}} @enderror </small>
                            <div class="form-check">
                                <label for="male" class="form-check-label">
                                    <input type="radio" value="male" class="form-check-input" id="male" name="gender" @if($detail->gender =='male' ) checked @endif> male
                                </label>
                            </div>
                            <div class="form-check">

                                <label for="female" class="form-check-label">

                                    <input type="radio" value="female" class="form-check-input" id="female" name="gender" @if($detail->gender =='female' ) checked @endif> female
                                </label>
                            </div>
                        </label>

                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{$detail->DOB}}">
                            <small>@error('dob'){{$message}} @enderror </small>
                        </div>


 
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$detail->email}}">
                            <small>@error('email'){{$message}} @enderror </small>
                        </div>

                    </div>


                    <div class="col-lg-6  ">


                        <div class="form-group">
                            <label for="mobile">Mobile No.</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$detail->mobile}}">
                            <small>@error('mobile'){{$message}} @enderror </small>
                        </div>


                        <label for=""> Hobby <small>@error('hobby'){{$message}} @enderror </small>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" id="reading" value="reading" @if($detail->hobby =='reading' ) checked @endif>
                                <label for="reading" class="form-check-label">Reading</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" id="dancing" value="dancing" @if($detail->hobby =='dancing' ) checked @endif>
                                <label for="dancing" class="form-check-label">Dancing</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" id="programming" value="programming" @if($detail->hobby =='programming' ) checked @endif>
                                <label for="programming" class="form-check-label">Programming</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="hobby[]" id="gaming" value="gaming" @if($detail->hobby =='gaming' ) checked @endif>
                                <label for="gaming" class="form-check-label">Gaming</label>
                            </div>

                        </label>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Your Photo</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            <small> @error('image'){{$message}} @enderror </small>
                        </div>

                        <div>

                            <button class="btn btn-primary ">Update</button>
                            <a href="{{ url('admin_dashboard') }}" class="btn btn-warning">Back</a>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>



</body>

</html>