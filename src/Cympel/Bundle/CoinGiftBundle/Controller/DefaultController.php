<?php

namespace Cympel\Bundle\CoinGiftBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    }
}
