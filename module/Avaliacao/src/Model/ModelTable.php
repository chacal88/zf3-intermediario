<?php


namespace Avaliacao\Model;

use Zend\Db\TableGateway\Exception\RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ModelTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function save($model)
    {
        $id = (int)$model->getId();

        if ($id === 0) {
            $this->tableGateway->insert($model->getArrayCopy());
            return;
        }

        if (!$this->find($id)) {
            throw new RuntimeException(sprintf(
                'Could not retrieve the row %d', $id
            ));
        }

        $this->tableGateway->update($model->getArrayCopy(), ['id' => $id]);
    }

    public function find($id)
    {
        $id     = (int)$id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row    = $rowset->current(); //$row == Post

        if (!$row) {
            throw new RuntimeException(sprintf(
                'Could not retrieve the row %d', $id
            ));
        }

        return $row;
    }

    public function delete($id)
    {
        $this->tableGateway->delete(['id' => (int)$id]);
    }

}