@extends('layouts.admin')

@section('users')
    active 
@endsection

@section('linkcss')
  
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  
@endsection

@section('dashboradlink')
    users
@endsection

@section('content')
<!-- start    table    -->

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
                                            edit
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
                    "ajax": "{{ route('data.getdata') }}",
                    "columns": [
                        // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                        { "data" : 'name' , 'name' : 'name'},
                        { "data" : 'email' , 'name' : 'email'},
                        {"data": 'created_at', "name": 'created_at'},
                        {"data": 'updated_at', "name": 'updated_at'},
                        {"data": 'action', "name": 'edit', "orderable": false, "searchable": false},
                     
                      
                    ]
                });
    });
    </script>
@endsection



<!-- End   table   -->
@endsection