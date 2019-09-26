<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<body>

<form  id="form-data" style="width:70%;" action="/admin/add/projects/ajax" data-route="/admin/add/projects/ajax" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="exampleInputEmail1">  عنوان المشروع </label>
        <input type="text" class="form-control"  name="p_name"  value="" placeholder="Enter  Name">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">  لغة البرمجة المستخدمة</label>
        <input type="text" class="form-control"  name="pr_type" value="" placeholder="Enter Project Type">
    </div>


    <div class="form-group">
        <label for="exampleFormControlTextarea2">الوصف</label>
        <textarea class="form-control rounded-0"  name="discreption"  id="exampleFormControlTextarea2" rows="3">الوصف</textarea>
    </div>
    <div class="form-group">
        <label>رفع الملفات:</label>
        <input type="file" name="project_file" class="form-control">
    </div>





    <button type="submit" id="send" class="btn btn-primary upload-image" name="update">تحديث المشروع</button>

</form>
<button   class="btn btn-primary" name="update">تحديث المشروع</button>

<script type="text/javascript">

    $('#form-data').submit(function (e) {
        var formdata = $(this);
        $.ajax({
            type: "POST",
            url: "/admin/add/projects/ajax",
            data: formdata.serialize(),
            success:function(data){

                console.log(data);

            }

        });
        e.preventDefault();
    })
    $("body").on("click",".upload-image",function(e){
        $(this).parents("form").ajaxForm(options);
    });


    var options = {
        complete: function(response)
        {
            if($.isEmptyObject(response.responseJSON.error)){
                $("input[name='pr_type']").val('');
                alert('Image Upload Successfully.');
            }else{
                printErrorMsg(response.responseJSON.error);
            }
        }
    };

</script>



</body>
</html>