<?php

namespace Portalrh\Model\DAL;

use PmroPadraoLib\Traits\Singleton;
use PmroPadraoLib\Model\DAL\UsuarioDAL as PMROPadraoUserDAL;
use Portalrh\Util\DBLayer;
use Portalrh\Model\VO\Usuario;

class UsuarioDAL extends PMROPadraoUserDAL
{
    use Singleton;

    private $db = null;

    function __construct() {
        $this->db = DBLayer::Connect();
    }

    public function getById($id)
    {
        $data = $this->db()->table(Usuario::TABLE_NAME)
            ->where(Usuario::SISTEMA, '=', SistemaDAL::getInstance()->getBySigla('JUBARTE')->getId())
            ->where(Usuario::KEY_ID, $id)
            ->get();

        $users = [];

        foreach ($data as $d) {
            array_push($users, Usuario::create($d));
        }

        return $users;
    }

    public function checkAuth($loginName)
    {
        $usuario = $this->db->table(Usuario::TABLE_NAME)
            ->where(Usuario::LOGIN, $loginName)
            ->where(Usuario::ID_SISTEMA, '=', 1)->first();

        if ($usuario && $usuario['ativo']) {
            return true;
        }

        return false;
    }

    /**
     * Obtem um objeto do tipo Usuario.
     *
     * @param  string $loginName
     * @return  \Jubarte\Model\VO\Usuario
     */
    public function getByLoginName($loginName)
    {

        $data = $this->db->table(Usuario::TABLE_NAME)
            ->where(Usuario::LOGIN, $loginName)->first();

        return new Usuario($data);
    }

    public function checkIfExist($idPessoa, $idOrganograma, $idSistema, $idPerfil)
    {
        $result = $this->db->table(Usuario::TABLE_NAME)
            ->where(Usuario::ID_PESSOA, '=', $idPessoa)
            ->where(Usuario::ID_ORGANOGRAMA, '=', $idOrganograma)
            ->where(Usuario::ID_SISTEMA, '=', $idSistema)
            ->where(Usuario::ID_PERFIL, '=', $idPerfil)
            ->first();

        if ($result) {
            return true;
        }
        return false;
    }

    public function create($idPessoa, $idOrganograma, $login, $ativo, $idSistema, $idPerfil)
    {
        $user = array();
        $user['idPessoa'] = $idPessoa;
        $user['idOrganograma'] = $idOrganograma;
        $user['login'] = $login;
        $user['ativo'] = $ativo;
        $user['idSistema'] = $idSistema;
        $user['idPerfil'] = $idPerfil;
        $result = $this->db->table(Usuario::TABLE_NAME)
            ->insert($user);
        return $result;
    }

    public function createFromArray($arrayUserData)
    {
        if ($arrayUserData) {

            $user = array();

            foreach ($arrayUserData as $item) {
                $user['idPessoa'] = $item['idPessoa'];
                $user['idOrganograma'] = $item['idOrganograma'];
                $user['login'] = $item['login'];
                $user['ativo'] = $item['ativo'];
                $user['idSistema'] = $item['idSistema'];
                $user['idPerfil'] = $item['idPerfil'];
            }
            $result = $this->db->table(Usuario::TABLE_NAME)
                ->insertGetId($user);

            return $result;
        }
        return null;
    }
}