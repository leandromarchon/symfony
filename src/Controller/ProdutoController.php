<?php

namespace App\Controller;

use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProdutoController extends AbstractController
{
    /**
     * @Route("/produto", name="produto")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $produtos = $entityManager->getRepository(Produto::class)->findAll();

        return $this->render("produto/index.html.twig", array(
            "produtos" => $produtos
        ));
    }
}
