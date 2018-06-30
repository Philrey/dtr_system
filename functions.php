<?php
    //Connect to Database//
    $conn=null;
    function connect_to_database($host_name,$user_name,$pass,$db_name,$open_db){
        $conn = mysqli_connect($host_name,$user_name,$pass,$db_name);
        if($open_db==true){
            
            if(mysqli_errno($conn)){
                die("Could not connnect to database. <br/>");
            }else{
                return $conn;
            }
        }else{
            echo "Database Closed <br/>";
            mysqli_close($conn);
        }
    }
    //Crud Operation
    // C = add
    function add_to($table,$columns,$values){
        
        $conn=connect_to_database('localhost','root','','dtr_db',true);
        $query='insert into '.$table.' ';
        $query.='('.$columns.') ';
        $query.='values ';
        $query.='('.$values.')';
		
		//echo $query;
		
        $result=mysqli_query($conn,$query);
        if(!$result){
            return FALSE;
        }
        //4. Release Data From Result
        //mysqli_free_result($result);
        //5. Close Connection
        mysqli_close($conn);
        return TRUE;
    }
    //R = Return a query
    function return_values($select,$from,$where,$table_number){ 
        $conn = connect_to_database('localhost','root','','dtr_db',true);
        $query="select ".$select." from ".$from." ".$where;
        
		//echo $query;
        
		$result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                switch($table_number){
                    case 1:{
                        $cLine []=array( $row['u_id'] , $row['u_name'] , $row['u_pin'] );
                        break;
                    }
					case 2:{
                        
                        break;
                    }
                }
            }
            //4. Release Data From Result
            mysqli_free_result($result);
            //5. Close Connection
            mysqli_close($conn);
            
            return $cLine;
        }

    }
    //Update
    function update_values($table,$set,$where){
        $query='update '.$table.' set '.$set.' where '.$where;
        $conn = connect_to_database('localhost','root','','dtr_db',true);
        $result = mysqli_query($conn,$query);
		
		echo $query;
		
        mysqli_close($conn);
        return $result;
    }
    //Delete
    function delete_values($from,$where){
        $query = 'delete from '.$from.' where '.$where.';';
        
		//echo $query;
		
		$conn = connect_to_database('localhost','root','','dtr_db',true);
        $result = mysqli_query($conn,$query);

        mysqli_close($conn);
        return $result;
    }

    //Translate Values
    function return_month($value){
        switch ($value) {
            case 1:
                return 'January';
            case 2:
                return 'February';
            case 3:
                return 'March';
            case 4:
                return 'April';
            case 5:
                return 'May';
            case 6:
                return 'June';
            case 7:
                return 'July';
            case 8:
                return 'August';
            case 9:
                return 'September';
            case 10:
                return 'October';
            case 11:
                return 'November';
            case 12:
                return 'December';
        }
    }
	
	function getDateNow(){
		$conn = connect_to_database('localhost','root','','dtr_db',true);
        $query="select substr(now(),1,10) as dateNow";
        //echo $query;
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query Failed");
        }else {
            $cLine = array();
            //3. Use Returned Rows //
            while($row = mysqli_fetch_assoc($result)){
                 $cLine []=array($row['dateNow']);
            }
        }
        //4. Release Data From Result
        mysqli_free_result($result);
        //5. Close Connection
        mysqli_close($conn);
            
        return $cLine[0][0];
    }
?>