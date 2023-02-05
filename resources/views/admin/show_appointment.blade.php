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
 
                    <table class="center my-4">
                        <tr>
                            <th class="th_deg">Customer name</th> 
                            <th class="th_deg">Email</th> 
                            <th class="th_deg">Phone</th> 
                            <th class="th_deg">Doctor Name</th>
                            <th class="th_deg">Date</th>
                            <th class="th_deg">Message</th> 
                            <th class="th_deg">Status</th>  
                            <th class="th_deg">Approved</th> 
                            <th class="th_deg">Canceled</th>    
                            <th class="th_deg">Send Mail</th>            
                        </tr>
                
                        
                        @foreach ($data as $appoint) 
                
                        <tr>
                            <td class="td">{{$appoint->name}}</td>
                            <td class="td">{{$appoint->email}}</td>
                            <td class="td">{{$appoint->phone}}</td>
                            <td class="td">{{$appoint->doctor}}</td>
                            <td class="td">{{$appoint->date}}</td>
                            <td class="td">{{$appoint->message}}</td>
                            <td class="td">{{$appoint->status}}</td>
                            <td> <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a></td>
                            <td> <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a></td>
                            <td> <a class="btn btn-primary" href="{{url('send_mail',$appoint->id)}}">Send Mail</a></td>
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