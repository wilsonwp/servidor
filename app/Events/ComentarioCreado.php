<?php

namespace futboleros\Events;

use futboleros\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use futboleros\Comentario;
class ComentarioCreado extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $comentario;
    public function __construct(Comentario $comentario)
    {
        $this->comentario = $comentario;
    }
    public function getComentario(){
        return $this->comentario;
    }
    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['comentarios_channel'];
    }
}
