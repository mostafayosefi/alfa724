
<style>
    .wrapper-progressBar {
    width: 100%
}

.progressBar {
}

.progressBar li {
    list-style-type: none;
    float: right;
    width: 20%;
    position: relative;
    text-align: center;
    padding: 20px;
}

.progressBar li:before {
    content: " ";
    line-height: 30px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: block;
    text-align: center;
    margin: 0 auto 10px;
    background-color: white
}

.progressBar li:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 2px;
    background-color: rgb(173, 37, 37);
    top: 15px;
    left: -50%;
    z-index: -1;
}

.progressBar li:first-child:after {
    content: none;
}

.progressBar li.active {
    color: #28a745;
}

.progressBar li.active:before {
    border-color: #28a745;
    background-color: #28a745
}
.progressBar li.active:after {
    background-color: #28a745;
}
.progressBar li.activing {
    color: ##ffc107;
}

.progressBar li.activing:before {
    border-color: ##ffc107;
    background-color: ##ffc107
}

</style>

<div class="row">
    <div class="col-xs-12 col-md-12 col-sm-6  block border">
      <div class="wrapper-progressBar">
        <ul class="progressBar">
            <a href=""><li class="active">ایجاد پروژه </li></a>

            <a href=""><li class="active">ایجاد فاز پروژه</li></a>
                <a href="" ><li class="activing">ثبت کاربر به پروژه</li></a>
                <a href=""><li>ثبت  مسئولیت </li></a>
        </ul>
      </div>
    </div>
  </div>
