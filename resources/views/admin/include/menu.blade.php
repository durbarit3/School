<!-- sidebar area -->
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{ route('admin.home') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Home</span>
                </a>
            </li>
               <li class="single-nav-wrapper {{ Request::is('admin/academic*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Student</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a href="{{ route('student.create') }}"> Student Admission</a>
                        <a href="{{ route('student.index') }}">  Student Details</a>
                    </li>

                </ul>
            </li>

            <li class="single-nav-wrapper">
                <a href="{{ route('category.index') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Categories</span>
                </a>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/academic*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Academic</span>
                </a>
                <ul class="dashboard-menu">
                    <li>
                        <a href="{{ route('admin.class.index') }}"> Class</a>
                        <a href="{{ route('academic.assign.class.teacher.index') }}"> Asign class teacher</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.academic.subject.index') }}"> Subject </a>
                        <a href="{{ route('admin.academic.assign.all.assigned.subject') }}"> Asign subject to class</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.academic.section.index') }}"> Section </a>
                    </li>
                </ul>
            </li>


            <li class="single-nav-wrapper {{ Request::is('admin/transport*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">Transport</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('admin.route.index') }}">Routes</a></li>
                    <li><a href="{{ route('admin.vehicle.index') }}">Vehicles</a></li>
                    <li><a href="{{ route('admin.assign.vehicle.index') }}">Assign Vehicle</a></li>
                    <li><a href="">Student transport report (pending)</a></li>
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/expanses*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">Expanses</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ route('admin.expanse.index') }}">expanse</a></li>
                    <li><a href="{{ route('admin.expanse.search') }}">Search expanse</a></li>
                    <li><a href="{{ route('admin.expanse.header.all') }}">expanse header</a></li>
                </ul>
            </li>

            <li class="single-nav-wrapper {{ Request::is('admin/employee*') ? 'mm-active' : '' }}">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">Emplyees</span>
                </a>
                <ul class="dashboard-menu">
                <li><a href="{{ route('admin.employee.index') }}">Employee List</a></li>
                    <li><a href="{{ route('admin.employee.create') }}">Add Employee</a></li>
                    <li><a href="#">Search Employee</a></li>

                </ul>
            </li>

            <!-- Menus Area start from here -->

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Setting</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.menu.setting')}}">Menus</a></li>
                </ul>
            </li>
            <!-- Menus area end from here -->


            <!-- Hostel area start -->

            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Hostel</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('hostel.addroom')}}">Hostel Room</a></li>
                    <li><a href="{{route('room.type')}}">Room Type</a></li>
                    <li><a href="{{route('admin.hostel')}}">Hostel</a></li>
                    <li><a href="chart-float.html">Student Hostel Report</a></li>
                </ul>
            </li>

            <!-- Hostel area end -->

             <!-- Hostel area start -->

             <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Inventory</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('inventory.item.stock.index')}}">Add Item Stock</a></li>
                    <li><a href="{{route('inventory.category.index')}}">Item Category</a></li>
                    <li><a href="{{route('item.index')}}">Items Store</a></li>
                    <li><a href="{{route('admin.inventory.supplier')}}">Supplier</a></li>
                    <li><a href="{{route('admin.item.index')}}">Add Items</a></li>
                    <li><a href="chart-float.html">Student Hostel Report</a></li>
                </ul>
            </li>

            <!-- Hostel area end -->

               <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Library</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.book.index')}}">Book List</a></li>
                    <li><a href="{{route('admin.library.members')}}">Library Member</a></li>
                    <li><a href="{{route('admin.library.staff')}}">Library Staff</a></li>
                </ul>
            </li>


               <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Fees Collection</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{route('admin.fees.reminder')}}">Fees Reminder</a></li>
                    <li><a href="{{route('admin.fees.type')}}">Fees Types</a></li>
                    <li><a href="{{route('admin.fees.discount')}}">Fees Discount</a></li>
                    <li><a href="{{route('admin.fees.group')}}">Fees Group</a></li>
                    <li><a href="{{route('admin.fees.master')}}">Fees Master</a></li>
                    <li><a href="{{route('admin.fees.collect')}}">Fees Collect</a></li>
                </ul>
            </li>


            <!-- online user -->
            <li class="single-nav-wrapper">
                <a href="{{ route('online.user') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-user"></i></span>
                    <span class="menu-text">Online User</span>
                </a>
            </li>
            <!-- end online user -->





        </ul>
    </nav>
</aside><!-- /sidebar Area-->
