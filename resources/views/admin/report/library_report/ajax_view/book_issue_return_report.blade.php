<style>
    th{line-height: 14px;}
    td{line-height: 11px;}
</style>
@if ($bookIssueReturnReports->count() > 0)

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
            @foreach($bookIssueReturnReports as $bookIssue)

            <tr class="text-center">
                <td>{{$loop->index + 1}}</td>
                <td>{{$bookIssue->issuebook ? $bookIssue->issuebook->title : 'Deleted'}}</td>
                <td>{{$bookIssue->issuebook ? $bookIssue->issuebook->book_no : 'Deleted'}}</td>
                <td>{{$bookIssue->issuebook ? $bookIssue->issuebook->Rack_no : 'Deleted'}}</td>
                <td>{{$bookIssue->issuedate}} - {{$bookIssue->returndate}}</td>
                <td>
                    {{$bookIssue->libraryMember ? $bookIssue->libraryMember->student->first_name .' '.$bookIssue->libraryMember->student->last_name : 'Deleted' }}
                </td>
                <td>{{$bookIssue->libraryMember ?  $bookIssue->libraryMember->card_no : 'Deleted'}}</td>
                {{-- <td>{{$bookIssueReport->librarySteff->employee->adminname}}</td> --}}
                <td>{{$bookIssue->issueby}}</td>
                <td>{{$bookIssue->qty}}</td>
                <td>
                    {{-- <i class="fas fa-thumbs-up" title=""></i> --}}
                    @if ($bookIssue->returned_status == 0)
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