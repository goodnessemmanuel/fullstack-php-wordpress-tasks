<?php
class PayStack implements CustomerService{
    protected $customer_url = "https://api.paystack.co/customer";

    public function createCustomer(string $first_name, string $last_name, string $email, string $phone): Customer{
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
        curl_setopt($ch, CURLOPT_URL, $this->customer_url);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            "Authorization: Bearer " . APP_SECRET_KEY,

            "Cache-Control: no-cache",

        )); 

        //So that curl_exec returns the contents of the cURL; rather than echoing it

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);

        //decode the response from the curl
        $httpResponse = json_decode($result, true); 

        $httpOk = $httpResponse["status"];

        if(!$httpOk){
          throw new ApiRequestException("Cannot create customer due to internal server error");
        }

        $data = $httpResponse['data'];
        
        $customer = new Customer($data['id'], $data['first_name'], $data['last_name'], $data['email'], $data['phone']);
        $customer->setCreatedAt($data['createdAt']);
        $customer->setUpdatedAt($data['updatedAt']);

        return $customer;
    }

    public function getCustomers(): array{
        $customers = [];
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
      
          CURLOPT_URL => $this->customer_url,
      
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
      
          throw new ApiRequestException( "cURL Error #:" . $err);

        }
        //decodes to object of type stdClass 
        $decodeResponse = json_decode($response);
        $data = $decodeResponse->data;

        foreach ($data as $value) {
          $customer = new Customer($value->id, $value->first_name, $value->last_name, $value->email, $value->phone);
          $customer->setCreatedAt($value->createdAt);
          $customer->setUpdatedAt($value->updatedAt);
          $customers[] = $customer;        
        }
        
        return $customers;
    }
}
