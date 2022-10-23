
    <script>
        function fetch_close_select(vall){
            var vall = document.getElementById("close_select").value;$.ajax({
                type: 'get',
                url: ' {{ url("dashboard/admin/fetch/sample/close_select") }}'+'/'+vall+'',
            data: {get_option:vall},
            success: function (response) {document.getElementById("close_select_input").innerHTML=response;}
        });
            }
    </script>
