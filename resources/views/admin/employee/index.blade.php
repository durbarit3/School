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

.employee_list_top_menu ul li a {color: white;font-size: 15px; padding: 0px 6px;}

.employee_list_top_menu {
    background: darkgrey;
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
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Employee List</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-1">
                        <div class="employee_list_top_menu">
                            <ul>
                                <li><a class="menu_active" href="">Admin</a> </li>
                                <li><a href="">Teacher</a> </li>
                                <li><a href="">Librarian</a> </li>
                                <li><a href="">Accountant</a> </li>
                                <li><a href="">Clarck</a> </li>
                                <li><a href="">Driver</a> </li>
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
                            @foreach($admins as $admin)
                            <tr class="text-center">
                                <td>{{ $admin['employee_id'] }}</td>
                                <td>{{ $admin['name'] }}</td>
                                <td><img height="60" width="50"
                                        src="{{ asset('public/uploads/employee/'.$admin['avater']) }}" alt=""></td>
                                <td>{{ $admin['designation'] }}</td>
                                <td>{{ $admin['department']['name'] }}</td>
                                <td>{{ $admin['email'] }}</td>
                                <td>{{ $admin['phone'] }}</td>
                                @if($admin['status'] == 1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                                <td>
                                    @if($admin['status']==1)
                                    <a href="{{ route('admin.employee.status.update', $admin['id'] ) }}"
                                        class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.employee.status.update', $admin['id'] ) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                    | <a href="{{ route('admin.employee.edit', $admin['id']) }}"
                                        class="btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="{{ route('admin.employee.delete', $admin['id']) }}"
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
