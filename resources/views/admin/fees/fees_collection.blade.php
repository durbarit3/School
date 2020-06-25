@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-12">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Fees Details of <strong>hgd</strong></span>
                        </div>
                    </div>
                   
                </div>
        </div>
        
        <div class="panel_body">
       
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>Fees Type</th>
                            <th>Fees Code</th>
                            <th>Due Date </th>
                            <th>Status </th>
                            <th>Amount </th>
                            <th>Payment ID </th>
                            <th>Mode </th>
                            <th>Date </th>
                            <th>Discount </th>
                            <th>Fine </th>
                            <th>Paid </th>
                            <th>Balance </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                       


      

                        


                    @foreach($collections->collection as $row)
                    
                       
                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            
                            
                            <td>{{$row['fees_type']}}</td>
                            <td>{{$row['fees_code']}}</td>
                            <td>{{$row['due_date']}}</td>
                            <td>{{$row['is_paid'] ?'Paid':'UnPaid' }}</td>
                            <td>{{$row['amount']}}</td>
                            <td>{{$row['payment_id']}}</td>
                            <td>{{$row['mode']}}</td>
                            <td>{{$row['discount']}}</td>
                            <td>{{$row['fine']}}</td>
                            <td>{{$row['paid']}}</td>
                            <td>dsgfdsgfds</td>
                       
                            <td>
                                
                                <a href="{{ route('room.type.status.update', 1) }}" class="btn btn-success btn-sm ">
                                    <i class="fas fa-thumbs-up"></i></a>
                                
                                <a href="{{ route('room.type.status.update', 2 ) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-thumbs-down"></i>
                                </a>
                                
                            </td>
             
                            <td>
                                | <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$row['fees_id']}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                <a id="delete" href="" class="btn btn-danger btn-sm text-white" title="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach
                     
               
                         <tr  class="header">
                           <td colspan="4">Header</td>
                           <td>dsafdsaf</td>
                        </tr>

                        

      
                    
                       

                    </tbody>
                </table>
            </div>
        </div>
  
        <!--/ panel body -->
    </div>
    <!--/ panel -->
</section>
<!--/ page content -->



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Class 1 General: jun-month-fees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.fees.collection.get') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Date:</label>
                        <div class="col-sm-8">
                            <input type="text" name="id" id="id">
                            <input type="text" name="collection_id" value="{{$collections->id}}" id="collection_id">
                            <input type="date" class="form-control" name="date" id="date" required>
                            
                        </div>


                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Amount:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="number" id="number" required>
                            
                        </div>
                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Discount Group:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="discount_group" id="number" required>
                            
                        </div>
                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Discount:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="discount" id="discount" required>
                            
                        </div>


                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Payment Mode:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="payment_mode" id="payment" required>
                            
                        </div>


                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right mt-2">Code:</label>
                        <div class="col-sm-8 mt-2">
                            <textarea rows="3" class="form-control" id="description" name="description" require></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');
            $("#id").val(id);
        });
    });
</script>

@endpush