<?php


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity()
 * @ORM\Table(name="Media")
 * @Vich\Uploadable
 */


class Media
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Image",cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $createAt;


    public function __construct()
    {
        $this->setCreateAt(new \DateTime());

        $this->images = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    public function addImage($images)
    {
        $this->images->add($images);
    }

    public function removeImage($images)
    {
        $this->images->removeElement($images);
    }

    /**
     * @param mixed $createAt
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

}