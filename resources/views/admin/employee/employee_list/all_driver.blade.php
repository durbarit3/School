@extends('admin.master')
@push('css')
    <style>
        .employee_list_top_menu {
        display: flex;
        flex-direction: row;
        }

.employee_list_top_menu ul {
    display: inline-flex;
}

.employee_list_top_menu ul li {
    text-decoration: none;
    list-style: none;
    margin-left: 11px;
}

.employee_list_top_menu ul li a:hover {
    border-bottom: 2px solid azure;
}

.employee_list_top_menu ul li a {color: white;font-size: 15px; padding: 0px 6px;}

.employee_list_top_menu {
    
    padding: 5px;
    border-radius: 6px;
}
.menu_active{
    border-bottom: 2px solid azure;
}
    </style>
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                
                <div class="row">
                    <div class="col-md-12 mt-1">
                        <div class="employee_list_top_menu">
                            <ul>
                                <li><a href="{{ route('admin.employee.all.admins') }}"><i class="fas fa-user-friends"></i> Admin</a> </li>
                                <li><a href="{{ route('admin.employee.all.teacher') }}"><i class="fas fa-user-friends"></i> Teacher</a> </li>
                                <li><a href="{{ route('admin.employee.all.librarian') }}"><i class="fas fa-user-friends"></i> Librarian</a> </li>
                                <li><a href="{{ route('admin.employee.all.accountant') }}"><i class="fas fa-user-friends"></i> Accountant</a> </li>
                                <li><a href="{{ route('admin.employee.all.clerk') }}"><i class="fas fa-user-friends"></i> clerk</a> </li>
                                <li><a class="menu_active" href="{{ route('admin.employee.all.driver') }}"><i class="fas fa-user-friends"></i> Driver</a> </li>
                                <li><a href="{{ route('admin.employee.all.guard') }}"><i class="fas fa-user-friends"></i> Security Guard</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>photo</th>
                                <th>Designation</th>
                                <th>Department/Group</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drivers as $driver)
                            <tr class="text-center">
                                <td>{{ $driver['employee_id'] }}</td>
                                <td>{{ $driver['name'] }}</td>
                                <td><img height="60" width="50"
                                        src="{{ asset('public/uploads/employee/'.$driver['avater']) }}" alt=""></td>
                                <td>{{ $driver['designation'] }}</td>
                                <td>{{ $driver['department']['name'] }}</td>
                                <td>{{ $driver['email'] }}</td>
                                <td>{{ $driver['phone'] }}</td>
                                @if($driver['employee_status'] == 1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                                <td>
                                    @if($driver['employee_status']==1)
                                    <a href="{{ route('admin.employee.status.update', $driver['id'] ) }}"
                                        class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.employee.status.update', $driver['id'] ) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                    | <a href="{{ route('admin.employee.edit', $driver['id']) }}"
                                        class="btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="{{ route('admin.employee.delete', $driver['id']) }}"
                                        class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection