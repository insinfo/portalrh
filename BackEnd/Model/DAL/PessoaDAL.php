<?php


namespace Portalrh\Model\DAL;

use Portalrh\Util\DBLayer;

use Portalrh\Model\VO\Pessoa;
use Portalrh\Model\VO\PessoaFisica;

class PessoaDAL
{
    private $db = null;

    function __construct()
    {
        $this->db = DBLayer::Connect();
    }

    /**
     * Obtem um objeto do tipo Pessoa.
     *
     * @param  integer  $id
     * @return  \Jubarte\Model\VO\PessoaFisica
     */
    public function getById($id)
    {
        $data = $this->db->table(Pessoa::TABLE_NAME_PESSOA)
            ->where(Pessoa::KEY_ID_PESSOA, $id)
            ->leftJoin('pessoas_fisicas','pessoas_fisicas.idPessoa','=','pessoas.id')
            ->first();

        return new PessoaFisica($data);
    }
}