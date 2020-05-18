@foreach ($staffs as $staff)
<div class="email-item">
    <div class="vd_checkbox checkbox-success">
        <input type="checkbox" id="checkbox-1" value="{{ $staff->email }}">
        <label class="filter-name" for="checkbox-1">
            <em value="{{ $staff->email }}" class="font-normal">{{ $staff->adminname }}</em> 
        </label>
    </div>
</div>
@endforeach