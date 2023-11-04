







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="like">

    </div>
    
        <input type="text" id="like">
        <button id="btn">liker</button>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("#btn").click(function (){
                $.ajax({
                    type:'POST',
                    url:'search.php',
                    data:{
                        name:$('#like').val()
                    },
                    success:function (data) {
                        $('.like').html(data)
                    }
                })
            })
        })
    </script>
</body>
</html>



