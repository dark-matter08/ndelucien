<?php
    $response = array(
        'type' => 'danger',
        'message' => 'Form submission failed, please try again.'
    );


    if (isset($_POST['name'])) {

        $client_name = $_POST['name'];
        $client_email = $_POST['email'];
        $client_subject = $_POST['subject'];
        $client_message = $_POST['message'];
        $receiver_email = "contact@ndelucien.com";

        $headers = "From: $client_email";
        $message = "Name: $client_name\n";
        $message .= "Hello Sir....\n I require your services. Below are my specifications\n $client_message";
        

        if (mail($receiver_email,$client_subject,$message,$headers)) {
            # code...
            $response['type'] = "success";
            $response['message'] = "Thanks for reaching out. I will get back to you as soon as possible";
        }else{
            $response['message'] = "Mail could not be sent successfully, please contact the system administrator";
        }
    }
    

    echo json_encode($response);
    
?>