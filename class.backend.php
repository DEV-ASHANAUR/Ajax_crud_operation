<?php
include "class.sql.php";
$obj = new sql;    
$item = $obj->viewdata();

extract($_POST);
    
if(isset($_POST['readrecords'])){
    $data = '<table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>';
            if($item->num_rows>0){
                    $number = 1;
                    while($row = $item->fetch_object()){
                $data .= '<tr>
                            <td>'.$number.'</td>
                            <td>'.$row->firstname.'</td>
                            <td>'.$row->lastname.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->mobile.'</td>
                            <td><button class="btn btn-success" onclick="getuser('.$row->id.')">Edit</button></td>

                            <td><button class="btn btn-danger" onclick="DeleteUser('.$row->id.')">Delete</button></td>

                        </tr>';
                
                $number++;
            }
            
        }       
        $data .= '</table>';
        echo $data;   
}
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']) )
{
	$obj->db_insert($firstname,$lastname,$email,$mobile);

}

//delete user

if(isset($_POST['deleteid'])){
    $obj->delete($deleteid);
}


///update show querry

if(isset($_POST['id']) && isset($_POST['id']) != ""){

    $user_id = $_POST['id'];

    $view = $obj->view($user_id);
    $response = array();
    if($view->num_rows>0){
        while($row = $view->fetch_assoc()){
            $response = $row;
        }
    }else{
        $response['status'] = 200;
        $response['message'] = "data not found";
    }
    echo json_encode($response);

}else{
    $response['status'] = 200;
    $response['message'] = "Invaild Request";
}

///update insert


if(isset($_POST['hidden_user'])){
    $hidden = $_POST['hidden_user'];
    $firstname = $_POST['update_firstname'];
    $lastname = $_POST['update_lastname'];
    $email = $_POST['update_email'];
    $mobile = $_POST['update_mobile'];

    $obj->update($hidden,$firstname,$lastname,$email,$mobile);
}








    

?>