<x-sidebar-item title="داشبورد" icon="fas fa-tachometer-alt" route="dashboard.admin.index" ul="false" />
<x-sidebar-item title="برنامه روزانه" icon="fas fa-folder" route="dashboard.admin.daily.manage" ul="false" />

@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-users'  ,  'ul' => 'true' ,  'title' =>   'مدیریت مشتری ها' ,
 'multi_route' => [   ['dashboard.admin.customer.manage', [  ], 'مدیریت مشتری ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.customer.create', [  ], 'ثبت مشتری' , 'far fa-circle nav-icon'  ],   ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-folder'  ,  'ul' => 'true' ,  'title' =>   'مدیریت پروژه ها' ,
 'multi_route' => [   ['dashboard.admin.project.manage', [  ], 'مدیریت پروژه ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.project.create', [  ], 'ثبت پروژه' , 'far fa-circle nav-icon'  ],   ]  ])


<x-sidebar-item title="مدیریت کارمند ها" icon="fas fa-users" route="dashboard.admin.users.employee" ul="false" />



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-money-check-alt'  ,  'ul' => 'true' ,  'title' =>   'مدیریت مالی' ,
 'multi_route' => [
     ['dashboard.admin.money.employee', [  ], 'مدیریت مالی' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.money.report.service', [  ], 'گزارش مالی پروژه ها' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.money.report.depo', [  ], 'گزارش مالی بیعانه ها' , 'far fa-circle nav-icon'  ],   ]  ])


@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-setting'  ,  'ul' => 'true' ,  'title' =>   '  اطلاع رسانی' ,
 'multi_route' => [
      ['dashboard.admin.money.report.service', [  ], 'تنطیمات درگاه پیامک      ' , 'far fa-circle nav-icon'  ],
     ['dashboard.admin.money.employee', [  ], 'تنظیمات اطلاع رسانی ' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.money.report.depo', [  ], 'مدیریت متن های پیش فرض      ' , 'far fa-circle nav-icon'  ],   ]  ])


@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-envelope-open-text'  ,  'ul' => 'true' ,  'title' =>   'مدیریت پیام ها' ,
 'multi_route' => [   ['dashboard.admin.message.manage', [  ], 'مدیریت پیام ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.message.create', [  ], 'ثبت پیام جدید' , 'far fa-circle nav-icon'  ],   ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-list'  ,  'ul' => 'true' ,  'title' =>   'مدیریت دستمزد ها' ,
 'multi_route' => [   ['dashboard.admin.salary.index', [  ], 'مدیریت دستمزد ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.salary.create', [  ], 'ایجاد دستمزد جدید' , 'far fa-circle nav-icon'  ],   ]  ])


<x-sidebar-item title="مدیریت امتیازات" icon="fas fa-medal" route="dashboard.admin.score.index" ul="false" />
<x-sidebar-item title="حضورغیاب" icon="fas fa-users" route="dashboard.admin.absence.manage" ul="false" />
<x-sidebar-item title="تعطیلی ها" icon="fas fa-folder" route="dashboard.admin.date.manage" ul="false" />
<x-sidebar-item title="گزارش گیری" icon="fas fa-folder" route="dashboard.admin.report.index" ul="false" />


@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'far fa-calendar-alt'  ,  'ul' => 'true' ,  'title' =>   'مدیریت تقویم' ,
 'multi_route' => [
     ['dashboard.admin.calender.holiday',[   ] ,'مدیریت تعطیلی ها' , 'far fa-circle nav-icon'],
     ['dashboard.admin.calender.daily',[   ] ,'مدیریت برنامه روزانه ' , 'far fa-circle nav-icon'],
     ['dashboard.admin.calender.project',[   ] ,'مدیریت پروژه ها  ' , 'far fa-circle nav-icon'],
     ['dashboard.admin.calender.absence',[   ] ,'مدیریت حضور و غیاب   ' , 'far fa-circle nav-icon'],
      ]  ])







