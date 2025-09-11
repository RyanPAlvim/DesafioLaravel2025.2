<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDENTE = 'pendente';
    case PREPARANDO = 'preparando';
    case ENVIADO = 'enviado';
    case ENTREGUE = 'entregue';
    case CANCELADO = 'cancelado';
}
