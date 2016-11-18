<?php


namespace Avaliacao\Entity\Traits;

/**
 * Created by PhpStorm.
 * User: chacal
 * Date: 14/10/16
 * Time: 19:48
 */
trait TAvaliador
{
    /**
     * @ORM\ManyToOne(targetEntity="User\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(name="avaliador_id", referencedColumnName="id",nullable=true)
     */
    private $avaliador;

    /**
     * @return mixed
     */
    public function getAvaliador()
    {
        return $this->avaliador;
    }

    /**
     * @param mixed $avaliador
     * @return TAvaliador
     */
    public function setAvaliador($avaliador)
    {
        $this->avaliador = $avaliador;
        return $this;
    }

}