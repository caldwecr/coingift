<?php

namespace Cympel\Bundle\CoinGiftBundle\Controller;

use Cympel\Bundle\CoinGiftBundle\Entity\NotificationMethod;
use Cympel\Bundle\CoinGiftBundle\Entity\ShareOnNetwork;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CympelCoinGiftBundle:Default:index.html.twig');
    }

    public function createAction()
    {
        return $this->render('CympelCoinGiftBundle:Default:create.html.twig');
    }

    public function campaignAction($campaignName)
    {
        return $this->render('CympelCoinGiftBundle:Default:campaign.html.twig', array(
            'campaignName' => $campaignName,
        ));
    }

    public function createFormAction(Request $request)
    {
        $campaign = new Campaign();

        $form = $this->createFormBuilder($campaign)
            ->add('id', 'text')
            ->add('idea', 'text')
            ->add('inspiration', 'text')
            ->add('benefitsImpact', 'text')
            ->add('notificationMethods', 'choice', array(
                'choices' => NotificationMethod::getNotificationMethodChoices(),
                'multiple' => true,
            ))
            ->add('shareOnNetworks', 'choice', array(
                'choices' => ShareOnNetwork::getShareOnNetworkChoices(),
                'multiple' => true,
            ))
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($campaign);
            $em->flush();

            return $this->redirect($this->generateUrl('coinGiftCampaign', array(
                'campaignName' => $campaign->getId(),
            )));
        }
        return $this->render('CympelCoinGiftBundle:Default:createForm.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function trendingAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:Campaign');
        $query = $repository->createQueryBuilder('c')
            ->setMaxResults(4)
            ->getQuery();
        $firstFourCampaigns = $query->getResult();
        $query = $repository->createQueryBuilder('c')
            ->setMaxResults(4)
            ->setFirstResult(4)
            ->getQuery();
        $nextFourCampaigns = $query->getResult();
        return $this->render('CympelCoinGiftBundle:Default:trending.html.twig', array(
            'firstFourCampaigns' => $firstFourCampaigns,
            'nextFourCampaigns' => $nextFourCampaigns,
        ));
    }
}
