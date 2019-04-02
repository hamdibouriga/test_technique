<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(collectionOperations={
 *         "get"={
 *             "method"="GET",
 *             "normalization_context"={"groups"={"get_collection"}}
 *         },
 *     },
 * itemOperations={
 * "get"={"method"="GET","path"="/listAnnonceWithMondataires"},
 * "special"={"route_name"="annonce_with_mondataire"}
 * })
 * @ORM\Entity(repositoryClass="App\Repository\CustomRepository")
 */
class Custom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
