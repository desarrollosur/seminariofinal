<?php
namespace app\business\interfaces;

use app\models\User;
use app\models\Cuestionario;

interface IServicioTutorIA
{
    public function consultarTutorUsuarioCuestionario(User $usuarioActual, Cuestionario $cuestionario);
}