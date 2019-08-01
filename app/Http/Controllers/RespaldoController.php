<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use Log;
use Storage;
use Carbon\Carbon;
use ZipArchive;

class RespaldoController extends Controller
{
    public function index()
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        $files = $disk->files(config('laravel-backup.backup.name'));
        $backups = [];
        // make an array of backup files, with their filesize and creation date
        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('laravel-backup.backup.name') . '/', '', $f),
                    'file_size' => $this->humanFilesize($disk->size($f)),
                    'last_modified' => $this->getDate($disk->lastModified($f)),
                ];
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        return view("mantenimientos.respaldos.index")->with(compact('backups'));
    }

    function getDate($date_modify){
        return Carbon::createFromTimeStamp($date_modify)->formatLocalized('%d %B %Y %H:%M');
    }

    function humanFilesize($size, $precision = 2) {
        $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }

        return round($size, $precision).' '.$units[$i];
    }

    public function añadir_respaldos(){
        //dd(env('DB_DATABASE'));
        $filename = Carbon::now()->format('Y-m-d-H-i-s');
        //Artisan::call('mysql-dump');
        $tempPath = base_path('storage\app\backup-temp\\') . $filename;
        $backPath = base_path('storage\app\\') . $filename;

        $server_name   = "localhost";
        $username      = "root";
        $password      = "";
        $database_name = "anivet_soft_hugo";
        $date_string   = date("Ymd");

        // $cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . $tempPath . '.sql';
        // shell_exec($cmd);

        Artisan::call('backup:mysql-dump', ['filename'=>$filename]);

        // zipping
        $zip = new ZipArchive;
        if ($zip->open($backPath . '.zip', ZipArchive::CREATE) === TRUE) {
            $zip->addFile($tempPath . '.sql', $filename . '.sql');
            $zip->close();
        }

        // clear temp folder
        return response()->json($zip);
    }

    public function descargar_respaldos($file_name){
        ob_end_clean();
        $file = config('laravel-backup.backup.name') . '/' . $file_name;
        $disk = Storage::disk('local');
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "El archivo no existe.");
        }
    }

    public function restaurar_respaldos($file_name){
        $file_name = substr($file_name, 0, -3);
        $file_name = $file_name . 'sql';
        Artisan::call('backup:mysql-restore', ['--filename'=>$file_name, '--yes'=>true]);

        return response()->json($file_name);
    }

    public function eliminar_respaldos(Request $request){
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists(config('laravel-backup.backup.name') . '/' . $request->file_name)) {
            $disk->delete(config('laravel-backup.backup.name') . '/' . $request->file_name);
            return response()->json($request->file_name);
        } else {
            abort(404, "El archivo no existe.");
        }
    }
}
