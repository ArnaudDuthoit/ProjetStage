<?php

namespace App\Controller;

use App\Repository\RealisationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RealisationController extends AbstractController
{
    /**
     * @Route("/realisations", name="realisations")
     * @param RealisationRepository $realisationRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function realisations(RealisationRepository $realisationRepository,
                                 PaginatorInterface $paginator,
                                 Request $request
    ): Response {
        $data = $realisationRepository->findAll();
        $realisations = $paginator -> paginate(
            $data,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('realisation/index.html.twig', [
            'realisations' => $realisations,
        ]);
    }
}
