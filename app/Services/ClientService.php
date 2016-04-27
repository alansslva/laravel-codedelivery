<?php
/**
 * Created by PhpStorm.
 * User: alan
 * Date: 26/04/16
 * Time: 19:48
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{

    private $clienteRepository, $userRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clienteRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $id
     * @param array $data
     */
    public function update($id, array $data)
    {
        $this->clienteRepository->update($data, $id);

        $user_id = $this->clienteRepository->find($id)->user_id;

        $this->userRepository->update($data['user'], $user_id);
    }

    public function create($data)
    {

        $data['user']['password'] = bcrypt('123456');

        $user = $this->userRepository->create($data['user']);

        $data['user_id'] = $user->id;

        $this->clienteRepository->create($data);
    }
}