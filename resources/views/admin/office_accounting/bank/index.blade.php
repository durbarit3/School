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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Banks</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->office_accounts_module, true)['bank']['view'])
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add new Bank</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
       
            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                
                                <th>Bank Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banks as $bank)
                            <tr class="text-center">
                                <td>{{ $bank->bank_name }}</td>
                              
                                @if($bank->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                        
                                <td data-id="{{$loop->index}}">
                                    @if (json_decode($userPermits->office_accounts_module, true)['bank']['edit'])
                                        @if($bank->status==1)
                                        <a href="{{ route('admin.office.account.bank.change.status', $bank->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.office.account.bank.change.status', $bank->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                        |
                                    @endif

                                <a href="#" data-id="{{ $bank->id }}" title="edit" class="edit_bank edit_button btn btn-sm btn-blue text-white"><i class="fas previous-{{ $loop->index }} fa-pencil-alt"></i><img height="13" width="13" class="button_loader-{{ $loop->index }} loading" src="{{asset('public/admins/images/preloader4.gif')}}" alt=""></a> 

                                @if (json_decode($userPermits->office_accounts_module, true)['bank']['delete'])
                                |  <a id="delete" href="{{ route('admin.office.account.bank.delete', $bank->id) }}"
                                        class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                @endif
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

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Bank</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.office.account.bank.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right"><b>Bank Name </b> :</label>
                            <input type="text" class="form-control" placeholder="Bank name" value="" name="name" required>
                        </div>
                    </div>
                   

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        @if (json_decode($userPermits->office_accounts_module, true)['bank']['add'])
                            <button type="submit" class="btn btn-blue">Update</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
    <script>
        $('.loading').hide();
        $(document).ready(function () {
           $(document).on('click', '.edit_bank', function(){
            var id = $(this).closest('td').data('id');
            $('.previous-'+id).hide();
            $('.button_loader-'+id).show();
            
               var bank_id = $(this).data('id');
               $.ajax({
                   url:"{{ url('admin/office/accounts/bank/edit') }}" + "/" + bank_id,
                   type:'get',
                   success:function(data){

                       $('.edit_modal_body').empty();
                       $('.edit_modal_body').append(data);
                       $("#editModal").modal("show");
                       $('.previous-'+id).show();
                       $('.button_loader-'+id).hide();
                       
                   }
               });
           });
       });

    </script>
@endpush

