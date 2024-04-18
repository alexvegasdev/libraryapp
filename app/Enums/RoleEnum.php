<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum RoleEnum
 */

enum RoleEnum: string
{
      case CUSTOMER    = 'Customer';
      case ADMIN    = 'Admin';
      case LIBRARIAN      = 'Librarian';
}