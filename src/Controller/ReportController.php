<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Report;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    #[Route('/comment/{id}/report', name: 'app_comment_report', methods: ['POST'])]
    public function report(
        Comment $comment,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        // Vérifier que l'utilisateur est connecté
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        $user = $this->getUser();
        $reason = $request->request->get('reason');
        
        // Vérifier si l'utilisateur a déjà signalé ce commentaire
        $existingReport = $entityManager->getRepository(Report::class)
            ->findOneBy([
                'comment' => $comment,
                'reportedBy' => $user
            ]);
            
        if ($existingReport) {
            $this->addFlash('warning', '⚠️ Vous avez déjà signalé ce commentaire.');
            return $this->redirectToRoute('app_home_articles_detail', ['id' => $comment->getArticle()->getId()]);
        }
        
        // Créer le signalement
        $report = new Report();
        $report->setComment($comment);
        $report->setReportedBy($user);
        $report->setReason($reason ?: 'Aucune raison spécifiée');
        
        $entityManager->persist($report);
        $entityManager->flush();
        
        $this->addFlash('success', '✅ Commentaire signalé avec succès. Un modérateur va l\'examiner.');
        
        return $this->redirectToRoute('app_home_articles_detail', ['id' => $comment->getArticle()->getId()]);
    }
}