@if ($employees->count() > 0)
<div class="">
    <div class="row">
        <div class="col-md-12">
            <h6 class="text-left text-dark"><b>Employee list according to role</b></h6>
            <hr class="p-0 m-0 mb-3">
        </div> 
    </div>
    
    <table class="table table-bordered table-sm table-hover mb-2">
        <thead>
            <tr class="text-center">
                <th>Serial</th>
                <th>Employee ID</th>
                <th>Designation</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Phone</th>
                <th>Paid Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($employees as $employee)
            <tr class="text-center">
                <td>{{ $employee->key + 1 }}</td>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->designation }}</td>
                <td>{{ $employee->adminname}}</td>
                
                <td>
                    <img loadin="lazy" height="40" width="40" src="{{ asset('public/uploads/employee/'.$employee->avater) }}">
                </td>
                
                <td>{{ $employee->phone }}</td>
                @php
                    $generatedSalary = App\EmployeeSalary::where('employee_id', $employee->id)->where('month', $month)->where('year', $year)->first();
                @endphp

                @if (!$generatedSalary)
                    <td><p class="badge badge-danger pb-1">Not-Generated</p></td>
                @else
                    @if ($generatedSalary->is_paid == 0)
                        <td><span class="badge text-dark pb-1 badge-warning">Generated</span></td>
                    @else 
                        <td><span class="badge badge-success pb-1">Paid</span></td>
                    @endif
                @endif
                
                <td>
                    
                    @if (!$generatedSalary)
                        @if (json_decode($userPermits->human_resource_module, true)['employee_salary']['add'] == 1)
                            <a data-id="{{ $employee->id }}" class="btn text-white btn-sm btn-blue salary_generate_button" href="{{ route('admin.hr.employee.salary.generate.view',[$employee->id, $month, $year]) }}">Generate salary</a>
                        @else
                            <b>N/A</b>    
                        @endif
                    @else
                        @if ($generatedSalary->is_paid == 0)
                            @if (json_decode($userPermits->human_resource_module, true)['employee_salary']['add'] == 1)
                                <a data-id="{{ $employee->id }}" class="btn btn-sm btn-blue text-white salary_pay_button" 
                                href="{{route('admin.hr.employee.salary.pay.view',[$employee->id, $month, $year])}}">
                                    Process to pay
                                </a>
                            @else
                                <b>N/A</b>
                            @endif
                        @else 
                            <a data-id="{{ $employee->id }}" class="btn btn-sm btn-blue paySlipButton text-white" href="{{ route('admin.hr.employee.salary.pay.slip',[$employee->id, $month, $year]) }}">Pay slip</a>
                        @endif
                    @endif
                    <button style="display: none;" class="btn btn-sm btn-blue loading_button{{ $employee->id }}" type="button">Please wait ...</button>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
       
</div>    
@else 
<span class="alert alert-primary d-block">There is no employee according to this role</span>   
@endif