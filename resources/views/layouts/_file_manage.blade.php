<script type="text/javascript" src="/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/tinymce/tinymce_editor.js"></script>
<script type="text/javascript">
  editor_config.selector = "textarea";
  editor_config.path_absolute = "http://localhost:8000/admini/";
  tinymce.init(editor_config);
</script>
    <script type="text/javascript">
      // File Picker modification for FCK Editor v2.0 - www.fckeditor.net
     // by: Pete Forde <pete@unspace.ca> @ Unspace Interactive
     var urlobj;

     function BrowseServer(obj)
     {
          urlobj = obj;
          OpenServerBrowser(
          'http://localhost:8000/admini/filemanager/show',
          screen.width * 0.7,
          screen.height * 0.7 ) ;
     }

     function OpenServerBrowser( url, width, height )
     {
          var iLeft = (screen.width - width) / 2 ;
          var iTop = (screen.height - height) / 2 ;
          var sOptions = "toolbar=no,status=no,resizable=yes,dependent=yes" ;
          sOptions += ",width=" + width ;
          sOptions += ",height=" + height ;
          sOptions += ",left=" + iLeft ;
          sOptions += ",top=" + iTop ;
          var oWindow = window.open( url, "BrowseWindow", sOptions ) ;
     }

     function SetUrl( url, width, height, alt )
     {
        // var a = url.split("/");
        // if(a.length>0) url = a[a.length -1 ];
        url = url.replace("http://localhost:8000/admini/filemanager/userfiles/", "");
          document.getElementById(urlobj).value = url ;
          oWindow = null;
     }
     </script>
