<?php

namespace App\Controller;

use App\Classes\LoggerClass;
use App\Classes\SpaceToDashes;
use App\Classes\UpperLower;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
interface transform
{
    public function transform (string $string) :string;
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
            echo $this->spaceToDashes->transform($_POST['text']);
        }
        return $this->render('master/index.html.twig', [
            'controller_name' => 'MasterController',
        ]);
    }
}
