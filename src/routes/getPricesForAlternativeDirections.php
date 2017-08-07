<?php

$app->post('/api/Travelpayouts/getPricesForAlternativeDirections', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['token']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['token'=>'token'];
    $optionalParams = ['currency'=>'currency','origin'=>'origin','destination'=>'destination','limit'=>'limit','showToAffiliates'=>'show_to_affiliates','departDate'=>'depart_date','returnDate'=>'return_date','flexibility'=>'flexibility','distance'=>'distance'];
    $bodyParams = ['token','currency','origin','destination','limit','show_to_affiliates','depart_date','return_date','flexibility','distance'];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);
    $requestBody = \Models\Params::createRequestBody($data, $bodyParams);

    $client = $this->httpClient;
    $query_str = "http://api.travelpayouts.com/v2/prices/nearest-places-matrix";

    if(!empty($requestBody['depart_date'])){
        $dateString = $requestBody['depart_date'];
        $date = new DateTime($dateString);
        $requestBody['depart_date'] = $date->format("Y-m-d");
    }

    if(!empty($requestBody['return_date'])){
        $dateString = $requestBody['return_date'];
        $date = new DateTime($dateString);
        $requestBody['return_date'] = $date->format("Y-m-d");
    }


    $requestParams['headers'] = [];
    $requestParams['query'] = $requestBody;

    try {
        $resp = $client->get($query_str, $requestParams);
        $responseBody = $resp->getBody()->getContents();

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});