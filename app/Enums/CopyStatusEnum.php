<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum CopyStatusEnum
 */

enum CopyStatusEnum: string
{
      case AVAILABLE    = 'Available';
      case RESERVED     = 'Reserverd';
}


