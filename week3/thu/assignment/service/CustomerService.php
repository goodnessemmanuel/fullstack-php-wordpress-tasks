<?php
/**
 * use CustomerService to manage all 
 * related customer operation 
 * e.g create and retrieve customer
 * 
 */
class CustomerService{
        
    /**
     * create
     * @return Customer
     */
    public function create(string $first_name, string $last_name, string $email, string $phone): Customer{
        $url = "https://api.paystack.co/customer";

        $fields = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);

        curl_setopt($ch,CURLOPT_POST, true);

        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            "Authorization: Bearer " . APP_SECRET_KEY,

            "Cache-Control: no-cache",

        )); 

        //So that curl_exec returns the contents of the cURL; rather than echoing it

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);
        //decode the response from the call
        $httpResponse = json_decode($result, true); 

        if($httpResponse['status']){
            $data = $httpResponse['data'];
            return new Customer($data['id'], $data['first_name'], $data['last_name'], $data['email'], $data['phone']);
        }
        
        return null;
    }

    public function getCustomers(){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
      
          CURLOPT_URL => "https://api.paystack.co/customer",
      
          CURLOPT_RETURNTRANSFER => true,
      
          CURLOPT_ENCODING => "",
      
          CURLOPT_MAXREDIRS => 10,
      
          CURLOPT_TIMEOUT => 30,
      
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      
          CURLOPT_CUSTOMREQUEST => "GET",
      
          CURLOPT_HTTPHEADER => array(
      
            "Authorization: Bearer " . APP_SECRET_KEY,
      
            "Cache-Control: no-cache",
      
          ),
      
        ));
      
        
      
        $response = curl_exec($curl);
      
        $err = curl_error($curl);
      
        curl_close($curl);
      
        
        if ($err) {
      
          echo "cURL Error #:" . $err;
      
        } else {
      
          echo $response;
          $decodeResponse = json_decode($response);
          return $decodeResponse["data"];
      
        }

    }
}