<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')


    <style>

        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
            
    
        }
        table,th,td{
            border: 1px solid gray;
        }
        .th_deg{
            font-size: 20px;
            padding: 10px;
            background: skyblue;
            
        }
    
        .img_deg{
            height: 150px;
            width: 150px;
    
        }
    
        .total_deg{
            font-size: 20px;
            padding: 40px;
            text-align: center;
        }
        .td{
            padding: 5px;
        }
        .h{
            font-size: 30px;
            text-align: center;
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

                <div style="padding-top: 75px; padding-bottom: 60px;">
 
                    <h1 class="h">All Doctor</h1>
                    <table class="center my-4">
                        <tr>
                            <th class="th_deg">Doctor name</th>  
                            <th class="th_deg">Phone</th> 
                            <th class="th_deg">Speciality</th>
                            <th class="th_deg">Room No</th>
                            <th class="th_deg">Image</th>   
                            <th class="th_deg">Update</th> 
                            <th class="th_deg">Delete</th>                                       
                        </tr>
                
                        
                        @foreach ($data as $doctor) 
                
                        <tr>
                            <td class="td">{{$doctor->name}}</td>
                            <td class="td">{{$doctor->phone}}</td>
                            <td class="td">{{$doctor->specialty}}</td>
                            <td class="td">{{$doctor->room}}</td>

                         <td>
                             <img height="100" width="100" src="doctorimage/{{$doctor->image}}">
                         </td>

                            <td> <a class="btn btn-success" href="{{url('update_doctor',$doctor->id)}}">Update</a></td>
                            <td> <a class="btn btn-danger" onclick="return confirm('Are you sure to Delete This')" href="{{url('delete_delete',$doctor->id)}}">Delete</a></td>
                       

                        </tr>
                        
                        @endforeach
                       
                    </table>
                
                  </div>


            </div>
        </div>




    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>