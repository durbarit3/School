@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All roles</span>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                
                                <th>Serial</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr class="text-center">
                                
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$role->name}}</td>
                                
                                <td>
                                    <a href="{{ route('admin.gen.settings.role.permit.section', [$role->role_known_id, $role->name]) }}" class="btn btn-info btn-sm text-white" >
                                        <i class="fas fa-pencil-alt"></i>
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
