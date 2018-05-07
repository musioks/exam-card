<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<!-- main menu header-->
<!-- / main menu header-->
<!-- main menu content-->
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class="{{Request::is('dashboard') ? 'active': ''}}"><a href="{{ url('/dashboard') }}"><i class="icon-home3"></i><span data-i18n="nav.dash.ecommerce" class="menu-title">Dashboard</span></a>
</li>
{{-- <li class=" navigation-header"><span data-i18n="nav.category.layouts">Staff</span><i data-toggle="tooltip" data-placement="right" data-original-title="Layouts" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class="{{Request::is('staff/teaching/staff') ? 'active': ''}} nav-item"><a href="{{ url('/staff/teaching/staff') }}"><i class="icon-users"></i><span data-i18n="nav.components.main" class="menu-title">Lecturers</span></a>
</li>
<li class="{{Request::is('employees/employee') ? 'active': ''}} nav-item"><a href="{{ url('/employees/employee') }}"><i class="icon-users"></i><span data-i18n="nav.components.main" class="menu-title">Non-Teaching Staff</span></a>
</li> --}}

<li class=" navigation-header"><span data-i18n="nav.category.general">Students</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
</li>

<li class="{{Request::is('students') ? 'active': ''}} nav-item"><a href="{{url('/students')}}"><i class="icon-users"></i><span data-i18n="nav.changelog.main" class="menu-title">Manage Students</span></a>
</li>

<li class=" navigation-header"><span data-i18n="nav.category.pages">Examination</span><i data-toggle="tooltip" data-placement="right" data-original-title="Pages" class="icon-ellipsis icon-ellipsis"></i>
</li>

<li class="{{Request::is('settings/exams') ? 'active': ''}} nav-item"><a href="{{ url('/settings/exams') }}"><i class="icon-bookmark-o"></i><span data-i18n="nav.scrumboard.main" class="menu-title">Create Exams</span></a>
<li class="{{Request::is('students/exams') ? 'active': ''}} nav-item"><a href="{{ url('/students/exams') }}"><i class="icon-users"></i><span data-i18n="nav.scrumboard.main" class="menu-title">Student Exams</span></a>
</li>
<li class="{{Request::is('students/exam-cards') ? 'active': ''}} nav-item"><a href="{{ url('/students/exam-cards') }}"><i class="icon-settings"></i><span data-i18n="nav.scrumboard.main" class="menu-title">Generate Exam Cards</span></a>
</li>

<li class=" navigation-header"><span data-i18n="nav.category.ui">Accounts</span><i data-toggle="tooltip" data-placement="right" data-original-title="User Interface" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class=" nav-item"><a href="#"><i class="icon-social-buffer"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Fees</span></a>
<ul class="menu-content">
<li class="{{Request::is('invoices/view') ? 'active': ''}}"><a href="{{ url('/invoices/view') }}" data-i18n="nav.cards.card_statistics" class="menu-item">Invoices</a>
  </li>
<li class="{{Request::is('fees/payment') ? 'active': ''}}"><a href="{{ url('/fees/payment') }}" data-i18n="nav.cards.card_statistics" class="menu-item">Record Fees</a>
  </li>
  <li class="{{Request::is('fees/feeperclass') ? 'active': ''}}"><a href="{{ url('/fees/feeperclass') }}" data-i18n="nav.cards.card_statistics" class="menu-item">Fees Payments</a>

{{-- <li class="{{Request::is('fees/feesFilter') ? 'active': ''}}"><a href="{{ url('/fees/feesFilter') }}" data-i18n="nav.cards.card_weather" class="menu-item">Filter Fees</a>
  </li> --}}
</ul>
</li>


<li class=" navigation-header"><span data-i18n="nav.category.forms">Settings</span><i data-toggle="tooltip" data-placement="right" data-original-title="Forms" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class="{{Request::is('settings') ? 'active': ''}} nav-item"><a href="{{url('/settings')}}"><i class="icon-wrench
"></i><span data-i18n="nav.changelog.main" class="menu-title">Main Settings</span></a>
</li>
<li class="{{Request::is('settings/courses') ? 'active': ''}} nav-item"><a href="{{url('/settings/courses')}}"><i class="icon-wpforms
"></i><span data-i18n="nav.changelog.main" class="menu-title">Courses</span></a>
</li>
<li class="{{Request::is('/settings/units') ? 'active': ''}} nav-item"><a href="{{url('/settings/units')}}"><i class="icon-books
"></i><span data-i18n="nav.changelog.main" class="menu-title">Units</span></a>
</li>
<li class="{{Request::is('settings/forms') ? 'active': ''}} nav-item"><a href="{{url('/settings/forms')}}"><i class="icon-paper
"></i><span data-i18n="nav.changelog.main" class="menu-title">Classes</span></a>
</li>
<li class="{{Request::is('settings/voteheads') ? 'active': ''}} nav-item"><a href="{{url('/settings/voteheads')}}"><i class="icon-money
"></i><span data-i18n="nav.changelog.main" class="menu-title">Voteheads</span></a>
</li>
<li class=" navigation-header"><span data-i18n="nav.category.layouts">User Management</span><i data-toggle="tooltip" data-placement="right" data-original-title="Layouts" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class="{{Request::is('dashboard/users') ? 'active': ''}} nav-item"><a href="{{ url('/dashboard/users') }}"><i class="icon-android-people
"></i><span data-i18n="nav.changelog.main" class="menu-title">Users</span></a>
</li>
<li class="{{Request::is('dashboard/roles') ? 'active': ''}} nav-item"><a href="{{url('/dashboard/roles')}}"><i class="icon-ios-albums"></i><span data-i18n="nav.changelog.main" class="menu-title">Roles</span></a>
</li>
<li class="{{Request::is('dashboard/permissions') ? 'active': ''}} nav-item"><a href="{{url('/dashboard/permissions')}}"><i class="icon-android-lock
"></i><span data-i18n="nav.changelog.main" class="menu-title">Permissions</span></a>
</li>

<li class=" nav-item"><a href="#"></i><span data-i18n="nav.form_repeater.main" class="menu-title"></span></a>
</li>

</ul>
</div>
<!-- /main menu content-->

</div>