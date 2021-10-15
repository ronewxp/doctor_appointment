
@can('app.dashboard')
<li class="{{ Request::is('app/dashboard*') ? 'active' : '' }}">
    <a href="{!! route('app.dashboard') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>
@endcan

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

@can('myAppointment')
    <li class="{{ Request::is('myAppointment*') ? 'active' : '' }}">
        <a href="{!! route('myAppointment') !!}"><i class="fa  fa-hospital-o"></i><span>My Appointment</span></a>
    </li>
@endcan

@can('doctorAppointment')
    <li class="{{ Request::is('doctorAppointment*') ? 'active' : '' }}">
        <a href="{!! route('doctorAppointment') !!}"><i class="fa  fa-hospital-o"></i><span>Doctor Appointment</span></a>
    </li>
@endcan

@can('prescription.index')
    <li class="{{ Request::is('prescription.index*') ? 'active' : '' }}">
        <a href="{!! route('prescription.index') !!}"><i class="fa  fa-hospital-o"></i><span>All prescription</span></a>
    </li>
@endcan



