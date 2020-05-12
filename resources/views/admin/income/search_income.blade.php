
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Income Search</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                        <a href="{{ route('admin.income.index') }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-plus"></i></span> <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-lg-12">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Income Search Form</span></div>
        </div>
        <div class="panel_body">
        <form action="{{ route('admin.expanse.search') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label >Year</label>
                        <select required name="year" class="form-control">
                            <option value="">Select Year</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Date</label>
                        <input type="date" value="{{ old(date('')) }}" class="form-control" name="date" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
        </form>
        </div>
        @if ($searchIncomes)
            @if ($searchIncomes->count() > 0)

            <div class="panel_body">
                
                <div class="table-responsive">
                        <div class="text-center">
                            <h6 class="">Search results</h6>
                            <hr>
                        </div>
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>Invoice No</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Expanse Head</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($searchIncomes as $searchIncome)
                            <tr class="text-center">
                                <td>{{ $searchIncome->invoice_no }}</td>
                                <td>{{ $searchIncome->date }}</td>
                                <td>{{ $searchIncome->month }}</td>
                                <td>{{ $searchIncome->year }}</td>
                                <td>{{ $searchIncome->ExpanseHeader->name }}</td>
                                <td>{{ $searchIncome->note }}</td>
                                @if($searchIncome->status==1)
                                <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                                <td>{{$searchIncome->amount}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="text-center mt-3 text-light bg-secondary p-2">
                <h6>No Date Found!</h6>
            </div>
            @endif
        @endif
    </div>
</div>
</div>
</section>
</div>

@endsection
