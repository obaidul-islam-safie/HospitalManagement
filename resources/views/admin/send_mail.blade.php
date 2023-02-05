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


                    <form action="{{url('sendmail',$data->id)}}" method="POST">
                        @csrf
                        <div style="padding: 15px">

                            <label for="">Greeting</label>
                            <input type="text" style="color: black;" name="greeting" required="">
                        </div>

                        <div style="padding: 15px">

                            <label for="">Mail Body</label>
                            <input type="text" style="color: black;" name="body" required="">
                        </div>

                       

                        <div style="padding: 15px">

                            <label for="">Action Text</label>
                            <input type="text" style="color: black;" name="actiontext" required="">
                        </div>


                        <div style="padding: 15px">

                            <label for="">Action URL</label>
                            <input type="text" style="color: black;" name="url" required="">
                        </div>


                        <div style="padding: 15px">

                            <label for="">Mail End Part</label>
                            <input type="text" style="color: black;" name="endpart" required="">
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