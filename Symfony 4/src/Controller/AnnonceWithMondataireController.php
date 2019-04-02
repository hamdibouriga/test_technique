<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Annonces;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Config\Definition\Exception\Exception;





class AnnonceWithMondataireController extends Controller
{


        /**
     * @Route(
     *     name="annonce_with_mondataire",
     *     path="/api/listAnnonceWithMondataires",
     *     methods={"GET"}
     * )
     */
    public function __invoke()
    {
        $finalList = [];
        $listMondataires=$this->getDoctrine()->getRepository('App:MandatairesTest')->findAll();
        foreach($listMondataires as $rowMondataire){
            $listAnnonceLikeMondataire=$this->getDoctrine()->getRepository('App:Annonces')->getAnnoncesWithMondataires($rowMondataire->getIdentity());
            if($listAnnonceLikeMondataire!=null){
                array_push($finalList,array(
                    "annonce"=>$listAnnonceLikeMondataire,
                    "mondataires"=>$rowMondataire));
            }
        }
        $currentObject=$this->get('serializer')->serialize($finalList,'json');
        
        $response=array(
            'code'=>200,
            'message'=>" Success ",
            'result'=>false,
            'result'=>json_decode($currentObject)
        );
        return new JsonResponse($response,200);


    }

}