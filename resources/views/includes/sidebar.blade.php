<style>
    #hover {
        background: #F4F6F8;
    }
    ul li
    {
        list-style-type: none;
    }
</style>
<nav class="sidebar card py-2 mb-4 polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline">
    <ul class="nav flex-column polished-sidebar-menu ml-0 pt-1 p-0 d-md-block" id="nav_accordion">
        <li class="nav-item has-submenu" id="hover">
            <a class="nav-link" href="#"><span class="oi oi-dashboard"></span> Dashboard</a>
            <ul class="submenu collapse">
                <li><a class="" href="#">Main Dashboard </a></li>
                <li><a class="" href="#">Error rates Dashboard</a></li>
                <li><a class="" href="#">Region Dashboard</a> </li>
                <li><a class="" href="#">Area Dashboard</a> </li>
            </ul>
        </li>
        <li class="nav-item has-submenu" id="hover">
            <a class="nav-link" href="#"><span class="oi oi-clipboard"></span> Planning </a>
            <ul class="submenu collapse">
                <li><a class="nav-link" href="#">Head Office Audit Listing</a></li>
                <li><a class="nav-link" href="{{route('field_audit_listing')}}">Field Audit Listing</a></li>
{{--                <li><a class="nav-link" href="{{route('create_new_audit')}}">Create New Audit</a></li>--}}
            </ul>
        </li>
        <li class="nav-item has-submenu" id="hover">
            <a class="nav-link" href="#"><span class="oi oi-chevron-bottom"></span> Execution </a>
            <ul class="submenu collapse">
                <li><a class="nav-link" href="#">Field Audit</a></li>
                <li><a class="nav-link" href="#">Branch Audit</a></li>
            </ul>
        </li>
    </ul>
</nav>
