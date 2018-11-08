<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @param Request $request
     * @Route("/produto/cadastrar", name="cadastrar_produto")
     */
    public function create(Request $request)
    {
        $produto = new Produto();
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);
        
        return $this->render("produto/create.html.twig", array(
            'form' => $form->createView()
        ));
    }
}
