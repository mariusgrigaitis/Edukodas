<?php

namespace Edukodas\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Edukodas\Bundle\UserBundle\Entity\User;


/**
 * StudentTeam
 *
 * @ORM\Table(name="student_team")
 */
class StudentTeam
{
    use SoftDeleteableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=128)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="studentTeam")
     */
    private $students;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=6)
     */
    private $color;

    /**
     * Student team constructor
     * Set students data type to ArrayCollection
     */
    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return StudentTeam
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set students
     *
     * @param string $students
     *
     * @return StudentTeam
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students
     *
     * @return ArrayCollection
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Add student
     *
     * @param User $student
     *
     * @return $this
     */
    public function addStudent(User $student)
    {
        if (!$this->students->contains($student)) {
            $this->students->add($student);
        }

        return $this;
    }

    /**
     * Remove student
     *
     * @param User $student
     *
     * @return $this
     */
    public function removeStudent(User $student)
    {
        if ($this->students->contains($student)) {
            $this->students->remove($student);
        }

        return $this;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return StudentTeam
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
}