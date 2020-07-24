<style>
    th{line-height: 14px;}
    td{line-height: 11px;}
</style>
@if ($bookDueReports->count() > 0)

<div class="text-left">
    <div class="row">
        <div class="col-md-12">
            <h6 style="color:black; border-bottom:1px solid;"><b>Book issue report</b></h6>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="dataTableExample1" class="table table-bordered  table-hover mb-2">
        <thead>
            <tr class="text-center">
                <th>
                    SL
                </th>
                <th>Book Name</th>
                <th>Book No.</th>
                <th>Rack Number</th>
                <th>Issue-Return </th>
                <th>Issue To </th>
                <th>Card no </th>
                <th>Issued By </th>
                <th>Quantity </th>
                <th>Status </th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookDueReports as $bookDueReport)

            <tr class="text-center">
                <td>{{$loop->index + 1}}</td>
                <td>{{$bookDueReport->issuebook ? $bookDueReport->issuebook->title : 'Deleted'}}</td>
                <td>{{$bookDueReport->issuebook ? $bookDueReport->issuebook->book_no : 'Deleted'}}</td>
                <td>{{$bookDueReport->issuebook ? $bookDueReport->issuebook->Rack_no : 'Deleted'}}</td>
                <td>{{$bookDueReport->issuedate}} - {{$bookDueReport->returndate}}</td>
                <td>
                    {{$bookDueReport->libraryMember ? $bookDueReport->libraryMember->student->first_name .' '.$bookDueReport->libraryMember->student->last_name : 'Deleted' }}
                </td>
                <td>{{$bookDueReport->libraryMember ?  $bookDueReport->libraryMember->card_no : 'Deleted'}}</td>
                {{-- <td>{{$bookIssueReport->librarySteff->employee->adminname}}</td> --}}
                <td>{{$bookDueReport->issueby}}</td>
                <td>{{$bookDueReport->qty}}</td>
                <td>
                    {{-- <i class="fas fa-thumbs-up" title=""></i> --}}
                    @if ($bookDueReport->returned_status == 0)
                    <span class="badge badge-danger pb-1"><b>Book due</b> </span> 
                    @else
                        <span class="badge badge-success pb-1"><b>Book returned</b> </span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<span class="alert alert-danger mt-3 d-block">NO DATA FOUND</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>