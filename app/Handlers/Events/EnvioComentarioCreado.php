<?php

namespace futboleros\Handlers\Events;

use futboleros\Events\ComentarioCreado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioComentarioCreado
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ComentarioCreado  $event
     * @return void
     */
    public function handle(ComentarioCreado $event)
    {
       file_put_contents(storage_path()."/pruebaaa.txt", $event->getComentario());

}
}
