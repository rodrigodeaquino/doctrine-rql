<?php

namespace AndreasGlaser\DoctrineRql\Fixtures;

use AndreasGlaser\DoctrineRql\Entity;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ORM
 *
 * @package AndreasGlaser\DoctrineRql\Fixtures
 * @author  Andreas Glaser
 */
class ORM implements FixtureInterface
{
    /**
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     *
     * @author Andreas Glaser
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {

            $cart = new Entity\Cart();
            $product = new Entity\Product();
            $photo = new Entity\Photo();
            $productPhoto = new Entity\ProductPhoto();

            $product->name = 'Product ' . $i;
            $photo->name = 'Photo ' . $i;
            $productPhoto->photo = $photo;
            $productPhoto->product = $product;
            $cart->products->add($product);

            $manager->persist($productPhoto);
            $manager->persist($product);
            $manager->persist($cart);
        }

        $manager->flush();
    }
}

