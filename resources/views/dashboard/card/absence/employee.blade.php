
@if(empty($absence))
<div class="row">
    <div class="col-md-12">
      <div class="alert alert-warning no-dismiss" style="">
        <p>لطفا حضوری خود را ثبت کنید</p>
        <form method="post" action="{{ $route }}">
          @csrf
        <button type="submit" class="btn btn-primary toastrDefaultInfo">
          ثبت حضوری
        </button>
        </form>
      </div>
    </div>
</div>
@endif
