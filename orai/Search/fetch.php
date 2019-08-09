<?php
    $conn = mysqli_connect('localhost', 'root', '', 'kereses');
    $output = '';
    
    if(isset($_POST['query'])){
        $search = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = 'SELECT * FROM user WHERE nev LIKE "%'.$search.'%"'; 
    }
    else{
        $sql = 'SELECT * FROM user';
    }
    
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        $output .= '
                <div class="table-responsive">
                <table class="table table bordered">
                <tr>
                <th> Id: </th>
                <th> Nev: </th>
                <th> E-mail: </th>
                </tr>';
        
        while($row = mysqli_fetch_array($result)){
            $output .='
                    <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['nev'].'</td>
                    <td>'.$row['email'].'</td>
                    </tr>';
        }
        print $output;
    }
    else{
        print 'Nincs találat';
    }
?>

