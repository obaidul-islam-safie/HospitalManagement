<!DOCTYPE html>
<html lang="en">
  <head>
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


                    <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="padding: 15px">

                            <label for="">Doctor Name</label>
                            <input type="text" style="color: black;" name="name" placeholder="Write the Name" required="">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Phone</label>
                            <input type="number" style="color: black;" name="number" placeholder="Write the Number" required="">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Doctor Speciality</label>
                            <select name="speciality" id="" style="color: black; width: 200px;" required="">
                                <option value="">--Select--</option>
                                <option value="">Skin</option>
                                <option value="">Heart</option>
                                <option value="">Eye</option>
                                <option value="">Nose</option>

                            </select>
                        </div>

                        <div style="padding: 15px">

                            <label for="">Doctor Room No</label>
                            <input type="text" style="color: black;" name="room" placeholder="Write the Room No" required="">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Doctor Image</label>
                            <input type="file" name="file" required="">
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