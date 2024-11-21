<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;


class SongController extends Controller
    //request es para poder acceder a los datos enviados
    //y manipularlos , datos que son enviados desde el front
{   //request es un objeto que viene del front
    //cuando recibamos un dato debemos validarlo primero
    //
    public function createSong(Request $request)
    {   //estos son los datos que voy a validar
        //titulo,autor,caratula,genero.
        $validatedData = $request->validate([
            'titulo' => '',
            'autor' => '',
            'caratula' => '',
            'genero' => '',
        ]);

        $song = Song::create($validatedData);


        return response()->json([
        'message' => 'Cancion creada con exito',
        'song' => $song]);
    }

    public function getSong()
    {
        $songs = Song::all();
        return response()->json([
        'message' => 'Cancion obtenida con exito',
        'song' => $songs]);
    }

    public function deleteSong($id)
    {
        $song = Song::find($id);

        if (!$song){
            //creo un arreglo el cual guardo el cual mostrará el mensaje

            $data = [
                'message' => 'Cancion no encontrada',

            ];
            return response()->json($data);
        }

        $song->delete();

        $data = [
            'message' => 'Cancion eliminada',
            'song' => $song,
        ];
        //paso el arreglo data a un objeto json
        

        return response()->json($data);


    }

    public function updateSong(Request $request,$id)
    {
        
        $validatedData = $request->validate([
            'titulo' => '',
            'autor' => '',
            'caratula' => '',
            'genero' => '',
        ]);
        //encontramos la cancion mediante id
        $song = song::find($id);

        if(!$song){
            $data = [
                'message' => 'No se encontro la cancion'
            ];
            return response()->json($data);
        }

        
        $song->update($validatedData);
        
        

        
        return response()->json([
            'message' => 'Cancion actualizada con exito',
            'song' => $song
        ]);

    }



}