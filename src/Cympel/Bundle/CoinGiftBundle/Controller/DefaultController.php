<?php

namespace Cympel\Bundle\CoinGiftBundle\Controller;

use Cympel\Bundle\CoinGiftBundle\Entity\Comment;
use Cympel\Bundle\CoinGiftBundle\Entity\NotificationMethod;
use Cympel\Bundle\CoinGiftBundle\Entity\ShareOnNetwork;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Cympel\Bundle\CoinGiftBundle\Entity\Vote;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CympelCoinGiftBundle:Default:index.html.twig');
    }

    public function createAction(Request $request)
    {
        if($request->getMethod() === 'POST') {
            return $this->forward('CympelCoinGiftBundle:Default:createForm');
        }
        return $this->render('CympelCoinGiftBundle:Default:create.html.twig');
    }

    public function campaignAction($campaignName)
    {
        $campaign = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:Campaign')
            ->find($campaignName);

        if(!$campaign) {
            return $this->redirect($this->generateUrl('coinGiftHome'));
        }
        return $this->render('CympelCoinGiftBundle:Default:campaign.html.twig', array(
            'campaign' => $campaign,
        ));
    }

    public function createFormAction(Request $request)
    {
        $campaign = new Campaign();

        $form = $this->createFormBuilder($campaign)
            ->add('id', 'text', array(
                'label' => 'Please name this campaign',
            ))
            ->add('headlineImageUri', 'text', array(
                'label' => 'Enter the Uri of the headline image for your campaign',
            ))
            ->add('idea', 'textarea', array(
                'label' => 'Write your idea',
            ))
            ->add('inspiration', 'textarea', array(
                'label' => 'What inspiration have you had to develop this idea?',
            ))
            ->add('benefitsImpact', 'textarea', array(
                'label' => 'What benefits/impact will this idea to the community?',
            ))
            ->add('notificationMethods', 'choice', array(
                'choices' => NotificationMethod::getNotificationMethodChoices(),
                'multiple' => true,
                'expanded' => true,
            ))
            ->add('shareOnNetworks', 'choice', array(
                'choices' => ShareOnNetwork::getShareOnNetworkChoices(),
                'multiple' => true,
                'expanded' => true,
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

    public function popularAction()
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
        return $this->render('CympelCoinGiftBundle:Default:popular.html.twig', array(
            'firstFourCampaigns' => $firstFourCampaigns,
            'nextFourCampaigns' => $nextFourCampaigns,
        ));
    }

    public function giftAction($campaignName)
    {
        return $this->render('CympelCoinGiftBundle:Default:gift.html.twig');
    }

    public function commentsAction($campaignName)
    {
        $repository = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:Comment');
        $comments = $repository->findBy(
            array('campaign' => $campaignName)
        );

        return $this->render('CympelCoinGiftBundle:Default:comments.html.twig', array(
            'comments' => $comments,
        ));
    }

    public function voteUsernameAction($commentId, $username, $voteValue)
    {
        return new JsonResponse(json_encode("vote received"));
    }

    /**
     * @param $commentId
     * @param $voteValue
     * @return JsonResponse
     *
     * This function cheats and uses a fixtured user to cast a vote
     */
    public function voteAction($commentId, $voteValue)
    {
        $manager = $this->getDoctrine()->getManager();
        $vote = new Vote();

        $repository = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:User');
        $user = $repository->find("coolguy123");

        $vote->setUser($user);

        $repository = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:Comment');
        $comment = $repository->find($commentId);

        $vote->setComment($comment);
        $vote->setValue($voteValue);
        $manager->persist($vote);
        $manager->flush();

        $response = array(
            'success' => true,
            'voteTotal' => $comment->getVoteTotal(),
            'commentId' => $commentId,
        );
        return new JsonResponse($response);
    }

    public function newCampaignCommentAction(Request $request, $campaignName)
    {
        $comment = new Comment();

        $repository = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:User');
        $user = $repository->find("coolguy123");

        $comment->setUser($user);
        $comment->setTimestamp(time());

        $repository = $this->getDoctrine()
            ->getRepository('CympelCoinGiftBundle:Campaign');
        $campaign = $repository->find($campaignName);
        $comment->setCampaign($campaign);

        $form = $this->createFormBuilder($comment)
            ->setAction($this->generateUrl('coinGiftNewCampaignComment', array(
                'campaignName' => $campaignName,
            )))
            ->add('message', 'textarea')
            ->getForm();

        $form->handleRequest($request);

        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('coinGiftCampaign', array(
                'campaignName' => $campaignName,
            )));
        }
        return $this->render('CympelCoinGiftBundle:Default:comment.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
