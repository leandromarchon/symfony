<?php

namespace App\Controller;

use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends Controller
{
    /**
     * @return Response
     * @Route("hello-world")
     */
    public function world()
    {
        return new Response(
            "<html><body><h1>Hello World!</h1></body></html>"
        );
    }

    /**
     * @return Response
     * @Route("mostrar-mensagem")
     */
    public function mensagem()
    {
        return $this->render("hello/mensagem.html.twig", [
            'mensagem' => 'School Of Net !!!'
        ]);
    }

    /**
     * @return Response
     * @Route("cadastrar-produto")
     */
    public function produto()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $produto = new Produto();
        $produto->setNome("Notebook");
        $produto->setPreco(1800.00);

        $entityManager->persist($produto);
        $entityManager->flush();

        return new Response("O produto #".$produto->getId()." - ".$produto->getNome()." foi adicionado com sucesso.");
    }
}