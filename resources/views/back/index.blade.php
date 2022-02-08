<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href = {{asset('back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}>
  <link rel="stylesheet" href = {{asset('back/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}>
  <link rel="stylesheet" href = {{asset('back/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}>
  <link rel="stylesheet" href ={{asset('back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}>
  <link rel="stylesheet" href =  {{asset('back/assets/vendors/css/vendor.bundle.base.css')}}>
  <link rel="stylesheet" href =  {{asset('back/assets/vendors/css/vendor.bundle.addons.css')}}>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href =  {{asset('back/assets/css/shared/style.css')}}>
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href =  {{asset('back/assets/css/demo_1/style.css')}}>
  <!-- End Layout styles -->
  <link rel="shortcut icon" href = {{asset('back/assets/images/favicon.png')}} >

  <link rel="shortcut icon" href = {{asset('back/assets/images/chosen-sprite.png')}} >
  <link rel="shortcut icon" href = {{asset('back/assets/images/chosen-sprite@2.png')}} >
  <link rel="shortcut icon" href = {{asset('back/assets/css/chosen.css')}} >
  <link rel="shortcut icon" href = {{asset('back/assets/css/chosen.min.css')}} >
  //لاراول فایل منیجر
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>



</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
  @include("back.navbar")
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include("back.sidebar")
      <!-- partial -->
     @yield('content')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script  src= {{asset('back/assets/vendors/js/vendor.bundle.base.js')}}></script>
  <script  src= {{asset('back/assets/vendors/js/vendor.bundle.addons.js')}}></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script  src= {{asset('back/assets/js/shared/off-canvas.js')}}></script>
  <script  src= {{asset('back/assets/js/shared/misc.js')}}></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script  src= {{asset('back/assets/js/demo_1/dashboard.js')}}></script>
  <!-- End custom js for this page-->
  <script  src= {{asset('back/assets/js/chosen.jquery')}}></script>
  <script  src= {{asset('back/assets/js/chosen.jquery.min.js')}}></script>
  <script  src= {{asset('back/assets/js/chosen.proto.js')}}></script>
  <script  src= {{asset('back/assets/js/chosen.proto.min.js')}}></script>
</body>

</html>
