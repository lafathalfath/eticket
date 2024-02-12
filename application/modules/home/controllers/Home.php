<?php

class Home extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'home/index',
        ];

        // Get Front Template
        $this->load->view('front_template/template', $data);
    }

    // Tata Cara
    function tatacara()
    {
        // Content ( Folder => Files)
        $data = [
            'main_content' => 'home/tatacara',
        ];

        // Get Front Template
        $this->load->view('front_template/template', $data);
    }


    // REST API untuk UptimeRobot
    function server()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.uptimerobot.com/v2/getMonitors",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "api_key=ur735052-e693a54c1bac236e9b584862&format=json&logs=1",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $result = json_decode($response, true);
            // echo $result['monitors'][0]['status'];
            $data = [
                'main_content' => 'home/server',
                'result' => $result,
            ];

            $this->load->view('front_template/template', $data);
        }
    }
}
