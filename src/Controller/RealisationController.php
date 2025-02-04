<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Realisation;
use App\Form\SearchFormType;
use App\Repository\RealisationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
    public function realisations(
        RealisationRepository $realisationRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $data = new SearchData();
        $form = $this->createForm(SearchFormType::class, $data);
        $form->handleRequest($request);

        $datarealisations = $realisationRepository->findSearch($data);

        $realisations = $paginator->paginate(
            $datarealisations,
            $request->query->getInt('page', 1),
            2
        );

        return $this->render('realisation/index.html.twig', [
            'realisations' => $realisations,
            'form' => $form->createView(),

        ]);
    }

    /**
     * Page with all the details of the project
     * @Route("/realisations/{slug}-{id}", name="realisation.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Realisation $realisation
     * @param string $slug
     * @param EntityManagerInterface $manager
     * @return RedirectResponse|Response
     */
    public function show(Realisation $realisation, string $slug, EntityManagerInterface $manager)
    {
        if ($realisation->getSlug() !== $slug) {
            return $this->redirectToRoute('projet.show', [
                'id' => $realisation->getId(),
                'slug' => $realisation->getSlug()
            ], 301);
        }

        return $this->render('realisation/show.html.twig', [
            'realisation' => $realisation,
        ]);
    }
}
