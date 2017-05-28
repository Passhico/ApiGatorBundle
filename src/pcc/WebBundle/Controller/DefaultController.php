<?php

namespace pcc\WebBundle\Controller;

use pcc\WeatherBundle\pccWeatherBundle;
use pcc\WeatherBundle\WeatherProviderAPI;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $apigator = $this->get('pcc_apigator.apigator');


        $openWeatherAPI = new WeatherProviderAPI($apigator);


        $ciudad = 'Murcia';
        $temperatura = $openWeatherAPI->getCelsiusByCity($ciudad);


        return $this->render('pccWebBundle:Default:index.html.twig',[
                'ciudad' => $ciudad,
                'temperatura' => $temperatura,
            ]
            );
    }
}
