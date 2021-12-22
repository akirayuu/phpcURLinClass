<?php
include_once ("call_classobj.php");

/* Create class name ListofStudent */
class ListofStudent {
    /* Declare variable name student */
    private $student;
    private $url;
       
    /* Create constructor */
    function __construct(){
        die('in');
        /* constructor */
        $this->url = 'https://reqres.in/api/users?page=2';

        /* Initialize cURL object with handle */
    $this->student = curl_init();
    curl_setopt($this->student, CURLOPT_URL, $this->url); //fetch data from url
    curl_setopt($this->student, CURLOPT_RETURNTRANSFER, 1); //1 = true
    
        /* Respond in string and send data to student */
    $resp = curl_exec($this->student);

    /* Error handler */
    if ($e = curl_error($this->student)) {
        echo $e;
    }
    else {
        $decode = json_decode($resp,1); //set as true
        print_r($decode);
       }
    }
    
    /* Destructor */
    function __destruct()    {
        if ($this->student)
        {
            /* Close cURL handle */
            curl_close($this->student);
            $this->student = NULL;
        }
    }
}
?>