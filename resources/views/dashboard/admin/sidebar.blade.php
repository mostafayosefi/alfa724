<x-sidebar-item title="داشبورد" icon="fas fa-tachometer-alt" route="dashboard.admin.index" ul="false" />
<x-sidebar-item title="برنامه روزانه" icon="fas fa-folder" route="dashboard.admin.daily.manage" ul="false" />
<x-sidebar-item title="مدیریت مشتری ها" icon="fas fa-users" route="dashboard.admin.customer.manage" ul="false" />
<x-sidebar-item title="مدیریت پروژه ها" icon="fas fa-folder" route="dashboard.admin.project.manage" ul="false" />
<x-sidebar-item title="مدیریت کارمند ها" icon="fas fa-users" route="dashboard.admin.users.employee" ul="false" />
<x-sidebar-item title="مدیریت مالی" icon="fas fa-money-check-alt" route="dashboard.admin.money.employee" ul="false" />
<x-sidebar-item title="مدیریت پیام ها" icon="fas fa-envelope-open-text" route="dashboard.admin.message.manage" ul="false" />
<x-sidebar-item title="مدیریت دستمزد ها" icon="fas fa-list" route="dashboard.admin.salary.index" ul="false" />
<x-sidebar-item title="مدیریت امتیازات" icon="fas fa-medal" route="dashboard.admin.score.index" ul="false" />
<x-sidebar-item title="حضورغیاب" icon="fas fa-users" route="dashboard.admin.absence.manage" ul="false" />
<x-sidebar-item title="تعطیلی ها" icon="fas fa-folder" route="dashboard.admin.date.manage" ul="false" />
<x-sidebar-item title="گزارش گیری" icon="fas fa-folder" route="dashboard.admin.report.index" ul="false" />



@include('components.dashboard.sidebar-item', [ 'route' => 'dashboard.admin.report.index'  ,  'icon' => 'fas fa-folder'  ,  'ul' => 'true' ,  'title' =>   'مدیریت تقویم' ,
 'array' => [
    ['#1', 'اول'],
    ['#2', 'دوم'],
]

 ])



