<x-sidebar-item title="پروفایل" icon="fas fa-tachometer-alt" route="dashboard.employee.profile"  ul="false"  />


@include('components.dashboard.sidebar-item', [ 'route' => '#'  ,  'icon' => 'fas fa-folder'  ,  'ul' => 'true' ,  'title' =>   'مدیریت مسئولیت' ,
 'multi_route' => [
     ['dashboard.employee.task.manage',[   ] ,' مسئولیتها' , 'far fa-circle nav-icon'],
     ['dashboard.employee.task.index',[   ] ,'  مشاهده مسئولیت ها' , 'far fa-circle nav-icon'],

      ]
      ])


 {{-- <x-sidebar-item title="مدیریت مالی" icon="fas fa-money-check-alt" route="dashboard.employee.money.index"  ul="false"  /> --}}
<x-sidebar-item title="پیام ها" icon="fas fa-envelope-open-text" route="dashboard.employee.message.manage"  ul="false" />
<x-sidebar-item title="ویرایش مشخصات" icon="fas fa-user" route="dashboard.profile.edit"  ul="false"  />
<x-sidebar-item :title="'امتیاز شما: ' . Auth::user()->score" icon="fas fa-medal"  ul="false"  />
