<?php

namespace DoctrineORMModule\Proxy\__CG__\Avaliacao\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Cliente extends \Avaliacao\Entity\Cliente implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'nome', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'cpfCnpj', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'tipo', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'email', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'sexo', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'data', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'status', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'telefones', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'enderecos', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'veiculos', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'id', 'active', 'created', 'updated'];
        }

        return ['__isInitialized__', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'nome', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'cpfCnpj', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'tipo', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'email', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'sexo', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'data', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'status', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'telefones', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'enderecos', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'veiculos', '' . "\0" . 'Avaliacao\\Entity\\Cliente' . "\0" . 'id', 'active', 'created', 'updated'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Cliente $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setNome($nome)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNome', [$nome]);

        return parent::setNome($nome);
    }

    /**
     * {@inheritDoc}
     */
    public function getNome()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNome', []);

        return parent::getNome();
    }

    /**
     * {@inheritDoc}
     */
    public function setCpfCnpj($cpfCnpj)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCpfCnpj', [$cpfCnpj]);

        return parent::setCpfCnpj($cpfCnpj);
    }

    /**
     * {@inheritDoc}
     */
    public function getCpfCnpj()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCpfCnpj', []);

        return parent::getCpfCnpj();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipo($tipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipo', [$tipo]);

        return parent::setTipo($tipo);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipo', []);

        return parent::getTipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setSexo($sexo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSexo', [$sexo]);

        return parent::setSexo($sexo);
    }

    /**
     * {@inheritDoc}
     */
    public function getSexo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSexo', []);

        return parent::getSexo();
    }

    /**
     * {@inheritDoc}
     */
    public function setData($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setData', [$data]);

        return parent::setData($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getData()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getData', []);

        return parent::getData();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefones()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefones', []);

        return parent::getTelefones();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefones($telefones)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefones', [$telefones]);

        return parent::setTelefones($telefones);
    }

    /**
     * {@inheritDoc}
     */
    public function addTelefones(\Avaliacao\Entity\Telefone $telefone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTelefones', [$telefone]);

        return parent::addTelefones($telefone);
    }

    /**
     * {@inheritDoc}
     */
    public function getEnderecos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnderecos', []);

        return parent::getEnderecos();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnderecos($enderecos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnderecos', [$enderecos]);

        return parent::setEnderecos($enderecos);
    }

    /**
     * {@inheritDoc}
     */
    public function addEnderecos(\Avaliacao\Entity\Endereco $endereco)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEnderecos', [$endereco]);

        return parent::addEnderecos($endereco);
    }

    /**
     * {@inheritDoc}
     */
    public function getVeiculos()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVeiculos', []);

        return parent::getVeiculos();
    }

    /**
     * {@inheritDoc}
     */
    public function setVeiculos($veiculos)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVeiculos', [$veiculos]);

        return parent::setVeiculos($veiculos);
    }

    /**
     * {@inheritDoc}
     */
    public function exchangeApiCpf($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'exchangeApiCpf', [$data]);

        return parent::exchangeApiCpf($data);
    }

    /**
     * {@inheritDoc}
     */
    public function exchangeApiCnpj($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'exchangeApiCnpj', [$data]);

        return parent::exchangeApiCnpj($data);
    }

    /**
     * {@inheritDoc}
     */
    public function hydrate($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hydrate', [$data]);

        return parent::hydrate($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function onPrePersist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'onPrePersist', []);

        return parent::onPrePersist();
    }

    /**
     * {@inheritDoc}
     */
    public function onPreUpdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'onPreUpdate', []);

        return parent::onPreUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function isActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isActive', []);

        return parent::isActive();
    }

    /**
     * {@inheritDoc}
     */
    public function setActive(bool $active)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActive', [$active]);

        return parent::setActive($active);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreated', []);

        return parent::getCreated();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreated(\DateTime $created)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreated', [$created]);

        return parent::setCreated($created);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdated()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdated', []);

        return parent::getUpdated();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdated(\DateTime $updated)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdated', [$updated]);

        return parent::setUpdated($updated);
    }

}