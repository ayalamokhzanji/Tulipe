<head>
<meta name="csrf_token" content="{{ csrf_token() }}" />
<style>
    #editServiceModal{
        top:-70px;
    }
</style>
</head>

@extends('dashboard.layout')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اضافة خدمة جديدة</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/user/add/service') }}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> اسم الخدمة </label>
                                    <input name="name" type="text" class="form-control" placeholder="الاسم" value="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> سعر الخدمة </label>
                                    <input name="price" type="number" class="form-control" placeholder="السعر" value="" required step="0.5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> نوع الخدمة </label>
                                    <select class=" form-control selectpicker show-tick dropdown-secondary " name="type" id="" data-live-search="true" data-size="6" required>
                                        <option  data-tokens="" value="" selected>اختر نوع الخدمة</option>
                                    
                                        @foreach ($serviceType as $type)
                                            <option  data-tokens="{{ $type->type }}" value="{{ $type->id }}">{{ $type->type}}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> صورة </label>
                                    <input name="img" type="file" class="form-control" placeholder="" value="" accept=".png, .jpg, .jpeg" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> عنوان للصورة </label>
                                    <input name="imgTitle" type="text" class="form-control" placeholder="العنوان" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> وصف لهذه الخدمة </label>
                                    <textarea name="des" rows="4" cols="80" class="form-control" placeholder="الوصف" value="" maxlength="91"> </textarea>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info btn-fill" value="اضافة">
                    </form>
                </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">الخدمات المضافة</h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table id="tableMain" class="table table-hover table-striped">
                        <thead>
                            <th class="m-auto">الاسم</th>
                            <th>السعر</th>
                            <th>صورة </th>
                            <th>عنوان الصورة </th>
                            <th> وصف</th>
                            <th>نوع الخدمة </th>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td> {{ $service->name }}</td>
                                    <td> {{ $service->price }}</td>
                                    @if($service->img)
                                        <td> <img src="{{ url('storage/'.$service->img) }}" height=200px; alt="{{$service->img_title}}" title="{{ $service->img_title }}"></td>
                                    @else  
                                        <td></td>
                                    @endif
                                    <td> {{ $service->img_title }}</td>
                                    <td> {{ $service->description }}</td>
                                    <td> {{ $service->type->type }}</td>
                                    <td id="id" hidden> {{ $service->id }}</td>
                                    <td hidden> {{ $service->type->id }}</td>
                                    <td hidden>{{ $service->img }}</td>
                                    <td>
                                        <input type="button" class="edit btn btn-primary m-2" value="تعديل">
                                        

                                        <form class="deleteMessage m-2" method="post" action="user/service/{{$service->id}}" >
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                                <input type="submit" class="btn btn-danger" value="حذف" >
                                            
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


    <div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="serviceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="serviceLabel">خدماتك</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form   method="POST" action="{{ url('user/edit/service') }}" enctype="multipart/form-data" id="editForm">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" class="form-control" name="name"  id="name"  placeholder="الاسم">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">السعر</label>
                                    <input type="text" class="form-control" name="price"   id="price" placeholder="السعر">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="price">السعر</label>
                                    <select class=" form-control selectpicker show-tick dropdown-secondary " name="type" data-live-search="true" data-size="6">
                                        <option id="type" value=""  selected></option>
                                        @foreach($serviceType as $type)
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="img">صورة توضيحية</label>
                                    <input type="file" class="form-control" name="img" id="img" value="" >
                                    <img id="store_image" src="" style="width: 70%;"class=" img-thumbnail">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="img_title">عنوان الصورة</label>
                                    <input type="text" class="form-control" name="img_title"   id="img_title" placeholder="عنوان الصورة ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">الوصف</label>
                                    <textarea class="form-control" name="description"   id="description" placeholder="وصف الخدمة"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </div>
                <form>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script> 

        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
        
            $('.edit').on('click', function () {
         
                $tr =$(this).closest('tr');
                var data=$tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

                $('#name').val(data[0]);
                $('#price').val(data[1]);
               // $('#img').val(data[2]);
                $('#img_title').val(data[3]);
                $('#description').val(data[4]);
                $('#type').val(data[7]);
                $('#id').val(data[6]);
                 
                $('#type').text(data[5]);
                $('#store_image').attr('src','/storage/'+data[8]);
  
                $('#editForm').attr('action','user/edit/service/'+data[6]);
                $('#editServiceModal').modal('show');
       
            });
        });
    </script>

@endsection