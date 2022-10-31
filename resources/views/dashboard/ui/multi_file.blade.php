
    <div class="col-md-12">
        <x-card type="primary">
            <x-card-header>آپلود مستندات</x-card-header>
                  <div class="form-group">
                     <table class="table table-bordered" style="margin-top: 30px;">
                        <thead>
                        </thead>
                        <tbody id="specs{{ $flag }}" style="margin-top: 70px;">
                            <?php $number=0 ?>
                        @if(old('specifications'))
                            @foreach(old('specifications') as $idx => $specification)
                                @if(!empty($specification['customer']))
                                    @include('dashboard.admin.customer.spec-item', [
                                        'idx' => $idx,
                                        'title' => $specification['title'],
                                        'price' => $specification['price'],
                                        'time' => $specification['time'],
                                        'counter' => $specification['counter'],
                                        'start_date' => $specification['start_date'],
                                        'finish_date' => $specification['finish_date'],
                                    ])
                                @endif
                            @endforeach
                        @elseif(!empty($model))
                            @foreach($model->specifications as $specification)
                                @include('dashboard.admin.customer.spec-item', ['specification' => $specification])

                            @endforeach



                        @endif
                        </tbody>
                        <tfoot>
                        <tr>


                        <td colspan="7">
                            <script>
                                $(function () {
                              });
                            </script>
                            <button id="add-spec{{ $flag }}" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                        </td>
                        </tr>
                        </tfoot>
                    </table>
                 </div>
         </x-card>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let field = `@include('dashboard.ui.multi_file_upload', ['specification' => null])`;
            let idx = $("#specs{{ $flag }} tr").length + 1;
            $('#add-spec{{ $flag }}').click(function () {
                $("#specs{{ $flag }}").append(field.replace(/IDX/g, idx.toString()));
                updateListeners();
                idx ++;
            });

            function onRemove() {
                $(this).closest('tr').remove();
            }
            function updateListeners() {
                $('.btn-remove-spec{{ $flag }}').click(onRemove);
            }
        });
        document.write(idx);


    </script>







