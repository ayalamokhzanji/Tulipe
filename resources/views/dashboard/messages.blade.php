<head>
<meta name="csrf_token" content="{{ csrf_token() }}" />

</head>
@extends('dashboard.layout')
@section('content')
   <style>
        .modal{
            top:-70px;
        }
        input[type=submit], input[type=button], button{
            cursor:pointer;
        }
   </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="col-sm-8">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input  id="myInput"type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
    
                    </div>
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Striped Table with Hover</h4>
                            <p class="card-category">Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table id="tableMain" class="table table-hover table-striped">
                                <!-- <thead>
                                    <th>البريد الالكتروني</th>
                                    <th>الرسالة</th>
                                    <th>وقت الارسال</th>
                                </thead> -->
                                <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{{ $message->email }}</td>
                                            <td class="message">{!! str_limit($message->message, 30) !!}</td>
                                            <td>{{ $message->created_at }}</td>

                                            <td> 
                                                
                                                <input type="button" class="view_message btn btn-primary" id="{{ $message->id }}" value="عرض المزيد"> 
                                                
                                            </td>

                                            <td> 
                                                <form class="deleteMessage" method="post" action="user/message/{{$message->id}}" style="display:inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                    <div style="display:inline">
                                                        <input type="submit" class="btn btn-danger" value="حذف" >
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div dir="rtl" class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true"> 
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

