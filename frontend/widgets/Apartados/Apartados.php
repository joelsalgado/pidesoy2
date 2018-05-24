<?php
/**
 * Created by PhpStorm.
 * User: Joel Salgado
 * Date: 02/04/2018
 * Time: 11:59 AM
 */

namespace frontend\widgets\Apartados;

use Yii;
use yii\base\Widget;


class Apartados extends Widget
{
    public $id;
    public $tipo;
    public $apartado;
    public $accion;
    public $a1;
    public $a2;
    public $a3;
    public $a4;
    public $a5;
    public $a6;
    public $url1 = '';
    public $url2 = '';
    public $url3 = '';
    public $url4 = '';
    public $url5 = '';
    public $url6 = '';

    public function init()
    {
        $bien =' <i class="fa fa-check-square-o text-success" aria-hidden="true"></i>';
        $mal = ' <i class="fa fa-warning text-danger" aria-hidden="true"></i>';

        if($this->tipo == 1 && $this->accion = 'c'){
            $this->a2 = $mal;
            $this->a3 = $mal;
            $this->a4 = $mal;
            $this->a5 = $mal;
            $this->a6 = $mal;
        }

        if($this->apartado){
            $this->a1 = ($this->apartado->apartado1 == 1) ? $bien : $mal;
            $this->a2 = ($this->apartado->apartado2 == 1) ? $bien : $mal;
            $this->a3 = ($this->apartado->apartado3 == 1) ? $bien : $mal;
            $this->a4 = ($this->apartado->apartado4 == 1) ? $bien : $mal;
            $this->a5 = ($this->apartado->apartado5 == 1) ? $bien : $mal;
            $this->a6 = ($this->apartado->apartado6 == 1) ? $bien : $mal;

            $this->url1 = ($this->apartado->apartado1 == 1) ? ['/solicitantes/update', 'id' => $this->id]: '';
            $this->url2 = ($this->apartado->apartado2 == 1) ? ['/cedula-pobreza/update', 'id' => $this->id]: '';
            $this->url3 = ($this->apartado->apartado3 == 1) ? ['/documentos/update', 'id' => $this->id]: '';
            $this->url4 = ($this->apartado->apartado4 == 1) ? ['/cedula-ps/index', 'id' => $this->id]: '';
            $this->url5 = ($this->apartado->apartado5 == 1) ? ['/seguimiento/update', 'id' => $this->id]: '';
            $this->url6 = ($this->apartado->apartado6 == 1) ? ['/acciones-adicionales/index', 'id' => $this->id]: '';
        }

        parent::init();
    }


    public function run()
    {
        $regular = ' <i class="fa fa-edit text-warning" aria-hidden="true"></i>';
        return $this->render('index', [
            "id" => $this->id,
            "tipo" => $this->tipo,
            'regular' => $regular,
            'a1' => $this->a1,
            'a2' => $this->a2,
            'a3' => $this->a3,
            'a4' => $this->a4,
            'a5' => $this->a5,
            'a6' => $this->a6,
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
            'url4' => $this->url4,
            'url5' => $this->url5,
            'url6' => $this->url6,
        ]);
    }
}