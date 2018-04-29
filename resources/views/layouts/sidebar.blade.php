<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
<!-- main menu header-->
<!-- / main menu header-->
<!-- main menu content-->
<div class="main-menu-content">
<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
<li class="{{Request::is('dashboard') ? 'active': ''}}"><a href="{{ url('/dashboard') }}"><i class="icon-home3"></i><span data-i18n="nav.dash.ecommerce" class="menu-title">Dashboard</span></a>
</li>
<li class=" navigation-header"><span data-i18n="nav.category.layouts">Staff</span><i data-toggle="tooltip" data-placement="right" data-original-title="Layouts" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class="{{Request::is('staff/teaching/staff') ? 'active': ''}} nav-item"><a href="{{ url('/staff/teaching/staff') }}"><i class="icon-users"></i><span data-i18n="nav.components.main" class="menu-title">Teachers</span></a>
</li>
<li class="{{Request::is('employees/employee') ? 'active': ''}} nav-item"><a href="{{ url('/employees/employee') }}"><i class="icon-users"></i><span data-i18n="nav.components.main" class="menu-title">Non-Teaching Staff</span></a>
</li>

<li class=" navigation-header"><span data-i18n="nav.category.general">Students</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
</li>

<li class="{{Request::is('students') ? 'active': ''}} nav-item"><a href="{{url('/students')}}"><i class="icon-users"></i><span data-i18n="nav.changelog.main" class="menu-title">Manage Students</span></a>
</li>
<li class="{{Request::is('disciplines/index') ? 'active': ''}} nav-item"><a href="{{ url('/disciplines/index') }}"><i class="icon-ios-filing-outline"></i><span data-i18n="nav.changelog.main" class="menu-title">Discipline</span></a>
</li>
<li class=" nav-item"><a href="changelog.html"><i class="icon-copy"></i><span data-i18n="nav.changelog.main" class="menu-title">Students Promotion</span></a>
</li>

<li class=" navigation-header"><span data-i18n="nav.category.pages">Examination</span><i data-toggle="tooltip" data-placement="right" data-original-title="Pages" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class=" nav-item"><a href="#"><i class="icon-ios-pricetag-outline"></i><span data-i18n="nav.project.main" class="menu-title">Submit Scores</span></a>
<ul class="menu-content">
  <li class="{{Request::is('exams/individual') ? 'active': ''}}"><a href="{{url('/exams/individual')}}" data-i18n="nav.project.project_summary" class="menu-item">Individual student</a>
  <li class="{{Request::is('exams/class') ? 'active': ''}}"><a href="{{url('/exams/class')}}" data-i18n="nav.project.project_summary" class="menu-item">Class Marks</a>
  </li>
</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-ios-paper-outline"></i><span data-i18n="nav.project.main" class="menu-title">View  Results</span></a>
<ul class="menu-content">
  <li class="{{Request::is('/results/student') ? 'active': ''}}"><a href="{{url('/results/student')}}" data-i18n="nav.project.project_summary" class="menu-item"> Student Results</a>
  <li class="{{Request::is('/results/stream') ? 'active': ''}}"><a href="{{url('/results/stream')}}" data-i18n="nav.project.project_summary" class="menu-item">Stream Results</a>
  </li>
  <li class="{{Request::is('/results/class') ? 'active': ''}}"><a href="{{url('/results/class')}}" data-i18n="nav.project.project_summary" class="menu-item">Class Results</a>
  </li>
</ul>
</li>
<li class=" nav-item"><a href="#"><i class="icon-file-subtract"></i><span data-i18n="nav.invoice.main" class="menu-title">Reports</span></a>
<ul class="menu-content">
  <li><a href="invoice-summary.html" data-i18n="nav.invoice.invoice_summary" class="menu-item">Invoice Summary</a>
  </li>
</ul>
</li>
<li class="{{Request::is('exams/grading') ? 'active': ''}} nav-item"><a href="{{ url('/exams/grading') }}"><i class="icon-bookmark-o"></i><span data-i18n="nav.scrumboard.main" class="menu-title">Grading System</span></a>
</li>


