<head>
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.bootstrap4.min.css" rel="stylesheet" />
    

<link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
     <!-- CSS Just for demo purpose, don't include it in your project -->
    

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style type="text/css">
    body {
        color: #566787;
        background: #f5f5f5;
		font-family: 'Roboto', sans-serif;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px;
        margin: 30px 0;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	
    .search-box {
        position: relative;        
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
	.search-box input:focus {
		border-color: #3FBAE4;
	}
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
	table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 20px;
    }    
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }    
</style>

</head>
<body>

@extends('AdminDashboard.layout')
@section('content')


   <style>
        .modal{
            top:-70px;
        }
        input[type=submit], input[type=button], button{
            cursor:pointer;
        }
   </style>



<div class="container" >
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                <div class="col-sm-12"> <h2 > الرسائل </h2>
                   <div class="col-sm-8">
                       
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input  id="myInput" type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
    
                    </div>
                </div>
            </div>
            <table   id="tableMain" class="table table-striped table-hover table-bordered">
                <thead >
                    <tr>
                        
                        <th>البريد الالكتروني <i class="fa fa-sort"></i></th>
                        <th>الرسالة</th>
                        <th>التاريخ <i class="fa fa-sort"></i></th>
                        <th></th>
                        <!-- 
                        <th>Country <i class="fa fa-sort"></i></th>
                        <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
               
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{{ $message->email }}</td>
                                            <td class="message">{!! str_limit($message->message, 30) !!}</td>
                                            <td>{{ $message->created_at }}</td>

                                            <td> 
                                                
                                            <a type="button" class=" view_message btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="{{ $message->id }}" value="عرض المزيد"><i class="material-icons">&#xE417;</i></a> 
                                                
                                 
                                                <form class="deleteMessage" method="post" action="/adminmessage/{{$message->id}}" style="display:inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                    <div style="display:inline">
                                                        <input type="submit"  class="btn btn-danger material-icons" value="&#xE872;" >
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    @endforeach

                                </tbody>
               
            </table>
        
        {{$messages->links()}}
    </div>     
</body>
</html>                                		                            







<div dir="rtl" class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog" role="document" >
        <div class="modal-content" style="background-color:#E8DAEF" >
            <div class="modal-header">
                <h4 class="modal-title m-auto" id="messageLabel">تواصل معك</h4>
            </div>
            <div class="modal-body" id="message_details">

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary m-auto" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
      $('.view_message').click(function(){
          
          var id = $(this).attr('id');
          var _token = $('input[name="_token"]').val();
          
          $.ajax({
              url :"{{ route('messageDetails') }}",
              method:'POST',
              data:{id : id, _token:_token},
              success:function(response) {
                 $('#message_details').html(response);
                 $('#messageModel').modal('show');

                }
                
            });
        });
    });
</script>
  
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tableMain tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



@endsection

