<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
    <thead>
        <tr class="text-center">
            <th>Template Name</th>
            <th>Heading</th>
            <th>Title</th>
            <th>Exam</th>
       
            <th>Footer Text</th>
            <th>Right Logo</th>
            <th>Left Logo</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($adminCardDesignees as $adminCardDesigne)
        <tr class="text-center">
            <td>{{ Str::limit($adminCardDesigne->template_name, 15) }}</td>
            <td>{{ Str::limit($adminCardDesigne->heading, 15) }}</td>
            <td>{{ Str::limit($adminCardDesigne->title, 15) }}</td>
            <td>{{ $adminCardDesigne->exam_id ? $adminCardDesigne->exam->name : 'N/A' }}</td>
         
            <td>{{ $adminCardDesigne->footer_text }}</td>
            <td> 
                @if ($adminCardDesigne->left_logo)
                    <img width="50" height="35" class="rounded" src="{{asset('public/uploads/admit_card_logo/'.$adminCardDesigne->left_logo)}}" alt="">  
                @else
                    'N/A'
                @endif
                 
            </td>
            <td>
                @if ($adminCardDesigne->right_logo)
                    <img width="50" height="35" class="rounded" src="{{asset('public/uploads/admit_card_logo/'.$adminCardDesigne->right_logo)}}" alt=""> 
                @else
                    'N/A'  
                @endif
                
            </td>
            @if($adminCardDesigne->status == 1)
            <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
            @else
            <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
            @endif
          
            <td data-id="{{$loop->index}}">
                @if($adminCardDesigne->status == 1)
                <a href="{{ route('admin.exam.master.admit.card.design.change.status', $adminCardDesigne->id ) }}"
                    class="btn btn-success change_status_button btn-sm ">
                    <i class="fas fa-thumbs-up"></i></a>
                @else
                <a href="{{ route('admin.exam.master.admit.card.design.change.status', $adminCardDesigne->id ) }}"
                    class="btn btn-danger change_status_button btn-sm">
                    <i class="fas fa-thumbs-down"></i>
                </a>
                @endif
            | <a href="#" data-id="{{ $adminCardDesigne->id }}" title="show" class="show_admit_card_design btn btn-sm btn-info text-white">
                <i class="fas previous_show_button-{{ $loop->index }} fa-eye"></i>
                <img style="display:none;" height="13" width="13" class="button_show_loader-{{ $loop->index }} show_loading" src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
            </a> |
            <a href="#" data-id="{{ $adminCardDesigne->id }}" title="edit" class="edit_admit_card_design btn btn-sm btn-blue text-white">
                <i class="fas previous-{{ $loop->index }} fa-pencil-alt"></i>
                <img style="display:none;" height="13" width="13" class="button_loader-{{ $loop->index }} loading" src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
            </a> 
            |
                <a id="delete_admit_designe" href="{{ route('admin.exam.master.admit.card.design.delete', $adminCardDesigne->id) }}"
                    class="btn btn-danger btn-sm text-white" title="Delete">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>

