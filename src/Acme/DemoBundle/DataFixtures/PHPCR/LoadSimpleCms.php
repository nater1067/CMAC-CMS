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
        $page->setTitle('About Symfony CMF');
        $page->setLabel('About');
        $page->setBody('Here is the about body');

        // the tree position defines the URL
        $page->setPosition($parent, 'about');

        $dm->persist($page);
        $dm->flush();
    }
}