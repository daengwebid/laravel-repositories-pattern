<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return $this->user->getPaginate(10);
    }

    public function show($params)
    {
        if (!is_numeric($params)) {
            return $this->user->findBy('email', $params);
        }
        return $this->user->find($params);
    }
}
