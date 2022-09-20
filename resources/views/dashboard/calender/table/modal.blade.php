 @if($type=='holiday')
@foreach ($cleander_month->cleander_days as $item)

                <div class="modal fade show" id="modal-lf{{ $item->id }}" aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{ $item->day }} {{$cleander_month->name}} {{$cleander_month->cleander_year->year}}</h4>
                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-12">
                            <x-card type="success">
                                <x-card-header>ویرایش تعطیلی  {{ $item->day }} {{$cleander_month->name}} {{$cleander_month->cleander_year->year}} </x-card-header>
                            <form style="padding:10px;" action="{{ route('dashboard.admin.calender.holiday.update', $item->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <x-select-group name="holiday" label="وضعیت" :model="$item ?? null">
                                <x-select-item value="true"   >تعطیل</x-select-item>
                                <x-select-item value="false"  >روز کاری  </x-select-item>
                              </x-select-group>
                        </x-card>
                        </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline" data-dismiss="modal">بستن</button>
                          <button type="submit"  type="submit"  class="btn btn-primary">ارسال</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>

@endforeach
@endif


 @if($type=='daily')
@foreach ($cleander_month->cleander_days as $item)



@if($item->cleander_day_tasks)
@foreach ($item->cleander_day_tasks as $cleander_day_task )
 @if ($item->id == $cleander_day_task->cleander_day_id )



                <div class="modal fade show" id="modal-lf{{ $cleander_day_task->task_id }}" aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{ $cleander_day_task->task->title }}</h4>
                          <button type="button" class="close uncheckd" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="col-md-12">
                            <x-card type="success">
                                <x-card-header>ویرایش تعطیلی  {{ $item->day }} {{$cleander_month->name}} {{$cleander_month->cleander_year->year}} </x-card-header>
                            <form style="padding:10px;" action="{{ route('dashboard.admin.calender.holiday.update', $item->id) }}" method="post" role="form" class="form-horizontal " enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <x-select-group name="holiday" label="وضعیت" :model="$item ?? null">
                                <x-select-item value="true"   >تعطیل</x-select-item>
                                <x-select-item value="false"  >روز کاری  </x-select-item>
                              </x-select-group>
                        </x-card>


                        {{ $cleander_day_task->task_id }}<br>
                        {{ $cleander_day_task->id }}<br>


                        </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline" data-dismiss="modal">بستن</button>
                          <button type="submit"  type="submit"  class="btn btn-primary">ارسال</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>



@endif
@endforeach
@endif




@endforeach
@endif
