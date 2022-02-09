<?php
namespace App\Controllers;

use App\Services\Router;

class Auth
{
    public function register($data, $files)
    {
        /*
         * Тут можно добавить валидацию полей
         */
        $email = $data['email'];
        $username = $data['username'];
        $full_name = $data['full_name'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];
        $avatar = $files['avatar'];

        if ($password !== $password_confirm) {
            Router::error(500);
            die();
        }

        $fileName = time() . '_' . $avatar['name'];
        $path = 'uploads/avatars/' . $fileName;
        if (move_uploaded_file($avatar['tmp_name'], $path)) {
            // add user to db
            $user = \R::dispense('users');
            $user['name'] = $username;
            $user['email'] = $email;
            $user['full_name'] = $full_name;
            $user['group'] = 1;  //1 - user, 2 - admin
            $user['avatar'] = '/' . $path;
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
            \R::store($user);
            Router::redirect('/login');
        } else {
            Router::error(500);
        }
    }

    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        $user = \R::findOne('users', 'email = ?', [$email]);
        if (!$user) {
            die('Нет такого пользователя');
        }

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = [
                "id" => $user['id'],
                "full_name" => $user['full_name'],
                "username" => $user['username'],
                "group" => $user['group'],
                "email" => $user['email'],
                "avatar" => $user['avatar']
            ];
            Router::redirect('/profile');
        } else {
            die('Не верный логин или пароль');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        Router::redirect('/login');
    }
}