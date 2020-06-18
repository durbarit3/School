<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($classSubjects->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Class sujcets report</b></h6>
        </div>
       
            <table class="table table-sm table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        <th>Serial No</th>
                        <th>Subject Name</th>
                        <th>Subject Type</th>
                        <th colspan="1">Subject Code</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($classSubjects as $classSubject)
                        
                        <tr  class="text-center">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $classSubject->subject->name }}</td>
                            <td>{{ $classSubject->subject->type == 1 ? 'Theory' : 'Practical' }}</td>
                            <td> {{ $classSubject->subject->code }}</td>                       
                        </tr>

                    @endforeach

                </tbody>
            </table>
           
        
@else
    <span class="alert alert-danger d-block mt-3">No subject available in this class section</span>
@endif

