    <style>
        th{
            line-height: 14px;
        }
        td{
            line-height: 12px;
        }
    </style>
@if ($salarySheets)
    @if ($salarySheets->count() > 0)

        <div class="text-left">
            <div class="row">
                <div class="col-md-12">
                    <h6 style="color:black; border-bottom:1px solid;"><b>Employee salary report</b></h6>
                </div>
                
            </div>
        </div>

        <table id="dataTableExample1" class="table table-bordered mb-2">
            
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Month - Year</th>
                    <th>Invoice No</th>
                    <th>Status</th>
                    <th>Basic salary</th>
                    <th>Earning</th>
                    <th>Deduction</th>
                    <th>Gross Pay</th>
                    <th>Vat</th>
                    <th>Net salary</th>
                </tr>
            </thead>
            <tbody>
                
                @php
                    $totalBasicSalary = 0;
                    $totalEarn = 0;
                    $totalDeduction = 0;
                    $totalVat = 0;
                    $totalGrossPay = 0;
                    $totalNetSalary = 0;
                @endphp

                @foreach($salarySheets as $salarySheet)
                    @php
                        $totalBasicSalary += $salarySheet->basic_salary;
                        $totalEarn += $salarySheet->total_earn;
                        $totalDeduction += $salarySheet->total_deduction;
                        $totalVat += $salarySheet->vat;
                        $totalGrossPay += $salarySheet->gross_pay;
                        $totalNetSalary += $salarySheet->payable;
                    @endphp
                    <tr  class="text-center">
                        <td width="100">{{ $salarySheet->employee->adminname }}</td>                   
                        <td>{{ $salarySheet->employee->designation }}</td>                   
                        <td>{{ $salarySheet->month.' - '.$salarySheet->year }}</td>                   
                        <td>{{ $salarySheet->invoice_no ? $salarySheet->invoice_no : 'N/A'}}</td> 

                        <td>
                            @if($salarySheet->is_paid == 1)
                                <span class="badge badge-success pb-1">Paid</span>
                            @else
                            <span class="badge badge-warning pb-1">Generated</span>
                            @endif
                        </td>                   
                        <td>{{ round($salarySheet->basic_salary, 2) }}</td>                   
                        <td>{{ round($salarySheet->total_earn, 2) }}</td>                   
                        <td>{{ round($salarySheet->total_deduction, 2) }}</td>                   
                        <td>{{ round($salarySheet->gross_pay, 2) }}</td>                   
                        <td>{{ round($salarySheet->vat, 2) }}</td>                   
                        <td>{{ round($salarySheet->payable, 2) }}</td>                   
                    </tr>
                    
                @endforeach
            </tbody>
            <tfoot>
                <tr class="text-center text-dark">
                    <th class="text-right" colspan="5">Grand Total</th>                
                    <th>{{ round($totalBasicSalary, 2) }}</th>                
                    <th>{{ round($totalEarn, 2) }}</th>                
                    <th>{{ round($totalDeduction, 2) }}</th>                
                    <th>{{ round($totalGrossPay, 2) }}</th>                
                    <th>{{ round($totalVat, 2) }}</th>                
                    <th>{{ round($totalNetSalary, 2) }}</th>                
                </tr>
            </tfoot>
        </table>
            
            
    @else
        <span class="alert alert-danger mt-3 d-block">NO DATA FOUND</span>
    @endif
@else  
    <span class="alert alert-danger mt-3 d-block">NO DATA FOUND</span>
@endif

    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
    
    <script>
        $(document).ready(function () {
           
            var grandTotal = $('#grand_total').html();
            var topGrandTotal = $('#top_grand_total_value').html(grandTotal);
            
        });
    </script>