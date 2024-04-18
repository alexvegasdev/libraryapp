<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum GenreEnum
 */

enum GenreEnum: string
{
      case POETRY    = 'Poetry';
      case THEATRE    = 'Theatre';
      case STORY      = 'Story';
      case COMEDY    = 'Comedy';
      case FANTASY    = 'Fantasy';
      case TRAGEDY      = 'Tragedy';
      case FABLE        = 'Fable';
      case HISTORICAL   = 'Historical';
      case CHEMISTRY   = 'Chemistry';
}