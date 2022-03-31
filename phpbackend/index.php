<?php
    header("Access-Control-Allow-Origin: *");

    
try{
    $db=new PDO('mysql:host=localhost;dbname=todo','root','');
} catch(PDOException $e){
    die($e->getMessage());
}

$action =$_GET['action'];

switch($action){
    //metarialleri listeleme
    case 'materials':
        $query=$db->query('select * from malzemeler order by id desc')->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($query);

        break;

        //metarial ekleme
        case 'addMetarial':
            
            $numbers=$_POST['numbers'];
            $details=$_POST['details'];
            $tedarikci=$_POST['tedarikci'];
            $weights=$_POST['weights'];
            $statu=$_POST['statu'];
   
            
            $data=[
                'numbers'=>$numbers,
                'details'=>$details,
                'tedarikci'=>$tedarikci,
                'weights'=>$weights,
                'statu'=>$statu,
      
            ];
         
            $query=$db->prepare('INSERT INTO malzemeler SET 
            numbers=:numbers,
            details=:details,
            tedarikci=:tedarikci,
            weights=:weights,
            statu=:statu,

            ');
            $insert= $query->execute($data);

            if($insert){
                $data['id']=$db->lastInsertId();
                echo json_encode($data);
            }else{
                $data['error']='there is a error';
            }
            break;
}
