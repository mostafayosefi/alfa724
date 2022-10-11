<x-sidebar-item title="داشبورد" icon="fas fa-tachometer-alt" route="dashboard.admin.index" ul="false" />



@permission('daily')

<li class="nav-item {{ isActive_open(['dashboard.admin.daily.manage' , 'dashboard.admin.daily.index' , 'dashboard.admin.daily.alluser'])}} ">


    <a href="#" class="nav-link">
    <i class="nav-icon fas fa-folder"></i>
    <p>
        مدیریت مسئولیت
    <i class="fas fa-angle-left right"></i>
    </p>
    </a>
    <ul class="nav nav-treeview"  >

        @admin('daily_index')

        <li class="nav-item">
            <a href="{{ route('dashboard.admin.daily.manage') }}" class="nav-link  {{ isActive(['dashboard.admin.daily.manage' ])}}">
            <i class="far fa-circle nav-icon"></i>
            <p> برنامه روزانه </p>
            </a>
            </li>

        @endadmin


<li class="nav-item">
    <a href="{{ route('dashboard.admin.daily.index') }}" class="nav-link {{ isActive(['dashboard.admin.daily.index' ])}} ">
    <i class="far fa-circle nav-icon"></i>
    <p>   مسئولیت های من </p>
    </a>
    </li>

<li class="nav-item">
    <a href="{{ route('dashboard.admin.daily.alluser') }}" class="nav-link {{ isActive(['dashboard.admin.daily.alluser' ])}} ">
    <i class="far fa-circle nav-icon"></i>
    <p>   مسئولیت های کاربران </p>
    </a>
    </li>




</ul>
</li>

@endpermission










{{--

@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-folder'  ,  'ul' => 'true' ,  'title' =>   'مدیریت مسئولیت' ,
 'multi_route' => [



     ['dashboard.admin.daily.manage',[   ] ,' برنامه روزانه' , 'far fa-circle nav-icon'],
     ['dashboard.admin.daily.index',[   ] ,'   مسئولیت های من' , 'far fa-circle nav-icon'],
     ['dashboard.admin.daily.alluser',[   ] ,'   مسئولیت های کاربران' , 'far fa-circle nav-icon'],


      ]
      ]) --}}

@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-users'  ,  'ul' => 'true' ,  'title' =>   ' مدیران ' ,
 'multi_route' => [
     ['dashboard.admin.users.admins.create', [  ], 'ثبت مدیرجدید' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.users.admins.index', [  ], 'مدیریت مدیران' , 'far fa-circle nav-icon'  ],
        ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-users'  ,  'ul' => 'true' ,  'title' =>   ' سطوح دسترسی ' ,
 'multi_route' => [
      ['dashboard.admin.permission.create', [  ], '  ایجاد نقش جدید  ' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.permission.index', [  ], 'مدیریت نقش ها' , 'far fa-circle nav-icon'  ],
         ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-users'  ,  'ul' => 'true' ,  'title' =>   'مدیریت مشتری ها' ,
 'multi_route' => [   ['dashboard.admin.customer.manage', [  ], 'مدیریت مشتری ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.customer.create', [  ], 'ثبت مشتری' , 'far fa-circle nav-icon'  ],   ]  ])




@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-table'  ,  'ul' => 'true' ,  'title' =>   'مدیریت خدمات مشتریان ' ,
 'multi_route' => [   ['dashboard.admin.service.index', [  ], 'مدیریت خدمات ' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.service.create', [  ], 'ثبت خدمت' , 'far fa-circle nav-icon'  ],   ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-folder'  ,  'ul' => 'true' ,  'title' =>   'مدیریت پروژه ها' ,
 'multi_route' => [   ['dashboard.admin.project.manage', [  ], 'مدیریت پروژه ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.project.create', [  ], 'ثبت پروژه' , 'far fa-circle nav-icon'  ],   ]  ])


<x-sidebar-item title="مدیریت کارمند ها" icon="fas fa-users" route="dashboard.admin.users.employee" ul="false" />



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-money-check-alt'  ,  'ul' => 'true' ,  'title' =>   'مدیریت مالی' ,
 'multi_route' => [
     ['dashboard.admin.money.employee', [  ], 'مدیریت مالی' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.money.service.index', [  ], 'گزارش مالی خدمات ' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.money.service.price', [  'type' => 'depo'  ], '  بیعانه های دریافتی خدمات' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.money.service.price', [  'type' => 'cost'  ], '  هزینه های پرداختی خدمات' , 'far fa-circle nav-icon'  ],
       ]  ])

{{--
@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-envelope-open-text'  ,  'ul' => 'true' ,  'title' =>   '  اطلاع رسانی' ,
 'multi_route' => [
      ['dashboard.admin.notification.list.index', [  ], 'تنطیمات درگاه پیامک      ' , 'far fa-circle nav-icon'  ],
     ['dashboard.admin.notification.list.index', [  ], 'تنظیمات اطلاع رسانی ' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.notification.list.index', [  ], 'مدیریت متن های پیش فرض      ' , 'far fa-circle nav-icon'  ],   ]  ]) --}}


@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-envelope-open-text'  ,  'ul' => 'true' ,  'title' =>   'مدیریت پیام ها' ,
 'multi_route' => [
     ['dashboard.admin.message.manage', [  ], 'مدیریت پیام ها' , 'far fa-circle nav-icon'  ],
     ['dashboard.admin.message.create', [  ], 'ثبت پیام جدید' , 'far fa-circle nav-icon'  ],
      ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-list'  ,  'ul' => 'true' ,  'title' =>   'مدیریت دستمزد ها' ,
 'multi_route' => [   ['dashboard.admin.salary.index', [  ], 'مدیریت دستمزد ها' , 'far fa-circle nav-icon'  ],  ['dashboard.admin.salary.create', [  ], 'ایجاد دستمزد جدید' , 'far fa-circle nav-icon'  ],   ]  ])



@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-medal'  ,  'ul' => 'true' ,  'title' =>   'مدیریت امتیازات ' ,
 'multi_route' => [
     ['dashboard.admin.score.index', [  ], 'مدیریت امتیازات ' , 'far fa-circle nav-icon'  ],
      ['dashboard.admin.setting.score.index', [  ], 'تنظیمات امتیازات ' , 'far fa-circle nav-icon'  ],
        ]  ])

@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'far fa-calendar-alt'  ,  'ul' => 'true' ,  'title' =>   'مدیریت تقویم' ,
 'multi_route' => [
     ['dashboard.admin.calender.holiday',[   ] ,'مدیریت تعطیلی ها' , 'far fa-circle nav-icon'],
    //  ['dashboard.admin.calender.daily',[   ] ,'مدیریت برنامه روزانه ' , 'far fa-circle nav-icon'],
    //  ['dashboard.admin.calender.project',[   ] ,'مدیریت پروژه ها  ' , 'far fa-circle nav-icon'],
    //  ['dashboard.admin.calender.absence',[   ] ,'مدیریت حضور و غیاب   ' , 'far fa-circle nav-icon'],
      ]
      ])



 <x-sidebar-item title="حضورغیاب" icon="fas fa-users" route="dashboard.admin.absence.manage" ul="false" />
<x-sidebar-item title="تعطیلی ها" icon="fas fa-folder" route="dashboard.admin.date.manage" ul="false" />
<x-sidebar-item title="گزارش گیری" icon="fas fa-folder" route="dashboard.admin.report.index" ul="false" />