<li class=" navigation-header"><span data-i18n="nav.category.ui">Accounts</span><i data-toggle="tooltip" data-placement="right" data-original-title="User Interface" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class=" nav-item"><a href="#"><i class="icon-social-buffer"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Fees</span></a>
<ul class="menu-content">
<li class="{{Request::is('invoices/view') ? 'active': ''}}"><a href="{{ url('/invoices/view') }}" data-i18n="nav.cards.card_statistics" class="menu-item">Invoices</a>
  </li>
<li class="{{Request::is('fees/payment') ? 'active': ''}}"><a href="{{ url('/fees/payment') }}" data-i18n="nav.cards.card_statistics" class="menu-item">Record Fees</a>
  </li>
  <li class="{{Request::is('fees/feeperclass') ? 'active': ''}}"><a href="{{ url('/fees/feeperclass') }}" data-i18n="nav.cards.card_statistics" class="menu-item">payment per class</a>
  <li class="{{Request::is('fees/studentfeeregister') ? 'active': ''}}"><a href="{{ url('/fees/studentfeeregister') }}" data-i18n="nav.cards.card_statistics" class="menu-item">Student fee register</a>
  </li>
<li class="{{Request::is('fees/daily') ? 'active': ''}}"><a href="{{ url('/fees/daily') }}" data-i18n="nav.cards.card_weather" class="menu-item">Daily Fees</a>
  </li>
<li class="{{Request::is('fees/feesFilter') ? 'active': ''}}"><a href="{{ url('/fees/feesFilter') }}" data-i18n="nav.cards.card_weather" class="menu-item">Filter Fees</a>
  </li>
</ul>
</li>
<li class="{{Request::is('payments/allPayments') ? 'active': ''}} nav-item"><a href="{{ url('/payments/allPayments') }}"><i class="icon-compass3"></i><span data-i18n="nav.content.main" class="menu-title">Manage Payments</span></a>
</li>
<li class="{{Request::is('finance/report') ? 'active': ''}} nav-item"><a href="{{ url('/finance/report') }}"><i class="icon-grid2"></i><span data-i18n="nav.components.main" class="menu-title">Financial Summary</span></a>
</li>
<li class=" navigation-header"><span data-i18n="nav.category.forms">Settings</span><i data-toggle="tooltip" data-placement="right" data-original-title="Forms" class="icon-ellipsis icon-ellipsis"></i>
</li>
<li class="{{Request::is('settings') ? 'active': ''}} nav-item"><a href="{{url('/settings')}}"><i class="icon-wrench
"></i><span data-i18n="nav.changelog.main" class="menu-title">Main Settings</span></a>
</li>
<li class="{{Request::is('settings/streams') ? 'active': ''}} nav-item"><a href="{{url('/settings/streams')}}"><i class="icon-wpforms
"></i><span data-i18n="nav.changelog.main" class="menu-title">Streams</span></a>
</li>
<li class="{{Request::is('settings/forms') ? 'active': ''}} nav-item"><a href="{{url('/settings/forms')}}"><i class="icon-paper
"></i><span data-i18n="nav.changelog.main" class="menu-title">Classes</span></a>
</li>
<li class=" nav-item"><a href="#"><i class="icon-ios-paper-outline"></i><span data-i18n="nav.form_wizard.main" class="menu-title">Subjects</span></a>
<ul class="menu-content">
  <li class="{{Request::is('settings/subject-groups') ? 'active': ''}}"><a href="{{url('/settings/subject-groups')}}" data-i18n="nav.form_wizard.form_wizard_circle_style" class="menu-item">Subject Groups</a>
  </li>
  <li class="{{Request::is('settings/subjects') ? 'active': ''}}"><a href="{{url('/settings/subjects')}}" data-i18n="nav.form_wizard.form_wizard_notification_style" class="menu-item">Subjects</a>
  </li>
</ul>
</li>
<li class="{{Request::is('settings/exams') ? 'active': ''}} nav-item"><a href="{{url('/settings/exams')}}"><i class="icon-books
"></i><span data-i18n="nav.changelog.main" class="menu-title">Exam Types</span></a>
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