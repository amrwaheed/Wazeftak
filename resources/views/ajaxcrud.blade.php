@extends('layouts.admin')

@section('users')
    active 
@endsection

@section('linkcss')
  
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('dashboradlink')
    users
@endsection

@section('content')
<!-- start    table    -->
<div class="alert alert-success" id="deletedalert" role="alert" style="display:none;">
<button type="button" class="close" data-dismiss="alert" aria-label="Close" >
  <span aria-hidden="true">&times;</span>
</button>
  This is a success alert—check it out!
</div>
<div class="tables mb-3">
    <div class="container">
        <div class="row my-2">
            <div class="col-sm-12  table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl m-auto" >
                    <table class="table table-hover mytable" id="mytable">
                    
                            <thead class="thead-light" >
                                <tr>
                                  
                                    <th scope="col">
                                        Name
                                    </th>
                                    <th scope="col">
                                       E-mail
                                    </th>
                                     <th scope="col">
                                            created_at
                                    </th>
                                   <th scope="col">
                                            updated_at
                                    </th>
                                   
                                    <th scope="col">
                                            action
                                    </th>
                                  
                                   
                                </tr>
                            </thead>
                           
                            <tbody>
                            </tbody>
        
                        </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal delete -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
              <meta name="csrf-token" content="{{ csrf_token() }}" />

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             Are You sure your want to remove this data ???!!
            </div>
            <div class="modal-footer">
              <button type="button" name="ok_button" id="ok_button" class="btn btn-danger" >Ok</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             
            </div>
          </div>
        </div>
      </div>
<!-- Modal  update-->
<div class="modal fade" id="formModal"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="container">
        <div class="row">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="form_result">
                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </span>
                        <form action="Edit" method="POST" id="sample_form" class="form-horizontal ">
                            {{ csrf_field() }}
                            {!! method_field('PUT') !!}
                            <div class="form_group">
                                <label for="" class="control-lable col-md-4 "> Name : </label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="name" class="form-control" >
                                </div>
                            </div>
            
                            <div class="form_group">
                                <label for="" class="control-lable col-md-4 "> email : </label>
                                <div class="col-md-8">
                                    <input type="text" name="email" id="email" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group my-2" style="text-align: center" >
                                <input type="hidden" name="hidden_id" id="hidden_id">
                                <input type="submit" name="action_button" id="action_button"
                                        class="btn btn-warning" value="update">
                            </div>
            
            
            
                        </form>
            
                    </div>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>  --}}
                    </div>
        </div>

      </div>
    </div>
  </div>





<!-- End   table   -->
@endsection

@section('linkjs')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/js/users.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
             'use strict';
            $('#mytable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('ajaxcrud.index') }}",
                "columns": [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {
                    data : 'name' ,
                    name : 'name'
                },
                {
                    data : 'email' ,
                    name : 'email'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at', 
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

                ]
            });
        

});
    </script>
<script type="text/javascript">
    $(document).ready(function() {
        // 'use strict';
    
        $(document).on('click' ,".edit", function(){
           
            var id=$(this).attr('id');
         
           
            $('#form_result').html('');
            $.ajax({
                url:"ajaxcrud/"+id+"/edit",
                dataType : "json",
                success:function (html) {
                $('#name').val(html.data.name);
                $('#email').val(html.data.email);
                $("#hidden_id").val(html.data.id);
                $('.modal-title').text('Edit New Record');
                $('#action_button').val('Edit');
                $('#action').val('Edit');
               
              

                }
            });

        });      


      
       
       $('#sample_form').on('submit', function (event) {
              event.preventDefault(); 
             
              if($(this).attr('action') == 'Edit')
              {
                var id=$("#hidden_id").val();
               
                  $.ajax({
                        url: "ajaxcrud/"+id,
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success:function (data) {
                            var html='';
                            if (data.errors) {
                                html = '<div class="alert alert-danger"> ';
                                    for (var count = 0; count < data.errors.length; count++) {
                                        html+= '<p>' + data.errors[count] + '</p>';
                                        
                                    }
                                
                                    html += '</div>';
                            }
                            if (data.success) {
                                html = '<div class="alert alert-success">  ' + data.success + '</div>';
                                $('#sample_form')[0].reset();
                                setTimeout(() => {
                                    $("[data-dismiss=modal]").trigger({ type: "click" });
                                }, 2000);
                                
                                $('#mytable').DataTable().ajax.reload();
                            }
                            $('#form_result').html(html);

                        }
                        // ,
                        // error:function(data) {
                            
                        // }
                  });
              }

         
          });

          var user_id;
          $(document).on('click' ,".delete", function(){
              user_id=$(this).attr('id');
           
          });

          $('#ok_button').click(function () {
              $.ajax({
                url:"/ajaxcrud/"+user_id,
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                type: 'DELETE',
                  beforeSend:function(){
                    $('#ok_button').text("Deleting .....");
                  },
                  success:function(data){
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                    $('#deletedalert').show();
                        $('#mytable').DataTable().ajax.reload();
                  }
              })
          });

    });
</script>

@endsection