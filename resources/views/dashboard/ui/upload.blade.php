


    <style>

        input.fakeInput {
          width: 60%;
          background-color: #f8f8f8;
          border-radius: 8px;
          display:block;
          padding: 3px 100px 20px 30px;
          box-sizing: border-box;
          border:initial;
          height: 3em;
        }
        #buttonImage {
    margin-right: 2px;
    border: none;
    background: #084cdf;
    padding: 10px 8px;
    border-radius: 10px;
    color: #fff;
    cursor: pointer;
    transition: background .2s ease-in-out;
        }
        .fakeDiv {
          width: 500px;
          position: relative;
          display: inline-block;
        }
        .selectedFile {
          opacity:0;
          /* position:absolute; */
          left: 0;
          top: 0;
        }


        @media (max-width: 420px) {
    }


        </style>

        <style>
            #myDIV {
              /* width: 100%; */
              /* padding: 50px 0; */
              /* text-align: center; */
              /* background-color: lightblue; */
              /* margin-top: 20px; */
            }
            </style>


      @if($type_file=='file')
      <?php $x = 0; while($x <  1) { ?>
        @include('dashboard.ui.persian_fake_upload',[$type_file])
     <?php $x++; } ?>


    <?php $x = 0; while($x < 1) { ?>
        <script>
              $('#selectedFile{{ $flag }}{{ $x }}').change(function () {
                      var a = $('#selectedFile{{ $flag }}{{ $x }}').val().toString().split('\\');
                      $('#fakeInput{{ $flag }}{{ $x }}').val(a[a.length -1]);
                  });

                </script>
          <?php $x++; } ?>

          @endif

      @if($type_file=='multi')


      <?php $x = 0; while($x <  1) { ?>
        @include('dashboard.ui.persian_fake_upload',[$type_file])
          <span  onclick="myFunction{{ $flag }}()"  class="badge badge-primary">  آپلود فایلهای بیشتر  </span><br>
     <?php $x++; } ?>
    <br>
    <div id="myDIV{{ $flag }}" style="display: none;" >
        <?php $x = 1; while($x <  3) { ?>
            @include('dashboard.ui.persian_fake_upload',[$type_file])
            <?php $x++; } ?>
        </div>
        <script>
        function myFunction{{ $flag }}() {
          var x = document.getElementById("myDIV{{ $flag }}");
          if (x.style.display === "block") {
            x.style.display = "none";
          } else {
            x.style.display = "block";
          }
        }
        </script>




    <?php $x = 0; while($x <  3) { ?>
        <script>
              $('#selectedFile{{ $flag }}{{ $x }}').change(function () {
                      var a = $('#selectedFile{{ $flag }}{{ $x }}').val().toString().split('\\');
                      $('#fakeInput{{ $flag }}{{ $x }}').val(a[a.length -1]);
                  });

                </script>
          <?php $x++; } ?>


      @endif
