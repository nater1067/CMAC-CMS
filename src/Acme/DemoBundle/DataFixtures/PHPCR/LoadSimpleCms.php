<?php
namespace Acme\DemoBundle\DataFixtures\PHPCR;

use Symfony\Cmf\Bundle\SimpleCmsBundle\Doctrine\Phpcr\Page;
use Doctrine\ODM\PHPCR\DocumentManager;
use Nelmio\Alice\Fixtures;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;

class LoadSimpleCms implements FixtureInterface
{
    /**
     * @param DocumentManager $dm
     */
    public function load(ObjectManager $dm)
    {
        $parent = $dm->find(null, '/cms/simple');
        $page = new Page();
        $page->setTitle('About CMAC');
        $page->setLabel('About');
        $page->setBody('<h2>Mission Statement</h2>
    <p>To be the unifying voice for children with medical needs throughout Nevada</p>
    <h2>Our Vision Statement</h2>
    <p>To provide advocacy, resources and support for community agencies who serve Nevada’s medically fragile children</p>
    ');

        // the tree position defines the URL
        $page->setPosition($parent, 'about');

        $dm->persist($page);
        $dm->flush();



        $parent = $dm->find(null, '/cms/simple');
        $page = new Page();
        $page->setTitle('Affiliate Organizations');
        $page->setLabel('Organizations');
        $page->setBody('Affiliate Organizations');
        $page->setDefault('_template', 'AcmeDemoBundle:Organizations:orgs.html.twig');

        // the tree position defines the URL
        $page->setPosition($parent, 'organizations');

        $dm->persist($page);
        $dm->flush();


        $parent = $dm->find(null, '/cms/simple');
        $page = new Page();
        $page->setTitle('Past Speakers');
        $page->setLabel('Past Speakers');
        $page->setBody('Past Speakers');
        $page->setDefault('_template', 'AcmeDemoBundle:PastSpeakers:past-speakers.html.twig');

        // the tree position defines the URL
        $page->setPosition($parent, 'speakers');

        $dm->persist($page);
        $dm->flush();
    }
}