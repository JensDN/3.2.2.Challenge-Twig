<?php

namespace App\Controller;

use App\Services\LoggerClass;
use App\Services\SpaceToDashes;
use App\Services\UpperLower;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

interface transform
{
    /**
     * @param string $string
     * @return string
     */
    public function transform (string $string):string;
}


class MasterController extends AbstractController
{
    /**
     * @var LoggerClass
     */
    private $logger;
    /**
     * @var SpaceToDashes
     */
    private $spaceToDashes;
    /**
     * @var UpperLower
     */
    private $UpperLower;

    /**
     * MasterController constructor.
     * @param LoggerClass $logger
     * @param SpaceToDashes $spaceToDashes
     * @param UpperLower $UpperLower
     */
    public function __construct(LoggerClass $logger,SpaceToDashes $spaceToDashes, UpperLower $UpperLower)
    {

        $this->logger = $logger;
        $this->spaceToDashes = $spaceToDashes;
        $this->UpperLower = $UpperLower;
    }


    /**
     * @Route("/", name="master_index")
     */
    public function index()
    {
        if(isset($_POST['text'])){
            $this->logger->message($_POST['text']);
            if ($_POST['type']=== 'spaceToDashes'){
                $output = $this->spaceToDashes;
            }
            if ($_POST['type']=== 'UpperLower'){
                $output = $this->UpperLower;
            }
                echo $output->transform($_POST['text']);
        }
        return $this->render('master/index.html.twig', [
            'controller_name' => 'MasterController',
        ]);
    }
}
