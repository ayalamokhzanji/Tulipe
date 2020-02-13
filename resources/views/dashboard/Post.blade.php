<head>
<meta name="csrf_token" content="{{ csrf_token() }}" />
<link href="https://cdn.datatables.net/autofill/2.3.4/css/autoFill.bootstrap4.min.css" rel="stylesheet" />
    



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

@extends('dashboard.layout')
@section('content')







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: fixed;">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">اضافة اعلان</h3>

      </div>
      <form  method="POST" action="/Post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">العنوان</label>
                        <input type="text" class="form-control" name="title"   placeholder="عنوان" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> صورة </label>
                        <input name="img" type="file" class="form-control" placeholder="" value="" accept=".png, .jpg, .jpeg">
                    </div>
                </div>
            </div>    
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pwd">المحتوى</label>
                        <textarea type="body" name="body"   value="Mouse"class="form-control"  placeholder="المحتوى" ></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!--  -->
<!--تعديل -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="position: fixed;">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">تعديل البيانات</h3>

      </div>
      <form   method="POST" action="/Post" id="editForm" enctype="multipart/form-data" >
      {{csrf_field()}}
      {{method_field('PUT')}}
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">العنوان</label>
                        <input id="title" type="text" class="form-control" name="title"   placeholder="عنوان" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> صورة </label>
                        <input id="img" name="img" type="file" class="form-control" placeholder="" value="" accept=".png, .jpg, .jpeg">
                        <span id="store_image" ></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="pwd">المحتوى</label>
                        <input type="text" name="body"   id="body" class="form-control"  placeholder="المحتوى" >
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        </div>
      </form>
    </div>
  </div>
</div>





<!--  -->


<!--  -->
  <div class="card">
    <div class="container">
        <div class="table-wrapper">
        
            <div class="table-title">
               <div class="row">
                 <div class="col-sm-12"> <h2 > الاعلانات </h2>
                   <div class="col-sm-8">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input  id="myInput"type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
    
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    اضافة اعلان
                    </button>
                </div>

            </div> <!--  -->
                <!-- Button trigger modal -->


                <div >
                    <table id="tableMain"  class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                    
                            <th scope="col">العنوان</th>
                            <th scope="col">المحتوى</th>
                            <th scope="col">صورة</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($Posts as $Post)
                             <tr>
                            
                                <td>{{$Post->title}}</td>
                                <td>{{$Post->body}}</td>
                                @if($Post->img)
                                    <td> 
                                     <img src="{{ url('storage/'.$Post->img) }}" height=200px; alt="{{$Post->img_title}}" title="{{ $Post->img_title }}"></td>
                                     <td hidden>{{$Post->img}}</td>
                                @else  
                                    <td>
                                    </td>
                                @endif
                                <td hidden>{{$Post->id}}</td>

                                <td>
                                 <a  class="edit " value="تعديل"><i class="material-icons" style="margin-top: 10px;">&#xE254;</i></a>

                                 <a href="#" class="view" title="View" data-toggle="tooltip" style="margin-top: 10px;"><i class="material-icons">&#xE417;</i></a>
                                   
                                    <form class="deleteMessage m-2" method="post" action="/Post/{{$Post->id}}" >
                                       {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                          <input type="submit" class="btn btn-danger material-icons" value="&#xE872;" >
                                     </form>

                                </td>
                             </tr>
                        
                             @endforeach
                        </tbody>

                    </table>
                    {{$Posts->links()}}
                 </div>
            </div>
        </div>
    </div>
<!--  -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'article-ckeditor' );
            </script>
        
        
        <script src="js/jquery.min.js"></script>

    
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>


        <script >
     $(document).ready(function() {
        
         $('.edit').on('click', function () {
         
        
          $tr =$(this).closest('tr');
            var data=$tr.children("td").map(function() {
                
            return $(this).text();
            }).get();
            console.log(data);

          $('#title').val(data[0]);
          $('#body').val(data[1]);
     

          $('#store_image').html("<img src={{ URL::to('/') }}/storage/" +data[3]+ " width='70' class='img-thumbnail' />");
          $('#store_image').append("<input type='hidden' name='hidden_image' value='"+data[3]+"' />");
   
          $('#id').val(data[4]);

         
          $('#editForm').attr('action','/Post/'+data[4]);
              $('#editModal').modal('show');
        
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