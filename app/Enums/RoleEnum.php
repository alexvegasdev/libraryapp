<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum RoleEnum
 */

enum RoleEnum: string
{
      case ADMIN    = 'Admin';
      case LIBRARIAN      = 'Librarian';
      case CUSTOMER    = 'Customer';

}