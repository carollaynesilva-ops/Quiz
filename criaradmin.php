<?php

require_once 'config/config.php';

require_once 'app/Classes/Database.php';
require_once 'app/Classes/Usuario.php';

$usuario = new Usuario();

$usuario->cadastrar(

    'Administrador',
    '2000-01-01',
    'admin',
    '123456',
    'admin'

);

echo "Admin criado";