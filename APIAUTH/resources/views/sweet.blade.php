<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('{{asset('Preloader_1.gif')}}') 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;
        }
    </style>



    <title>Document</title>
</head>
<body>
<div class="loader"></div>
<table class="table" controls onloadeddata="myFunction()">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">phone</th>
    </tr>
    </thead>
    <tbody id="tr"></tbody>


</table>
<div id="data"></div>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>
 <script type="text/javascript">
     //لتأكيد الارسال
     // $(document).ready('submit', '[id^=form]', function (e) {
     //     e.preventDefault();
     //     var data = $(this).serialize();
     //     swal({
     //         title: "Are you sure?",
     //         text: "Do you want to Send this email",
     //         type: "warning",
     //         showCancelButton: true,
     //         confirmButtonText: "Yes, send it!",
     //         cancelButtonText: "No, cancel pls!",
     //     }).then(function () {
     //         $('#form').submit();
     //     });
     //     return false;
     // });

     swal({
         title: 'Multiple inputs',
         html:
             '<lable id="swal-label" class="swa     bel">ID</lable>' +
             '<input id="swal-input1" class="swal2-input">' +
             '<lable id="swal-label" class="swal2-label">Name</lable>' +
             '<input id="swal-input2" class="swal2-input">'+
         '<lable id="swal-label" class="swal2-label">Phone</lable>' +
                 '<input id="swal-input3" class="swal2-input">' +
             '<lable id="swal-label" class="swal2-label">Level</lable>' +
             '<input id="swal-input4" class="swal2-input">',
         preConfirm: function () {
             return new Promise(function (resolve) {
                 resolve([
                     $('#swal-input1').val(),
                     $('#swal-input2').val(),
                     $('#swal-input3').val(),
                     $('#swal-input4').val()
                 ])
             })
         },
         onOpen: function () {
             $('#swal-input1').focus()
         }
     }).then(function (result) {


         $.ajax({
             method:'post',
             url:'http://127.0.0.1:8000/sweetform/'+result,
             data:{body:'',_token:'{{csrf_token()}}'},
             success:  swal(JSON.stringify(result))

         })
     }).catch(swal.noop)

     $(document).ready(function() {

         $.ajax({
             method:'get',
             url:'http://127.0.0.1:8000/api/allstd',
             data:{body:'',_token:'{{csrf_token()}}'},
             success: function (result) {
                 var text="";
                 var i;
                 for (i = 0; i < result.data.length; i++) {
                     text += " <tr>" +
                         "<th scope='row'>"+result.data[i].id+"</th>\n" +
                         "<th scope='row'>"+result.data[i].name+"</th>\n" +
                         "<th scope='row'>"+result.data[i].phone+"</th>\n" +

                         "</tr>";
                 }
                 var t=" <tr>" +
                     "<th scope='row'>"+result.data[2].id+"</th>\n" +
                     "<th scope='row'>"+result.data[2].name+"</th>\n" +
                     "<th scope='row'>"+result.data[2].phone+"</th>\n" +

                     "</tr>";
                 $('#tr').html(

                     text
                 );
                 $('#data').html(
t

                 );
             }

         })


     });

 </script>
</body>
</html>