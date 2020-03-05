<?php

namespace App\Controller;


use App\Services\LoggerClass;
use App\Services\Master;

use App\Services\transform;
use App\Services\UpperLower;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;




class MasterController extends AbstractController
{
    /**
     * @var LoggerClass
     */
    private $logger;
    /**
     * @var Master
     */
    private $master;

    /**
     * MasterController constructor.
     * @param LoggerClass $logger
     * @param Master $master
     */
    public function __construct(LoggerClass $logger)
    {

        $this->logger = $logger;
    }


    /**
     * @Route("/", name="master_index")
     * @param Master $master
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Master $master)
    {

        if(isset($_POST['text'])){
            $this->logger->message($_POST['text']);
            echo  $master->getMaster()->transform($_POST['text']);
        }
        return $this->render('master/index.html.twig', [
            'controller_name' => 'MasterController',
        ]);
    }
}
