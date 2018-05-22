<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

class Seguimiento extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className()
            ]
        ];
    }

    public static function tableName()
    {
        return 'seguimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solicitante_id'], 'required'],
            [['solicitante_id', 'periodo', 'meta_piso', 'acciones_piso', 'acciones_pendientes_piso', 'programa_piso', 'meta_techo', 'acciones_techo', 'acciones_pendientes_techo', 'programa_techo', 'meta_muro', 'acciones_muro', 'acciones_pendientes_muro', 'programa_muro', 'meta_cuarto', 'acciones_cuarto', 'acciones_pendientes_cuarto', 'programa_cuarto', 'meta_calidad_espacios_vivienda', 'acciones_calidad_espacios_vivienda', 'acciones_pendientez_calidad_espacios_vivienda', 'meta_agua_potable', 'acciones_agua_potable', 'acciones_pendientes_agua_potable', 'programa_agua_potable', 'meta_agua_interior', 'acciones_agua_interior', 'acciones_pendientes_agua_interior', 'programa_agua_interior', 'meta_drenaje', 'acciones_drenaje', 'acciones_pendientes_drenaje', 'programa_drenaje', 'meta_luz', 'acciones_luz', 'acciones_pendientes_luz', 'programa_luz', 'meta_estufa', 'acciones_estufa', 'acciones_pendientes_estufa', 'programa_estufa', 'meta_servicios_basicos', 'acciones_servicios_basicos', 'acciones_pendientez_servicios_basicos', 'meta_seguro_popular', 'acciones_seguro_popular', 'acciones_pendientes_seguro_popular', 'programa_seguro_popular', 'meta_3_15_escuela', 'acciones_3_15_escuela', 'acciones_pendientes_3_15_escuela', 'programa_3_15_escuela', 'meta_antes_1982_primaria', 'acciones_antes_1982_primaria', 'acciones_pendientes_antes_1982_primaria', 'programa_antes_1982_primaria', 'meta_despues_1982_secundaria', 'acciones_despues_1982_secundaria', 'acciones_pendientes_despues_1982_secundaria', 'programa_despues_1982_secundaria', 'meta_educacion', 'acciones_educacion', 'acciones_pendientez_educacion', 'meta_despensas', 'acciones_despensas', 'acciones_pendientes_despensas', 'programa_despensas', 'meta_ss', 'acciones_ss', 'acciones_pendientes_ss', 'programa_ss', 'meta_trabajadores_ss', 'acciones_trabajadores_ss', 'acciones_pendientes_trabajadores_ss', 'programa_trabajadores_ss', 'meta_adultos_ss', 'acciones_adultos_ss', 'acciones_pendientes_adultos_ss', 'programa_adultos_ss', 'meta_s_s', 'acciones_s_s', 'acciones_pendientez_s_s', 'meta_vivienda', 'acciones_vivienda', 'acciones_pendientez_vivienda', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer','message' => 'Debe ser numerico'],
            [['inversion_piso', 'inversion_techo', 'inversion_muro', 'inversion_cuarto', 'inversion_agua_potable', 'inversion_agua_interior', 'inversion_drenaje', 'inversion_luz', 'inversion_estufa', 'inversion_seguro_popular', 'inversion_3_15_escuela', 'inversion_antes_1982_primaria', 'inversion_despues_1982_secundaria', 'inversion_despensas', 'inversion_ss', 'inversion_trabajadores_ss', 'inversion_adultos_ss', 'inversion_vivienda'], 'number', 'message' => 'Debe ser numerico'],
            [['fecha_inicio_piso', 'fecha_entrega_piso', 'fecha_inicio_techo', 'fecha_entrega_techo', 'fecha_inicio_muro', 'fecha_entrega_muro', 'fecha_inicio_cuarto', 'fecha_entrega_cuarto', 'fecha_inicio_agua_potable', 'fecha_entrega_agua_potable', 'fecha_inicio_agua_interior', 'fecha_entrega_agua_interior', 'fecha_inicio_drenaje', 'fecha_entrega_drenaje', 'fecha_inicio_luz', 'fecha_entrega_luz', 'fecha_inicio_estufa', 'fecha_entrega_estufa', 'fecha_inicio_seguro_popular', 'fecha_entrega_seguro_popular', 'fecha_inicio_3_15_escuela', 'fecha_entrega_3_15_escuela', 'fecha_inicio_antes_1982_primaria', 'fecha_entrega_antes_1982_primaria', 'fecha_inicio_despues_1982_secundaria', 'fecha_entrega_despues_1982_secundaria', 'fecha_inicio_despensas', 'fecha_entrega_despensas', 'fecha_inicio_ss', 'fecha_entrega_ss', 'fecha_inicio_trabajadores_ss', 'fecha_entrega_trabajadores_ss', 'fecha_inicio_adultos_ss', 'fecha_entrega_adultos_ss',
                'fecha_termino_piso','fecha_termino_techo','fecha_termino_muro','fecha_termino_cuarto','fecha_termino_agua_potable','fecha_termino_agua_interior','fecha_termino_drenaje','fecha_termino_luz','fecha_termino_estufa','fecha_termino_seguro_popular','fecha_termino_3_15_escuela','fecha_termino_antes_1982_primaria','fecha_termino_despues_1982_secundaria','fecha_termino_despensas','fecha_termino_ss','fecha_termino_trabajadores_ss','fecha_termino_adultos_ss'], 'safe'],
            [['responsable_piso', 'responsable_techo', 'responsable_muro', 'responsable_cuarto', 'responsable_agua_potable', 'responsable_agua_interior', 'responsable_drenaje', 'responsable_luz', 'responsable_estufa', 'responsable_seguro_popular', 'responsable_3_15_escuela', 'responsable_antes_1982_primaria', 'responsable_despues_1982_secundaria', 'responsable_despensas', 'responsable_ss', 'responsable_trabajadores_ss', 'responsable_adultos_ss'], 'string', 'max' => 120],
            [['acciones_piso', 'acciones_techo', 'acciones_muro', 'acciones_cuarto', 'acciones_agua_potable', 'acciones_agua_interior','acciones_drenaje','acciones_luz','acciones_estufa','acciones_seguro_popular','acciones_3_15_escuela','acciones_antes_1982_primaria','acciones_despues_1982_secundaria','acciones_despensas','acciones_ss','acciones_trabajadores_ss','acciones_adultos_ss'], 'boolean', 'message' => 'Solo 0 o 1'],
            [['programa_piso'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_piso' => 'id']],
            [['programa_seguro_popular'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_seguro_popular' => 'id']],
            [['programa_3_15_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_3_15_escuela' => 'id']],
            [['programa_antes_1982_primaria'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_antes_1982_primaria' => 'id']],
            [['programa_despues_1982_secundaria'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_despues_1982_secundaria' => 'id']],
            [['programa_despensas'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_despensas' => 'id']],
            [['programa_ss'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_ss' => 'id']],
            [['programa_trabajadores_ss'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_trabajadores_ss' => 'id']],
            [['programa_adultos_ss'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_adultos_ss' => 'id']],
            [['programa_techo'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_techo' => 'id']],
            [['programa_muro'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_muro' => 'id']],
            [['programa_cuarto'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_cuarto' => 'id']],
            [['programa_agua_potable'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_agua_potable' => 'id']],
            [['programa_agua_interior'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_agua_interior' => 'id']],
            [['programa_drenaje'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_drenaje' => 'id']],
            [['programa_luz'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_luz' => 'id']],
            [['programa_estufa'], 'exist', 'skipOnError' => true, 'targetClass' => Programas::className(), 'targetAttribute' => ['programa_estufa' => 'id']],
            [['solicitante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solicitantes::className(), 'targetAttribute' => ['solicitante_id' => 'id']],
            ['acciones_piso', 'validatePiso'],
            ['acciones_techo', 'validateTecho'],
            ['acciones_muro', 'validateMuro'],
            ['acciones_cuarto', 'validateCuarto'],
            ['acciones_agua_potable', 'validateAgua_potable'],
            ['acciones_agua_interior', 'validateAgua_interior'],
            ['acciones_drenaje', 'validateDrenaje'],
            ['acciones_luz', 'validateLuz'],
            ['acciones_estufa', 'validateEstufa'],
            ['acciones_seguro_popular', 'validateSeguro_popular'],
            ['acciones_3_15_escuela', 'validateDe3_15_escuela'],
            ['acciones_antes_1982_primaria', 'validateAntes_1982_primaria'],
            ['acciones_despues_1982_secundaria', 'validateDespues_1982_secundaria'],
            ['acciones_despensas', 'validateDespensas'],
            ['acciones_ss', 'validateSs'],
            ['acciones_trabajadores_ss', 'validateTrabajadores_ss'],
            ['acciones_adultos_ss', 'validateAdultos_ss'],

        ];
    }


    public function validatePiso()
    {
        if($this->meta_piso == 1){
            $fecha_inicio = $this->fecha_inicio_piso;
            $fecha_entrega = $this->fecha_entrega_piso;
            $fecha_termino = $this->fecha_termino_piso;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_piso', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_piso', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_piso', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_piso == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_piso', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_piso == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_piso', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_piso', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateTecho()
    {
        if($this->meta_techo == 1){
            $fecha_inicio = $this->fecha_inicio_techo;
            $fecha_entrega = $this->fecha_entrega_techo;
            $fecha_termino = $this->fecha_termino_techo;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_techo', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_techo', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_techo', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_techo == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_techo', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_techo == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_techo', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_techo', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateMuro()
    {
        if($this->meta_muro == 1){
            $fecha_inicio = $this->fecha_inicio_muro;
            $fecha_entrega = $this->fecha_entrega_muro;
            $fecha_termino = $this->fecha_termino_muro;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_muro', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_muro', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_muro', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_muro == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_muro', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_muro == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_muro', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_muro', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateCuarto()
    {
        if($this->meta_cuarto == 1){
            $fecha_inicio = $this->fecha_inicio_cuarto;
            $fecha_entrega = $this->fecha_entrega_cuarto;
            $fecha_termino = $this->fecha_termino_cuarto;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_cuarto', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_cuarto', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_cuarto', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_cuarto == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_cuarto', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_cuarto == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_cuarto', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_cuarto', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateAgua_potable()
    {
        if($this->meta_agua_potable == 1){
            $fecha_inicio = $this->fecha_inicio_agua_potable;
            $fecha_entrega = $this->fecha_entrega_agua_potable;
            $fecha_termino = $this->fecha_termino_agua_potable;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_agua_potable', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_agua_potable', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_agua_potable', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_agua_potable == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_agua_potable', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_agua_potable == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_agua_potable', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_agua_potable', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateAgua_interior()
    {
        if($this->meta_agua_interior == 1){
            $fecha_inicio = $this->fecha_inicio_agua_interior;
            $fecha_entrega = $this->fecha_entrega_agua_interior;
            $fecha_termino = $this->fecha_termino_agua_interior;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_agua_interior', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_agua_interior', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_agua_interior', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_agua_interior == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_agua_interior', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_agua_interior == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_agua_interior', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_agua_interior', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateDrenaje()
    {
        if($this->meta_drenaje == 1){
            $fecha_inicio = $this->fecha_inicio_drenaje;
            $fecha_entrega = $this->fecha_entrega_drenaje;
            $fecha_termino = $this->fecha_termino_drenaje;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_drenaje', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_drenaje', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_drenaje', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_drenaje == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_drenaje', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_drenaje == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_drenaje', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_drenaje', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateLuz()
    {
        if($this->meta_luz == 1){
            $fecha_inicio = $this->fecha_inicio_luz;
            $fecha_entrega = $this->fecha_entrega_luz;
            $fecha_termino = $this->fecha_termino_luz;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_luz', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_luz', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_luz', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_luz == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_luz', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_luz == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_luz', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_luz', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateEstufa()
    {
        if($this->meta_estufa == 1){
            $fecha_inicio = $this->fecha_inicio_estufa;
            $fecha_entrega = $this->fecha_entrega_estufa;
            $fecha_termino = $this->fecha_termino_estufa;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_estufa', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_estufa', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_estufa', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_estufa == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_estufa', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_estufa == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_estufa', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_estufa', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateSeguro_popular()
    {
        if($this->meta_seguro_popular == 1){
            $fecha_inicio = $this->fecha_inicio_seguro_popular;
            $fecha_entrega = $this->fecha_entrega_seguro_popular;
            $fecha_termino = $this->fecha_termino_seguro_popular;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_seguro_popular', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_seguro_popular', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_seguro_popular', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_seguro_popular == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_seguro_popular', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_seguro_popular == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_seguro_popular', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_seguro_popular', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateDe3_15_escuela()
    {
        if($this->meta_3_15_escuela == 1){
            $fecha_inicio = $this->fecha_inicio_3_15_escuela;
            $fecha_entrega = $this->fecha_entrega_3_15_escuela;
            $fecha_termino = $this->fecha_termino_3_15_escuela;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_3_15_escuela', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_3_15_escuela', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_3_15_escuela', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_3_15_escuela == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_3_15_escuela', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_3_15_escuela == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_3_15_escuela', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_3_15_escuela', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateAntes_1982_primaria()
    {
        if($this->meta_antes_1982_primaria == 1){
            $fecha_inicio = $this->fecha_inicio_antes_1982_primaria;
            $fecha_entrega = $this->fecha_entrega_antes_1982_primaria;
            $fecha_termino = $this->fecha_termino_antes_1982_primaria;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_antes_1982_primaria', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_antes_1982_primaria', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_antes_1982_primaria', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_antes_1982_primaria == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_antes_1982_primaria', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_antes_1982_primaria == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_antes_1982_primaria', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_antes_1982_primaria', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateDespues_1982_secundaria()
    {
        if($this->meta_despues_1982_secundaria == 1){
            $fecha_inicio = $this->fecha_inicio_despues_1982_secundaria;
            $fecha_entrega = $this->fecha_entrega_despues_1982_secundaria;
            $fecha_termino = $this->fecha_termino_despues_1982_secundaria;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_despues_1982_secundaria', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_despues_1982_secundaria', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_despues_1982_secundaria', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_despues_1982_secundaria == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_despues_1982_secundaria', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_despues_1982_secundaria == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_despues_1982_secundaria', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_despues_1982_secundaria', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateDespensas()
    {
        if($this->meta_despensas == 1){
            $fecha_inicio = $this->fecha_inicio_despensas;
            $fecha_entrega = $this->fecha_entrega_despensas;
            $fecha_termino = $this->fecha_termino_despensas;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_despensas', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_despensas', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_despensas', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_despensas == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_despensas', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_despensas == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_despensas', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_despensas', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateSs()
    {
        if($this->meta_ss == 1){
            $fecha_inicio = $this->fecha_inicio_ss;
            $fecha_entrega = $this->fecha_entrega_ss;
            $fecha_termino = $this->fecha_termino_ss;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_ss', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_ss', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_ss', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_ss == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_ss', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_ss == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_ss', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_ss', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateTrabajadores_ss()
    {
        if($this->meta_trabajadores_ss == 1){
            $fecha_inicio = $this->fecha_inicio_trabajadores_ss;
            $fecha_entrega = $this->fecha_entrega_trabajadores_ss;
            $fecha_termino = $this->fecha_termino_trabajadores_ss;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_trabajadores_ss', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_trabajadores_ss', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_trabajadores_ss', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_trabajadores_ss == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_trabajadores_ss', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_trabajadores_ss == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_trabajadores_ss', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_trabajadores_ss', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function validateAdultos_ss()
    {
        if($this->meta_adultos_ss == 1){
            $fecha_inicio = $this->fecha_inicio_adultos_ss;
            $fecha_entrega = $this->fecha_entrega_adultos_ss;
            $fecha_termino = $this->fecha_termino_adultos_ss;

            if(!$fecha_inicio){
                $this->addError('fecha_inicio_adultos_ss', 'Fecha Obligatoria');
                $this->fechas();
            }

            if(!$fecha_entrega){
                $this->addError('fecha_entrega_adultos_ss', 'Fecha Obligatoria');
                $this->fechas();
            }

            if ($fecha_inicio && $fecha_entrega){
                $date1 = date_create($fecha_inicio);
                $date2 = date_create($fecha_entrega);
                $interval = date_diff($date1, $date2);
                $differenceFormat = '%a';
                //var_dump($interval->format($differenceFormat)); die;
                if($date1 > $date2){
                    $this->addError('fecha_entrega_adultos_ss', 'Fecha es menor a la de inicio');
                    $this->fechas();
                }
            }

            if ($this->acciones_adultos_ss == 1){
                if(!$fecha_termino){
                    $this->addError('fecha_termino_adultos_ss', 'Fecha Obligatoria');
                    $this->fechas();
                }
            }

            if ($this->acciones_adultos_ss == 1){

                if(!$fecha_termino){
                    $this->addError('fecha_termino_adultos_ss', 'Fecha Obligatoria');
                    $this->fechas();
                }

                if($fecha_inicio && $fecha_termino){
                    $date1 = date_create($fecha_inicio);
                    $date2 = date_create($fecha_termino);
                    if($date1 > $date2){
                        $this->addError('fecha_termino_adultos_ss', 'Fecha es menor a la de inicio');
                        $this->fechas();
                    }
                }
            }

        }

    }

    public function fechas(){
        $this->fecha_inicio_piso = ($this->fecha_inicio_piso)? Yii::$app->formatter->asDate($this->fecha_inicio_piso, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_piso = ($this->fecha_entrega_piso)? Yii::$app->formatter->asDate($this->fecha_entrega_piso, 'dd-MM-yyyy'): null;
        $this->fecha_termino_piso = ($this->fecha_termino_piso)? Yii::$app->formatter->asDate($this->fecha_termino_piso, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_techo = ($this->fecha_inicio_techo) ? Yii::$app->formatter->asDate($this->fecha_inicio_techo, 'dd-MM-yyyy') : null;
        $this->fecha_entrega_techo = ($this->fecha_entrega_techo) ? Yii::$app->formatter->asDate($this->fecha_entrega_techo, 'dd-MM-yyyy'): null;
        $this->fecha_termino_techo = ($this->fecha_termino_techo)? Yii::$app->formatter->asDate($this->fecha_termino_techo, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_muro = ($this->fecha_inicio_muro) ? Yii::$app->formatter->asDate($this->fecha_inicio_muro, 'dd-MM-yyyy') : null;
        $this->fecha_entrega_muro = ($this->fecha_entrega_muro) ? Yii::$app->formatter->asDate($this->fecha_entrega_muro, 'dd-MM-yyyy'): null;
        $this->fecha_termino_muro = ($this->fecha_termino_muro)? Yii::$app->formatter->asDate($this->fecha_termino_muro, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_cuarto = ($this->fecha_inicio_cuarto) ? Yii::$app->formatter->asDate($this->fecha_inicio_cuarto, 'dd-MM-yyyy') : null;
        $this->fecha_entrega_cuarto = ($this->fecha_entrega_cuarto) ? Yii::$app->formatter->asDate($this->fecha_entrega_cuarto, 'dd-MM-yyyy'): null;
        $this->fecha_termino_cuarto = ($this->fecha_termino_cuarto)? Yii::$app->formatter->asDate($this->fecha_termino_cuarto, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_agua_potable = ($this->fecha_inicio_agua_potable) ? Yii::$app->formatter->asDate($this->fecha_inicio_agua_potable, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_agua_potable = ($this->fecha_entrega_agua_potable) ? Yii::$app->formatter->asDate($this->fecha_entrega_agua_potable, 'dd-MM-yyyy'): null;
        $this->fecha_termino_agua_potable = ($this->fecha_termino_agua_potable)? Yii::$app->formatter->asDate($this->fecha_termino_agua_potable, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_agua_interior = ($this->fecha_inicio_agua_interior) ? Yii::$app->formatter->asDate($this->fecha_inicio_agua_interior, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_agua_interior = ($this->fecha_entrega_agua_interior) ? Yii::$app->formatter->asDate($this->fecha_entrega_agua_interior, 'dd-MM-yyyy'): null;
        $this->fecha_termino_agua_interior = ($this->fecha_termino_agua_interior)? Yii::$app->formatter->asDate($this->fecha_termino_agua_interior, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_drenaje = ($this->fecha_inicio_drenaje)? Yii::$app->formatter->asDate($this->fecha_inicio_drenaje, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_drenaje = ($this->fecha_entrega_drenaje) ? Yii::$app->formatter->asDate($this->fecha_entrega_drenaje, 'dd-MM-yyyy'): null;
        $this->fecha_termino_drenaje = ($this->fecha_termino_drenaje)? Yii::$app->formatter->asDate($this->fecha_termino_drenaje, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_luz = ($this->fecha_inicio_luz) ? Yii::$app->formatter->asDate($this->fecha_inicio_luz, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_luz = ($this->fecha_entrega_luz) ? Yii::$app->formatter->asDate($this->fecha_entrega_luz, 'dd-MM-yyyy'): null;
        $this->fecha_termino_luz = ($this->fecha_termino_luz)? Yii::$app->formatter->asDate($this->fecha_termino_luz, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_estufa = ($this->fecha_inicio_estufa) ? Yii::$app->formatter->asDate($this->fecha_inicio_estufa, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_estufa = ($this->fecha_entrega_estufa) ? Yii::$app->formatter->asDate($this->fecha_entrega_estufa, 'dd-MM-yyyy'): null;
        $this->fecha_termino_estufa = ($this->fecha_termino_estufa)? Yii::$app->formatter->asDate($this->fecha_termino_estufa, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_seguro_popular = ($this->fecha_inicio_seguro_popular) ? Yii::$app->formatter->asDate($this->fecha_inicio_seguro_popular, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_seguro_popular = ($this->fecha_entrega_seguro_popular) ? Yii::$app->formatter->asDate($this->fecha_entrega_seguro_popular, 'dd-MM-yyyy'): null;
        $this->fecha_termino_seguro_popular = ($this->fecha_termino_seguro_popular)? Yii::$app->formatter->asDate($this->fecha_termino_seguro_popular, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_3_15_escuela = ($this->fecha_inicio_3_15_escuela) ? Yii::$app->formatter->asDate($this->fecha_inicio_3_15_escuela, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_3_15_escuela = ($this->fecha_entrega_3_15_escuela) ? Yii::$app->formatter->asDate($this->fecha_entrega_3_15_escuela, 'dd-MM-yyyy'): null;
        $this->fecha_termino_3_15_escuela = ($this->fecha_termino_3_15_escuela)? Yii::$app->formatter->asDate($this->fecha_termino_3_15_escuela, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_antes_1982_primaria = ($this->fecha_inicio_antes_1982_primaria) ? Yii::$app->formatter->asDate($this->fecha_inicio_antes_1982_primaria, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_antes_1982_primaria = ($this->fecha_entrega_antes_1982_primaria)?Yii::$app->formatter->asDate($this->fecha_entrega_antes_1982_primaria, 'dd-MM-yyyy'): null;
        $this->fecha_termino_antes_1982_primaria = ($this->fecha_termino_antes_1982_primaria)? Yii::$app->formatter->asDate($this->fecha_termino_antes_1982_primaria, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_despues_1982_secundaria = ($this->fecha_inicio_despues_1982_secundaria) ? Yii::$app->formatter->asDate($this->fecha_inicio_despues_1982_secundaria, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_despues_1982_secundaria = ($this->fecha_entrega_despues_1982_secundaria) ? Yii::$app->formatter->asDate($this->fecha_entrega_despues_1982_secundaria, 'dd-MM-yyyy'): null;
        $this->fecha_termino_despues_1982_secundaria = ($this->fecha_termino_despues_1982_secundaria)? Yii::$app->formatter->asDate($this->fecha_termino_despues_1982_secundaria, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_despensas = ($this->fecha_inicio_despensas) ? Yii::$app->formatter->asDate($this->fecha_inicio_despensas, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_despensas = ($this->fecha_entrega_despensas) ? Yii::$app->formatter->asDate($this->fecha_entrega_despensas, 'dd-MM-yyyy'): null;
        $this->fecha_termino_despensas = ($this->fecha_termino_despensas)? Yii::$app->formatter->asDate($this->fecha_termino_despensas, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_ss = ($this->fecha_inicio_ss) ? Yii::$app->formatter->asDate($this->fecha_inicio_ss, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_ss = ($this->fecha_entrega_ss) ? Yii::$app->formatter->asDate($this->fecha_entrega_ss, 'dd-MM-yyyy'): null;
        $this->fecha_termino_ss = ($this->fecha_termino_ss)? Yii::$app->formatter->asDate($this->fecha_termino_ss, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_trabajadores_ss = ($this->fecha_inicio_trabajadores_ss) ? Yii::$app->formatter->asDate($this->fecha_inicio_trabajadores_ss, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_trabajadores_ss = ($this->fecha_entrega_trabajadores_ss) ? Yii::$app->formatter->asDate($this->fecha_entrega_trabajadores_ss, 'dd-MM-yyyy'): null;
        $this->fecha_termino_trabajadores_ss = ($this->fecha_termino_trabajadores_ss)? Yii::$app->formatter->asDate($this->fecha_termino_trabajadores_ss, 'dd-MM-yyyy'): null;
        $this->fecha_inicio_adultos_ss = ($this->fecha_inicio_adultos_ss) ? Yii::$app->formatter->asDate($this->fecha_inicio_adultos_ss, 'dd-MM-yyyy'): null;
        $this->fecha_entrega_adultos_ss = ($this->fecha_entrega_adultos_ss) ? Yii::$app->formatter->asDate($this->fecha_entrega_adultos_ss, 'dd-MM-yyyy'): null;
        $this->fecha_termino_adultos_ss = ($this->fecha_termino_adultos_ss)? Yii::$app->formatter->asDate($this->fecha_termino_adultos_ss, 'dd-MM-yyyy'): null;

    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'solicitante_id' => 'Solicitante ID',
            'periodo' => 'Periodo',
            'meta_piso' => 'Meta Piso',
            'acciones_piso' => 'Acciones Piso',
            'acciones_pendientes_piso' => 'Acciones Pendientes Piso',
            'inversion_piso' => 'Inversion Piso',
            'fecha_inicio_piso' => 'Fecha Inicio Piso',
            'fecha_entrega_piso' => 'Fecha Entrega Piso',
            'fecha_termino_piso' => 'Fecha Termino Piso',
            'programa_piso' => 'Programa Piso',
            'responsable_piso' => 'Responsable Piso',
            'meta_techo' => 'Meta Techo',
            'acciones_techo' => 'Acciones Techo',
            'acciones_pendientes_techo' => 'Acciones Pendientes Techo',
            'inversion_techo' => 'Inversion Techo',
            'fecha_inicio_techo' => 'Fecha Inicio Techo',
            'fecha_entrega_techo' => 'Fecha Entrega Techo',
            'fecha_termino_techo' => 'Fecha Termino Techo',
            'programa_techo' => 'Programa Techo',
            'responsable_techo' => 'Responsable Techo',
            'meta_muro' => 'Meta Muro',
            'acciones_muro' => 'Acciones Muro',
            'acciones_pendientes_muro' => 'Acciones Pendientes Muro',
            'inversion_muro' => 'Inversion Muro',
            'fecha_inicio_muro' => 'Fecha Inicio Muro',
            'fecha_entrega_muro' => 'Fecha Entrega Muro',
            'fecha_termino_muro' => 'Fecha Termino Muro',
            'programa_muro' => 'Programa Muro',
            'responsable_muro' => 'Responsable Muro',
            'meta_cuarto' => 'Meta Cuarto',
            'acciones_cuarto' => 'Acciones Cuarto',
            'acciones_pendientes_cuarto' => 'Acciones Pendientes Cuarto',
            'inversion_cuarto' => 'Inversion Cuarto',
            'fecha_inicio_cuarto' => 'Fecha Inicio Cuarto',
            'fecha_entrega_cuarto' => 'Fecha Entrega Cuarto',
            'fecha_termino_cuarto' => 'Fecha Termino Cuarto',
            'programa_cuarto' => 'Programa Cuarto',
            'responsable_cuarto' => 'Responsable Cuarto',
            'meta_calidad_espacios_vivienda' => 'Meta Calidad Espacios Vivienda',
            'acciones_calidad_espacios_vivienda' => 'Acciones Calidad Espacios Vivienda',
            'acciones_pendientez_calidad_espacios_vivienda' => 'Acciones Pendientes Calidad Espacios Vivienda',
            'meta_agua_potable' => 'Meta Agua Potable',
            'acciones_agua_potable' => 'Acciones Agua Potable',
            'acciones_pendientes_agua_potable' => 'Acciones Pendientes Agua Potable',
            'inversion_agua_potable' => 'Inversion Agua Potable',
            'fecha_inicio_agua_potable' => 'Fecha Inicio Agua Potable',
            'fecha_entrega_agua_potable' => 'Fecha Entrega Agua Potable',
            'fecha_termino_agua_potable' => 'Fecha Termino Agua Potable',
            'programa_agua_potable' => 'Programa Agua Potable',
            'responsable_agua_potable' => 'Responsable Agua Potable',
            'meta_agua_interior' => 'Meta Agua Interior',
            'acciones_agua_interior' => 'Acciones Agua Interior',
            'acciones_pendientes_agua_interior' => 'Acciones Pendientes Agua Interior',
            'inversion_agua_interior' => 'Inversion Agua Interior',
            'fecha_inicio_agua_interior' => 'Fecha Inicio Agua Interior',
            'fecha_entrega_agua_interior' => 'Fecha Entrega Agua Interior',
            'fecha_termino_agua_interior' => 'Fecha Termino Agua Interior',
            'programa_agua_interior' => 'Programa Agua Interior',
            'responsable_agua_interior' => 'Responsable Agua Interior',
            'meta_drenaje' => 'Meta Drenaje',
            'acciones_drenaje' => 'Acciones Drenaje',
            'acciones_pendientes_drenaje' => 'Acciones Pendientes Drenaje',
            'inversion_drenaje' => 'Inversion Drenaje',
            'fecha_inicio_drenaje' => 'Fecha Inicio Drenaje',
            'fecha_entrega_drenaje' => 'Fecha Entrega Drenaje',
            'fecha_termino_drenaje' => 'Fecha Termino Drenaje',
            'programa_drenaje' => 'Programa Drenaje',
            'responsable_drenaje' => 'Responsable Drenaje',
            'meta_luz' => 'Meta Luz',
            'acciones_luz' => 'Acciones Luz',
            'acciones_pendientes_luz' => 'Acciones Pendientes Luz',
            'inversion_luz' => 'Inversion Luz',
            'fecha_inicio_luz' => 'Fecha Inicio Luz',
            'fecha_entrega_luz' => 'Fecha Entrega Luz',
            'fecha_termino_luz' => 'Fecha Termino Luz',
            'programa_luz' => 'Programa Luz',
            'responsable_luz' => 'Responsable Luz',
            'meta_estufa' => 'Meta Estufa',
            'acciones_estufa' => 'Acciones Estufa',
            'acciones_pendientes_estufa' => 'Acciones Pendientes Estufa',
            'inversion_estufa' => 'Inversion Estufa',
            'fecha_inicio_estufa' => 'Fecha Inicio Estufa',
            'fecha_entrega_estufa' => 'Fecha Entrega Estufa',
            'fecha_termino_estufa' => 'Fecha Termino Estufa',
            'programa_estufa' => 'Programa Estufa',
            'responsable_estufa' => 'Responsable Estufa',
            'meta_servicios_basicos' => 'Meta Servicios Basicos',
            'acciones_servicios_basicos' => 'Acciones Servicios Basicos',
            'acciones_pendientez_servicios_basicos' => 'Acciones Pendientes Servicios Basicos',
            'meta_seguro_popular' => 'Meta Seguro Popular',
            'acciones_seguro_popular' => 'Acciones Seguro Popular',
            'acciones_pendientes_seguro_popular' => 'Acciones Pendientes Seguro Popular',
            'inversion_seguro_popular' => 'Inversion Seguro Popular',
            'fecha_inicio_seguro_popular' => 'Fecha Inicio Seguro Popular',
            'fecha_entrega_seguro_popular' => 'Fecha Entrega Seguro Popular',
            'fecha_termino_seguro_popular' => 'Fecha Termino Seguro Popular',
            'programa_seguro_popular' => 'Programa Seguro Popular',
            'responsable_seguro_popular' => 'Responsable Seguro Popular',
            'meta_3_15_escuela' => 'Meta 3 15 Escuela',
            'acciones_3_15_escuela' => 'Acciones 3 15 Escuela',
            'acciones_pendientes_3_15_escuela' => 'Acciones Pendientes 3 15 Escuela',
            'inversion_3_15_escuela' => 'Inversion 3 15 Escuela',
            'fecha_inicio_3_15_escuela' => 'Fecha Inicio 3 15 Escuela',
            'fecha_entrega_3_15_escuela' => 'Fecha Entrega 3 15 Escuela',
            'fecha_termino_3_15_escuela' => 'Fecha Termino 3 15 Escuela',
            'programa_3_15_escuela' => 'Programa 3 15 Escuela',
            'responsable_3_15_escuela' => 'Responsable 3 15 Escuela',
            'meta_antes_1982_primaria' => 'Meta Antes 1982 Primaria',
            'acciones_antes_1982_primaria' => 'Acciones Antes 1982 Primaria',
            'acciones_pendientes_antes_1982_primaria' => 'Acciones Pendientes Antes 1982 Primaria',
            'inversion_antes_1982_primaria' => 'Inversion Antes 1982 Primaria',
            'fecha_inicio_antes_1982_primaria' => 'Fecha Inicio Antes 1982 Primaria',
            'fecha_entrega_antes_1982_primaria' => 'Fecha Entrega Antes 1982 Primaria',
            'fecha_termino_antes_1982_primaria' => 'Fecha Termino Antes 1982 Primaria',
            'programa_antes_1982_primaria' => 'Programa Antes 1982 Primaria',
            'responsable_antes_1982_primaria' => 'Responsable Antes 1982 Primaria',
            'meta_despues_1982_secundaria' => 'Meta Despues 1982 Secundaria',
            'acciones_despues_1982_secundaria' => 'Acciones Despues 1982 Secundaria',
            'acciones_pendientes_despues_1982_secundaria' => 'Acciones Pendientes Despues 1982 Secundaria',
            'inversion_despues_1982_secundaria' => 'Inversion Despues 1982 Secundaria',
            'fecha_inicio_despues_1982_secundaria' => 'Fecha Inicio Despues 1982 Secundaria',
            'fecha_entrega_despues_1982_secundaria' => 'Fecha Entrega Despues 1982 Secundaria',
            'fecha_termino_despues_1982_secundaria' => 'Fecha Termino Despues 1982 Secundaria',
            'programa_despues_1982_secundaria' => 'Programa Despues 1982 Secundaria',
            'responsable_despues_1982_secundaria' => 'Responsable Despues 1982 Secundaria',
            'meta_educacion' => 'Meta Educacion',
            'acciones_educacion' => 'Acciones Educacion',
            'acciones_pendientez_educacion' => 'Acciones Pendientes Educacion',
            'meta_despensas' => 'Meta Despensas',
            'acciones_despensas' => 'Acciones Despensas',
            'acciones_pendientes_despensas' => 'Acciones Pendientes Despensas',
            'inversion_despensas' => 'Inversion Despensas',
            'fecha_inicio_despensas' => 'Fecha Inicio Despensas',
            'fecha_entrega_despensas' => 'Fecha Entrega Despensas',
            'fecha_termino_despensas' => 'Fecha Termino Despensas',
            'programa_despensas' => 'Programa Despensas',
            'responsable_despensas' => 'Responsable Despensas',
            'meta_ss' => 'Meta Ss',
            'acciones_ss' => 'Acciones Ss',
            'acciones_pendientes_ss' => 'Acciones Pendientes Ss',
            'inversion_ss' => 'Inversion Ss',
            'fecha_inicio_ss' => 'Fecha Inicio Ss',
            'fecha_entrega_ss' => 'Fecha Entrega Ss',
            'fecha_termino_ss' => 'Fecha Termino Ss',
            'programa_ss' => 'Programa Ss',
            'responsable_ss' => 'Responsable Ss',
            'meta_trabajadores_ss' => 'Meta Trabajadores Ss',
            'acciones_trabajadores_ss' => 'Acciones Trabajadores Ss',
            'acciones_pendientes_trabajadores_ss' => 'Acciones Pendientes Trabajadores Ss',
            'inversion_trabajadores_ss' => 'Inversion Trabajadores Ss',
            'fecha_inicio_trabajadores_ss' => 'Fecha Inicio Trabajadores Ss',
            'fecha_entrega_trabajadores_ss' => 'Fecha Entrega Trabajadores Ss',
            'fecha_termino_trabajadores_ss' => 'Fecha Termino Trabajadores Ss',
            'programa_trabajadores_ss' => 'Programa Trabajadores Ss',
            'responsable_trabajadores_ss' => 'Responsable Trabajadores Ss',
            'meta_adultos_ss' => 'Meta Adultos Ss',
            'acciones_adultos_ss' => 'Acciones Adultos Ss',
            'acciones_pendientes_adultos_ss' => 'Acciones Pendientes Adultos Ss',
            'inversion_adultos_ss' => 'Inversion Adultos Ss',
            'fecha_inicio_adultos_ss' => 'Fecha Inicio Adultos Ss',
            'fecha_entrega_adultos_ss' => 'Fecha Entrega Adultos Ss',
            'fecha_termino_adultos_ss' => 'Fecha Termino Adultos Ss',
            'programa_adultos_ss' => 'Programa Adultos Ss',
            'responsable_adultos_ss' => 'Responsable Adultos Ss',
            'meta_s_s' => 'Meta S S',
            'acciones_s_s' => 'Acciones S S',
            'acciones_pendientez_s_s' => 'Acciones Pendientes S S',
            'meta_vivienda' => 'Meta Vivienda',
            'acciones_vivienda' => 'Acciones Vivienda',
            'acciones_pendientez_vivienda' => 'Acciones Pendientes Vivienda',
            'inversion_vivienda' => 'Inversion Vivienda',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function getProgramaPiso()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_piso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaSeguroPopular()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_seguro_popular']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma315Escuela()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_3_15_escuela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAntes1982Primaria()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_antes_1982_primaria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDespues1982Secundaria()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_despues_1982_secundaria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDespensas()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_despensas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaSs()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_ss']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaTrabajadoresSs()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_trabajadores_ss']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAdultosSs()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_adultos_ss']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaTecho()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_techo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaMuro()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_muro']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaCuarto()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_cuarto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAguaPotable()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_agua_potable']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaAguaInterior()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_agua_interior']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDrenaje()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_drenaje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaLuz()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_luz']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaEstufa()
    {
        return $this->hasOne(Programas::className(), ['id' => 'programa_estufa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolicitante()
    {
        return $this->hasOne(Solicitantes::className(), ['id' => 'solicitante_id']);
    }
}
