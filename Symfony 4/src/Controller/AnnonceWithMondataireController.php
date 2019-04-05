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
        $listIdAnnonce = [];
        //TODO - Parcourir l'identity et décomposé chaque ligne en sous chaine 

        // si oui --> étapes suivantes 
        // si non décomposition de la chaine avec l'espace et prendre que les chaine >=3 caractéres 

        // get list commentaire 
        $listCommentaire=$this->getDoctrine()->getRepository('App:Annonces')->findAll();
        $listMondataires=$this->getDoctrine()->getRepository('App:MandatairesTest')->findAll();
        foreach($listCommentaire as $rowCommentaire){
            foreach($listMondataires as $rowIdentity){
                // tester si l'idnetity existe dans le commentaire 
                if(stristr($rowCommentaire->getCommentaires() , $rowIdentity->getIdentity())==true){
                    array_push($finalList,array(
                        "annonce"=>$rowCommentaire,
                        "mondataires"=>$rowIdentity));
                }else{//si non décomposition de la chaine avec l'espace et prendre que les chaine >=3 caractéres 
                    $resultExplode = explode(" ",$rowIdentity->getIdentity()) ; 
                    // parcour la liste de découpage 
                    foreach($resultExplode as $sousChaine){
                        if(strlen($sousChaine)>=3){//chaine >=3 caractére --> chercher cette chaine 
                            if(stristr($rowCommentaire->getCommentaires() , $sousChaine)==true){
                                array_push($finalList,array(
                                    "annonce"=>$rowCommentaire,
                                    "mondataires"=>$rowIdentity));
                            }
                        }
                    }

                }
            }

            //$resultSearchMondataire = $this->getDoctrine()->getRepository('App:MandatairesTest')->searchMondataireInAnnonce($rowCommentaire->getCommentaires());

        }
        foreach($finalList as $rowList){
            if(!in_array($rowList["annonce"]->getId() ,$listIdAnnonce)){// not exist id annonce ---> add in array 
                array_push($listIdAnnonce ,array(
                    "ann_id"=>$rowList["annonce"]->getId(),
                    "monda_id"=>$rowList["mondataires"]->getId()
                ));
            }else{
                array_push($listIdAnnonce["monda_id"] ,array(
                    "monda_id"=>$rowList["mondataires"]->getId()
                ));
            }
        }
        /*$listMondataires=$this->getDoctrine()->getRepository('App:MandatairesTest')->findAll();
        foreach($listMondataires as $rowMondataire){
            $listAnnonceLikeMondataire=$this->getDoctrine()->getRepository('App:Annonces')->getAnnoncesWithMondataires($rowMondataire->getIdentity());
            if($listAnnonceLikeMondataire!=null){
                array_push($finalList,array(
                    "annonce"=>$listAnnonceLikeMondataire,
                    "mondataires"=>$rowMondataire));
            }
        }*/
        $currentObject=$this->get('serializer')->serialize($finalList,'json');
        
        $response=array(
            'code'=>200,
            'message'=>" Success ",
            'result'=>false,
            'result'=>$listIdAnnonce
        );
        return new JsonResponse($response,200);


    }

}