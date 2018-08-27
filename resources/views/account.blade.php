<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div id="app"> 
        <header-template></header-template>    
            <router-view></router-view>
           
          
        <!-- <myfooter></myfooter> -->
    </div>

    <script>
        window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                    ]); ?>
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- ckeditor -->
 

</body>
</html>