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
    public $url1 = '';
    public $url2 = '';
    public $url3 = '';

    public function init()
    {
        $bien =' <i class="fa fa-check-square-o text-success" aria-hidden="true"></i>';
        $mal = ' <i class="fa fa-warning text-danger" aria-hidden="true"></i>';

        if($this->tipo == 1 && $this->accion = 'c'){
            $this->a2 = $mal;
            $this->a3 = $mal;
        }

        if($this->apartado){
            $this->a1 = ($this->apartado->apartado1 == 1) ? $bien : $mal;
            $this->a2 = ($this->apartado->apartado2 == 1) ? $bien : $mal;
            $this->a3 = ($this->apartado->apartado3 == 1) ? $bien : $mal;

            $this->url1 = ($this->apartado->apartado1 == 1) ? ['/solicitantes/update', 'id' => $this->id]: '';
            $this->url2 = ($this->apartado->apartado2 == 1) ? ['/cedula-pobreza/update', 'id' => $this->id]: '';
            $this->url3 = ($this->apartado->apartado3 == 1) ? ['/documentos/update', 'id' => $this->id]: '';
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
            'url1' => $this->url1,
            'url2' => $this->url2,
            'url3' => $this->url3,
        ]);
    }
}