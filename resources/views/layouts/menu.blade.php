<li class="{{Request::is('app/users*') || Request::is('app/roles*') || Request::is('app/backups*')? 'active treeview' : 'treeview'}} ">

    @can('app.users.index')
    <a href="#">
        <i class="fa fa-user"></i>
        <span>User Management</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    @endcan
    <ul class="treeview-menu">

        @can('app.roles.index')
            <li class="{{ Request::is('app/roles*') ? 'active' : '' }}">
                <a href="{!! route('app.roles.index') !!}"><i class="fa fa-check-square-o"></i><span>Roles</span></a>
            </li>
        @endcan

        @can('app.users.index')
            <li class="{{ Request::is('app/users*') ? 'active' : '' }}">
                <a href="{!! route('app.users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
            </li>
        @endcan

        @can('app.backup.index')
            <li class="{{ Request::is('app/backups*') ? 'active' : '' }}">
                <a href="{!! route('app.backups.index') !!}"><i class="fa fa-jsfiddle"></i><span>Backup</span></a>
            </li>
        @endcan

    </ul>
</li>




<li class="{{Request::is('app/dashboard*') || Request::is('doctor_list*') || Request::is('patient_list*') || Request::is('appointment*') || Request::is('prescription*')? 'active treeview' : 'treeview'}} ">

    @can('app.dashboard')
    <a href="#">
        <i class="fa fa-user-secret"></i>
        <span>Admin Management</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    @endcan
    <ul class="treeview-menu">

        @can('app.dashboard')
            <li class="{{ Request::is('app/dashboard*') ? 'active' : '' }}">
                <a href="{!! route('app.dashboard') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
            </li>
        @endcan

        @can('doctor_list')
            <li class="{{ Request::is('doctor_list*') ? 'active' : '' }}">
                <a href="{!! route('doctor_list') !!}"><i class="fa fa-user-md"></i><span>Doctor List</span></a>
            </li>
        @endcan

        @can('patient_list')
            <li class="{{ Request::is('patient_list*') ? 'active' : '' }}">
                <a href="{!! route('patient_list') !!}"><i class="fa  fa-wheelchair"></i><span>Patient List</span></a>
            </li>
        @endcan

        @can('appointment.index')
            <li class="{{ Request::is('appointment*') ? 'active' : '' }}">
                <a href="{!! route('appointment.index') !!}"><i class="fa  fa-hospital-o"></i><span>All Appointment</span></a>
            </li>
        @endcan

        @can('prescription.index')
            <li class="{{ Request::is('prescription*') ? 'active' : '' }}">
                <a href="{!! route('prescription.index') !!}"><i class="fa fa-file-text"></i><span>All prescription</span></a>
            </li>
        @endcan



    </ul>
</li>




@can('myAppointment')
    <li class="{{ Request::is('myAppointment*') ? 'active' : '' }}">
        <a href="{!! route('myAppointment') !!}"><i class="fa fa-calendar-o"></i><span>My Appointment</span></a>
    </li>
@endcan

@can('doctorAppointment')
    <li class="{{ Request::is('doctorAppointment*') ? 'active' : '' }}">
        <a href="{!! route('doctorAppointment') !!}"><i class="fa fa-stethoscope"></i><span>Doctor Appointment</span></a>
    </li>
@endcan

@can('doctorPrescription')
    <li class="{{ Request::is('prescription/doctorPrescription*') ? 'active' : '' }}">
        <a href="{!! route('doctorPrescription') !!}"><i class="fa fa-medkit"></i><span>Doctor Prescription</span></a>
    </li>
@endcan
@can('myPrescription')
    <li class="{{ Request::is('prescription/myPrescription*') ? 'active' : '' }}">
        <a href="{!! route('myPrescription') !!}"><i class="fa fa-file-text"></i><span>My Prescription</span></a>
    </li>
@endcan



