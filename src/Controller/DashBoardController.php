<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class DashBoardController extends AbstractController
{
    // private $parameterBag;

    // public function __construct(ParameterBagInterface $parameterBag)
    // {
    //     $this->parameterBag = $parameterBag;
    // }

    #[Route('/', name: 'index')]
    public function index(KernelInterface $kernel): Response
    {
        // $projectDir = $this->parameterBag->get('kernel.demo2');
        $projectDir = $kernel->getProjectDir();
        $fullPath = $projectDir . '/jsons/summary.json';
        $jsonSummary = file_get_contents($fullPath);
        $dataSummary = json_decode($jsonSummary, true);

        $ProjectProgressPath = $projectDir . '/jsons/Project_Progress_Summary.json';
        $jsonProjectProgress = file_get_contents($ProjectProgressPath);
        $dataProjectProgress = json_decode($jsonProjectProgress, true);


     
        
        $Whats_NewPath = $projectDir . '/jsons/Whats_New.json';
        $jsonWhats_New = file_get_contents($Whats_NewPath);
        $dataWhats_New = json_decode($jsonWhats_New, true);


        $Latest_ActivityPath = $projectDir . '/jsons/Latest_Activity.json';
        $jsonLatest_Activity = file_get_contents($Latest_ActivityPath);
        $dataLatest_Activity = json_decode($jsonLatest_Activity, true);
        $dataLatest_Activitycount =count($dataLatest_Activity["latest_activity"]);


        $New_ProductsPath = $projectDir . '/jsons/New_Products.json';
        $jsonNew_Products = file_get_contents($New_ProductsPath);
        $dataNew_Products = json_decode($jsonNew_Products, true);
              
       
       
        return $this->render('dash_board/dashboard.html.twig', [
            'controller_name' => 'DashBoardController',
                'dataSummary' => $dataSummary,
                'dataProjectProgress' => $dataProjectProgress ,
                'dataWhats_New' => $dataWhats_New,
                'dataLatest_Activity'=>$dataLatest_Activity ,
                'dataLatest_Activitycount'=>$dataLatest_Activitycount,
                'dataNew_Products'=> $dataNew_Products

         
        ]);
    }
}
