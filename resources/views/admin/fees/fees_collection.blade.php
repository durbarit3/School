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
                            <th>Payment ID </th>
                            <th>Mode </th>
                            <th>Month </th>
                            <th>Year </th>
                            <th>Paid Date </th>
                            <th>Amount </th>
                            <th>Discount </th>
                            <th>Fine </th>
                            <th>Paid </th>
                            <th>Balance </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    @foreach($collections->collection as $row)
                    
                        <tr class="text-center">
                            <td>
                                {{ $loop->index + 1 }}
                            </td>                            
                            <td>{{ $row['fees_type'] }}</td>
                            <td>{{ $row['fees_code'] }}</td>
                            <td>{{ $row['due_date'] }}</td>
                            <td>{!! $row['is_paid'] ?'<span class="badge badge-success py-1">Paid</span>':'<span class="badge badge-danger py-1">UnPaid</span>' !!}</td>
                            <td>{{ $row['payment_id'] }}</td>

                            @if($row['mode'] == 1)
                                <td>Cash</td>
                            @elseif($row['mode'] == 2)
                                <td>Check</td>
                            @elseif($row['mode'] == 3)
                                <td>DD</td>
                            @else
                                <td>N/A</td>
                            @endif

                            <td>{{ $row['month'] }}</td>
                            <td>{{ $row['year'] }}</td>
                            <td>{{ $row['paid_date'] ? $row['paid_date'] : 'N/A' }}</td>
                            <td>{{ $row['amount'] }}</td>
                            <td>{{ $row['discount'] == null ? 0 : $row['discount'] }}</td>
                            <td>{{ $row['fine'] == null ? 0 : $row['fine'] }}</td>

                            @if($row['is_paid'])
                                <td>{{ $row['amount'] }}</td>
                            @else
                                <td>0</td>
                            @endif
    
                            @if(!$row['is_paid'])
                                <td>{{ $row['amount'] }}</td>
                            @else
                                <td>0</td>
                            @endif

                            <td>
                                @if (json_decode($userPermits->fees_collection_module, true)['fees_collection']['add'] == 1)
                                    <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$row['fees_id']}}" title="edit" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                @else   
                                    <b>N/A</b>
                                @endif
                            </td>
                        </tr>

                        @endforeach
                     
                         <tr  class="text-center">
                           <td colspan="10" class="text-right"><b>Grand Total</b> </td>
                           <td><b>{{ $total_amount }}</b></td>
                           <td><b>{{ $total_discount? $total_discount: 0 }}</b></td>
                           <td><b>{{ $total_fine ? $total_fine : 0 }}</b> </td>
                           <td><b>{{ $total_paid ? $total_paid : 0 }}</b> </td>
                           <td><b>{{ $total_blance ? $total_blance : 0 }}</b></td>
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
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="collection_id" value="{{$collections->id}}" id="collection_id">
                            <input type="date" class="form-control" name="date" id="date" required>
                            
                        </div>

                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Amount:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="amount" required>
                        </div>
                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Discount Group:</label>
                        <div class="col-sm-8">
                            <div class="form-group">    
                                <select class="form-control" name="discount_group">
                                    @foreach($discounts as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Discount:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="discount" id="discount">
                        </div>

                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Fine:</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="fine">
                        </div>

                        <label for="inputEmail3" class="col-sm-3 mt-2 col-form-label text-right">Payment Mode:</label>
                        <div class="col-sm-8 py-2">
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Cash</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">Check</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="mode" id="inlineRadio3" value="3">
                                <label class="form-check-label" for="inlineRadio3">DD</label>
                            </div>
                            
                        </div>

                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right mt-2">Node:</label>
                        <div class="col-sm-8 mt-2">
                            <textarea rows="3" class="form-control" id="description" name="description"></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>

                        @if (json_decode($userPermits->fees_collection_module, true)['fees_collection']['add'] == 1)
                            <button type="submit" class="btn btn-blue">Submit</button>
                        @endif
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