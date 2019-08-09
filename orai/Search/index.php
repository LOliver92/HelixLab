
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Ajax élő keresés</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <br />
            <h2 align="center">Ajax élő kereső</h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">Keresés</span>
                    <input type="text" name="search_text" id="search_text" class="form-control" placeholder="GÉPELJ BE VALAMIT FASZFEJ!!!">
                </div>
            </div>
            <div id="result"></div>
        </div>
    </body>
</html>

<script>
    $(document).ready(function(){
     load_data();
             function load_data(query){
                 //itt a fizikai ajax küldés
                 $.ajax({
                     url:"fetch.php",
                     method:"post",
                     data:{query:query},
                     success:function(data){
                         $('#result').html(data);
                     }
                 });
             }
             
            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search !==''){
                    load_data(search);
                }
                else{
                    load_data();
                }
            });                
        });
</script>