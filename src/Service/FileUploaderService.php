<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    private string $uploadsDirectory;
    private string $assetsDirectory;
    private Filesystem $filesystem;

    public function __construct(string $uploadsDirectory, string $assetsDirectory, Filesystem $filesystem)
    {
        $this->uploadsDirectory = $uploadsDirectory;
        $this->assetsDirectory = $assetsDirectory;
        $this->filesystem = $filesystem;
    }

    public function upload(UploadedFile $uploadedFile, string $directory, string $filename): string
    {
        $originalFilename = $filename ?: pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $uniqueId = uniqid();
        $fileName = $originalFilename . '-' . $uniqueId . '.' . $uploadedFile->guessExtension();

        $uploadedFile->move($this->uploadsDirectory . '/' . $directory, $fileName);

        return $fileName;
    }

    public function remove(string $directory, string $filename): void
    {
        $this->filesystem->remove($this->uploadsDirectory . '/' . $directory . '/' . $filename);
    }

    public function renameDirectory(string $oldDirectory, string $newDirectory): void
    {
        $oldPath = $this->uploadsDirectory . '/' . $oldDirectory;
        $uniqueId = uniqid();
        $newPath = $this->uploadsDirectory . '/' . $newDirectory . '-' . $uniqueId;

        if($this->filesystem->exists($oldPath)) {
            if($this->filesystem->exists($newPath)) {
                $files = scandir($newPath);
                if(count(array_diff($files, ['.', '..'])) === 0) {
                    $this->filesystem->remove($newPath);
                } else {
                    throw new \Exception("Impossible de renommer le répertoire car le répertoire cible '$newPath' n'est pas vide.");
                }
            }

            $this->filesystem->rename($oldPath, $newPath, true);
        }
    }

    public function renameFile(string $directory, string $oldFilename, string $newFilename): string
    {
        $oldFilePath = $this->uploadsDirectory . '/' . $directory . '/' . $oldFilename;
        $uniqueId = uniqid();
        $newFilePath = $this->uploadsDirectory . '/' . $directory . '/' . $newFilename . '-' . $uniqueId;

        if($this->filesystem->exists($oldFilePath)) {
            if($this->filesystem->exists($newFilePath)) {
                throw new \Exception("Impossible de renommer le fichier car le fichier cible '$newFilePath' existe déjà.");
            }

            $this->filesystem->rename($oldFilePath, $newFilePath);
        } else {
            throw new \Exception("Le fichier à renommer '$oldFilePath' n'existe pas.");
        }

        return basename($newFilePath);
    }

    public function removeDirectory(string $directory): void
    {
        $directoryPath = $this->uploadsDirectory . '/' . $directory;

        if($this->filesystem->exists($directoryPath)) {
            $this->filesystem->remove($directoryPath);
        }
    }

    public function copyFile(string $sourceDirectory, string $sourceFilename, string $destinationDirectory, string $newFilename): string
    {
        $sourcePath = $this->assetsDirectory . '/' . $sourceDirectory . '/' . $sourceFilename;
        $fileExtension = pathinfo($sourceFilename, PATHINFO_EXTENSION);
        $uniqueId = uniqid();
        if($fileExtension) {
            $newFilename .= '-' . $uniqueId . '.' . $fileExtension;
        } else {
            $newFilename .= '-' . $uniqueId;
        }

        $destinationPath = $this->uploadsDirectory . '/' . $destinationDirectory . '/' . $newFilename;

        if(!$this->filesystem->exists($sourcePath)) {
            throw new \RuntimeException(sprintf('Source file "%s" does not exist.', $sourcePath));
        }

        if(!$this->filesystem->exists($this->uploadsDirectory . '/' . $destinationDirectory)) {
            $this->filesystem->mkdir($this->uploadsDirectory . '/' . $destinationDirectory, 0777);
        }

        if(!@copy($sourcePath, $destinationPath)) {
            throw new \RuntimeException(sprintf('Failed to copy file from "%s" to "%s".', $sourcePath, $destinationPath));
        }

        return $newFilename;
    }
}
