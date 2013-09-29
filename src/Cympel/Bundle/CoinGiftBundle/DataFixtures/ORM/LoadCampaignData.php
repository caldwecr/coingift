<?php
/**
 * Created by JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/28/13
 * Time: 4:29 PM
 * Copyright Cympel Inc
 */
namespace Cympel\Bundle\CoinGiftBundle\DataFixtures\ORM;

use Cympel\Bundle\CoinGiftBundle\Entity\Campaign;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cympel\Bundle\CoinGiftBundle\Entity\User;

class LoadCampaignData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $campaign = new Campaign();
        $campaign->setUser($this->getReference('user'));
        $campaign->setId("Moon Trip");
        $campaign->setSummary("First National Bank should send my second grade class to the moon. This would teach them so much about the moon.");
        $campaign->setBenefitsImpact("Many of the children in my class have often expressed their dreams of becoming astronauts. Sending them to the moon would not only teach them important life skills, it would motivate them to become the next Neil Armstrong.");
        $campaign->setIdea("I am a second grade teacher in the Omaha Public Schools district. Many of the bright young minds in my class have seen the moon many times and tell me all the time that they want to go to there. I talked to them about NASA and how they could someday become astronauts if they apply themselves. I have reached out to NASA several times and for some reason they are not returning my calls or emails.  Perhaps someone at the bank could put in a good word for me? Better yet, if the bank financed the whole trip they would have to take me and all of my little astronuats to the moon. Let's all band together, get behind this and make things happen! Yesterday, Juliano, a poor, slightly dirty young boy in my class looked at me and said, 'Ms Jones...Ms. Jones, do you think that someday I could go to the moon?' I cried that day. later that night, I made up my mind. We are going to the moon.  one way or another. Then my nieghbor told me about all the nice things that FNB does for our community and I thought, OMG, this is the answer. FNB can help us fulfill the dreams of the children. All we need is around $32 million and we can rent one of those russian spaceships that guy from NSYNC went on. Imagine the look on the children's faces...how can you sit by and not help these kids?");
        $campaign->setInspiration("Many of the children in my classroom expressed interest in the moon after learning about the 1969 moon landing.  Many of them were like, I want to go to there.");
        $campaign->setHeadlineImageUri("/stuff/images/cmpgn-img-moontrip.jpg");
        $manager->persist($campaign);
        $moon = $campaign;

        $campaign2 = new Campaign();
        $campaign2->setUser($this->getReference('user2'));
        $campaign2->setId("Park clean up");
        $campaign2->setSummary("Miller park is filthy and needs to be cleaned up. Hoodlums have trashed once again. We need to organize the third cleanup of Miller Park this year.");
        $campaign2->setBenefitsImpact("Many members of the community will benefit from the cleanup of this park. It also seems like a great way for FNB to give back to the community. Imagine all the children being able to frollick and play in a nice clean park again.");
        $campaign2->setIdea("I think FNB could have a few corporate volunteers clean up Miller Park.  This park is close to my house and lately it has become filthy. Vandals have defaced the park and left tons of litter behind. I have uploaded  a picture and it should be obvious to anyone that it needs a good ole fashioned Omaha loving.  Let's band together and git er done. With a little bit of elbow grease from a few like minded people, we can have this thing sparkling new  looking again. My husband owns the minimart down on Leavenworth so we can provide a lot of the cleaning supplies that will be needed. Things still needed include: 10 volunteers, a bunch of shovels, scrubbie brushes, and someone to figure out what else we still need.   ");
        $campaign2->setInspiration("I went to the park yesterday and it was filthy then I got the inspiration to wrrite this community request.");
        $campaign2->setHeadlineImageUri("/stuff/images/cmpgn-img-parkcleanup.jpg");
        $manager->persist($campaign2);
        $park = $campaign2;

        $campaign3 = new Campaign();
        $campaign3->setUser($this->getReference('jesse'));
        $campaign3->setId("Gun buy back");
        $campaign3->setSummary("A gun buyback program like they do in LA would benefit Omaha. What a great way to get guns off the street and positively affect the community. I saw on the Dr. Oz show how they did this in LA and they were able to get 10,000 guns off the street. I even saw that they traded in a rocket launcher.  I hoep there isn't any of those on the streets of Omaha.");
        $campaign3->setBenefitsImpact("This sponsorship allows the Omaha little league team to operate for the summer of 2014. This program helps keep kids out of trouble and teaches them valuable skills such as leadership, cooperation and dedication.");
        $campaign3->setIdea("We can raise money for a gun buyback program. This program will benefit the old people, the middle aged people and the really young ones too. Since people apparently trade there guns fo a few hundred bucks, what a better way to reduce the gang violence on the streets of Omaha. Dr. Oz says that this is something that every community should be doing and I thing Omaha is a community. I mean even if its not, why wouldn't we do waht Dr. Oz is saying? I mean it is a really good idea to get guns off the streets");
        $campaign3->setInspiration("I was watching a special on the Dr. Oz show. I love that man. He is so smart. Omaha can do this too!");
        $campaign3->setHeadlineImageUri("/stuff/images/cmpgn-img-gunbuyback.jpg");
        $manager->persist($campaign3);
        $gun = $campaign3;

        $campaign4 = new Campaign();
        $campaign4->setUser($this->getReference('toni'));
        $campaign4->setId("Homeless housing");
        $campaign4->setSummary("Let's build a homeless shelter");
        $campaign4->setBenefitsImpact("Providing shleter for homeless people will positively affect the community.");
        $campaign4->setIdea("If FNB could get involved in providing a homeless shelter, it would make Omaha a better place. Ideas include financing the shelter, providing volunteers to build or staff the shelter or anything really, it all helps!");
        $campaign4->setInspiration("I was volunteering at the soup kitchen and was shocked by the number of homeless people in Omaha.  We need to help!");
        $campaign4->setHeadlineImageUri("/stuff/images/cmpgn-img-homelesshousing.jpg");
        $manager->persist($campaign4);
        $homeless = $campaign4;

        $campaign5 = new Campaign();
        $campaign5->setUser($this->getReference('user'));
        $campaign5->setId("Downtown block demo");
        $campaign5->setSummary("Fix up the area of Leavenworth between 21st and 25th by demoing it and rebuilding");
        $campaign5->setBenefitsImpact("We can revitalize the neighborhood by demolishing the eye sore on Leavenworth between 21st and 25th streets.  This is all run down and could use a good remodel. Some of the buildings are crumbling and I think we should just smash them and start over with new looking stuff. The neighborhood will prosper.");
        $campaign5->setIdea("We need to smash down the buildings that are on Leavenworth street between 21 & 25th streets.  This is an eye sore and crime in this area has been increasing. If we can put in some new food places and businesses then people will once again like to visit this part of town. I am a real estate professional so I wouls know how to revitalize a community, but I need your help.  let's all rally behind this neighborhood revitalization project and then we can all be proud once again to tell people I live off Leavenworth.  I thnk that we could have Keiwit put in like 36 new buildings that could benefit this area.");
        $campaign5->setInspiration("I was watching extreme makeover home edition and was like, wow, we should do this for the neighborhood. Imagine all of the smiles that we could generate.");
        $campaign5->setHeadlineImageUri("/stuff/images/cmpgn-img-downtownblock.jpg");
        $manager->persist($campaign5);
        $demo = $campaign5;

        $campaign6 = new Campaign();
        $campaign6->setUser($this->getReference('danny'));
        $campaign6->setId("Girl scout pink party");
        $campaign6->setSummary("My child is in Girl Scouts and my coworker's daughter also is in Girl Scouts but not the same troop, I thought it would be fun if we got all of the girl scouts together.");
        $campaign6->setBenefitsImpact("You will change the lives of these young women and motivate them to become upstanding members of the community.");
        $campaign6->setIdea("The Girl Scout Pink Party is an annual event where all the girl scout troups come together for a picnic in the park and you guessed it, we all wear pink! we have lawn games, face painting, pony rides and lots of pink. This is the biggest party of the year in the girl scout world and we are seeking corporate sponsors. FNB has the opportunity to be out lead sponsor which gets prominent placement on the back of all the pink shirts.");
        $campaign6->setInspiration("My cousin's brother's step fiance in-law is an organizer in the Girl Scouts.  They were over at my house last Saturday and told me about this great program.");
        $campaign6->setHeadlineImageUri("/stuff/images/cmpgn-img-girlscout.jpg");
        $manager->persist($campaign6);
        $girl = $campaign6;

        $campaign7 = new Campaign();
        $campaign7->setUser($this->getReference('jesse'));
        $campaign7->setId("Hack a thon");
        $campaign7->setSummary("This is a great idea because we just had one and it's a fun time.");
        $campaign7->setBenefitsImpact("it will get the geeks off the street if only for one weekend.");
        $campaign7->setIdea("There should be another hackathon like the one that we just had.  It was great how many memebers of the community pulled together and created this ");
        $campaign7->setInspiration("my inspiration is nasa");
        $campaign7->setHeadlineImageUri("/stuff/images/cmpgn-img-hackathon.jpg");
        $manager->persist($campaign7);
        $hack = $campaign7;

        $campaign8 = new Campaign();
        $campaign8->setUser($this->getReference('toni'));
        $campaign8->setId("Voter registration");
        $campaign8->setSummary("This is a great idea because ...");
        $campaign8->setBenefitsImpact("it will do great things");
        $campaign8->setIdea("my idea is to fly to the moon");
        $campaign8->setInspiration("my inspiration is nasa");
        $campaign8->setHeadlineImageUri("/stuff/images/juju-portrait.jpg");
        $manager->persist($campaign8);
        $voter = $campaign8;

        $campaign9 = new Campaign();
        $campaign9->setUser($this->getReference('user2'));
        $campaign9->setId("Nintendo-4-kids");
        $campaign9->setSummary("All children under 12 years old in the greater Omaha area will receive an original NES 8 bit gaming system as well as a copy of Mario Bros or Zelda");
        $campaign9->setBenefitsImpact("There are many children who are part of families that cannot afford video game systems. This means that they have to spend time playing outside or with regular toys. These children, by this program, will gain experience pressing buttons at exactly the right moment and squinting at pixelized characters. This will also free up the adults' time to do other things that are more important than spending time with their children like going to sporting events, hunting, or watching TV - on the bedroom TV since the child will be using the living room one. The whole family benefits when the kids are distracted with Mario and Link");
        $campaign9->setIdea("Free original nintendos for anyone under 12 that wants one. First National banks donations that are given to this campaign will be used to buy old Nintendo NES original game systems and child friendly games - where possible these will be collected as donations and in all cases the systems need to be cleaned and checked for functionality. The systems and games will be distributed to children that want them using the mobile library system - in otherwords I will rent a van and put a sign on it that says free candy, which I will cross out and replace with free nintendos, simply knock on the van.");
        $campaign9->setInspiration("Mario and Luigi, the best roommates I ever had during my college days");
        $campaign9->setHeadlineImageUri("/stuff/images/cmpgn-img-nintendo.png");
        $manager->persist($campaign9);
        $nintendo = $campaign9;

        $manager->flush();
        $this->addReference('campaign', $campaign);
        $this->addReference('moon', $moon);
        $this->addReference('park', $park);
        $this->addReference('gun', $gun);
        $this->addReference('homeless', $homeless);
        $this->addReference('demo', $demo);
        $this->addReference('girl', $girl);
        $this->addReference('hack', $hack);
        $this->addReference('voter', $voter);
        $this->addReference('nintendo', $nintendo);
    }

    public function getOrder()
    {
        return 2;
    }
}