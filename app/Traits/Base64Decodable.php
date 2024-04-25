<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\Storage;

trait Base64Decodable
{
      /**
       * Guarda una imagen de datos base64 en la carpeta especificada con el nombre de archivo proporcionado.
       *
       * @param string $base64Data Los datos de imagen codificados en base64.
       * @param string $folderName El nombre de la carpeta donde guardar la imagen.
       * @param string $fileName El nombre del archivo para guardar la imagen.
       * @throws Exception Si la extensión del archivo no es compatible.
       * @return string La ruta a la imagen guardada.
       */
      public function saveImage(string $base64Data, string $folderName, string $fileName): string
      {
            $extension = $this->getFileExtension($base64Data);
            $image = $this->fileFormat($base64Data);

            $path = "$folderName/{$fileName}$extension";

            Storage::put($path, $image);

            return $path;
      }

      /**
       * Recupera el formato de archivo de un archivo codificado en base64.
       *
       * @param string $base64File El archivo codificado en base64.
       * @return string El formato de archivo decodificado.
       */
      private function fileFormat(string $base64File): string
      {
            return base64_decode(explode(',', $base64File)[1]);
      }

      /**
       * Obtiene la extensión del archivo del archivo base64.
       *
       * @param string $base64File El archivo codificado en base64.
       * @throws Exception si el tipo de archivo no es compatible.
       * @return string La extensión del archivo.
       */
      private function getFileExtension(string $base64File): string
      {
            $mimeType = explode(';', $base64File)[0];

            return match ($mimeType) {
                  'data:application/pdf' => ".pdf",
                  'data:application/json' => ".json",
                  'data:image/gif' => ".gif",
                  'data:image/jpeg' => ".jpg",
                  'data:image/png' => ".png",
                  'data:image/webp' => ".webp",
                  'data:image/x-icon' => ".ico",
                  'data:video/mp4' => ".mp4",
                  'data:video/mpeg' => ".mpeg",
                  default => throw new Exception("El tipo de archivo no es soportado."),
            };
      }
}