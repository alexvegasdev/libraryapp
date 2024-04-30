<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum CopyStatusEnum
 */

enum LoanStatusEnum: string
{
      case ACTIVE    = 'Active';
      case COMPLETED    = 'Completed';
}


