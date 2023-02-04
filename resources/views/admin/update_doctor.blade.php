<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        label{
            display: inline-block;
            width: 150px
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
     
      @include('admin.navbar')
      
        <!-- partial -->
       

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="container mt-8" align="center">


                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{session()->get('message')}}
                    </div>
                    @endif


                    <form action="{{url('edit_doctor',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="padding: 15px">

                            <label for="">Doctor Name</label>
                            <input type="text" style="color: black;" name="name" value="{{$data->name}}">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Phone</label>
                            <input type="number" style="color: black;" name="number" value="{{$data->phone}}">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Doctor Speciality</label>
                            <input type="text" style="color: black;" name="speciality" value="{{$data->specialty}}">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Doctor Room No</label>
                            <input type="text" style="color: black;" name="room" value="{{$data->room}}">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Old Image</label>
                            <img height="100" width="100" src="doctorimage/{{$data->image}}">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Change Image</label>
                            <input type="file" name="file">
                        </div>

                        <div style="padding: 15px">
                            <input type="submit" class="btn btn-success">
                        </div>

                    </form>

                </div>

            </div>
        </div>


    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>