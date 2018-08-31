<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ficha_necesidades".
 *
 * @property int $id
 * @property int $ficha_id
 * @property int $piso_firme
 * @property int $techo_firme
 * @property int $muro_firme
 * @property int $cuarto_adicional
 * @property int $estufa
 * @property int $agua_potable
 * @property int $drenaje
 * @property int $luz
 * @property int $alumbrado
 * @property int $menor_no_edu_basica
 * @property int $estructuras_escolares
 * @property int $escuelas_acondicionamiento
 * @property int $adulto_no_edu_basica
 * @property int $centros_medicos
 * @property int $personal_medico
 * @property int $medicamento
 * @property int $jornada_de_salud
 * @property int $seguro_popular
 * @property int $trabajador_no_ss
 * @property int $adulto_no_ss
 * @property int $alimentan1o2
 * @property int $menor_desayunos
 * @property int $comedor_comunitario
 * @property int $liconsa
 * @property int $diconsa
 * @property int $basura
 * @property int $tramite
 * @property int $ambulancia
 * @property int $creditos
 * @property int $policia
 * @property int $parques
 * @property int $iglesias
 * @property int $documentos_personales
 * @property int $aparatos_ortopedicos
 * @property int $aparatos_auditivos
 * @property int $lentes
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FichaTecnica $ficha
 */
class FichaNecesidades extends \yii\db\ActiveRecord
{
    const SCENARIO_F = 'FICHA';
    public $scenario = 'web';

    public static function tableName()
    {
        return 'ficha_necesidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        if ($this->scenario == self::SCENARIO_F) {
            return [
                [['ficha_id'], 'required'],
                [['ficha_id', 'piso_firme', 'techo_firme', 'muro_firme', 'cuarto_adicional', 'estufa', 'agua_potable', 'drenaje', 'luz', 'alumbrado', 'menor_no_edu_basica', 'estructuras_escolares', 'escuelas_acondicionamiento', 'adulto_no_edu_basica', 'centros_medicos', 'personal_medico', 'medicamento', 'jornada_de_salud', 'seguro_popular', 'trabajador_no_ss', 'adulto_no_ss', 'alimentan1o2', 'menor_desayunos', 'comedor_comunitario', 'liconsa', 'diconsa', 'basura', 'tramite', 'ambulancia', 'creditos', 'policia', 'parques', 'iglesias', 'documentos_personales', 'aparatos_ortopedicos', 'aparatos_auditivos', 'lentes', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message' => 'Debe ser un valor númerico'],
                [['ficha_id'], 'exist', 'skipOnError' => true, 'targetClass' => FichaTecnica::className(), 'targetAttribute' => ['ficha_id' => 'id']],
            ];
        }
        else{
            return [
                [['ficha_id'], 'required'],
                [['ficha_id', 'piso_firme', 'techo_firme', 'muro_firme', 'cuarto_adicional', 'estufa', 'agua_potable', 'drenaje', 'luz', 'alumbrado', 'menor_no_edu_basica', 'estructuras_escolares', 'escuelas_acondicionamiento', 'adulto_no_edu_basica', 'centros_medicos', 'personal_medico', 'medicamento', 'jornada_de_salud', 'seguro_popular', 'trabajador_no_ss', 'adulto_no_ss', 'alimentan1o2', 'menor_desayunos', 'comedor_comunitario', 'liconsa', 'diconsa', 'basura', 'tramite', 'ambulancia', 'creditos', 'policia', 'parques', 'iglesias', 'documentos_personales', 'aparatos_ortopedicos', 'aparatos_auditivos', 'lentes', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer', 'message' => 'Debe ser un valor númerico'],
                [['ficha_id'], 'exist', 'skipOnError' => true, 'targetClass' => FichaTecnica::className(), 'targetAttribute' => ['ficha_id' => 'id']],
            ];
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ficha_id' => 'Ficha ID',

            'piso_firme' => 'Viviendas que carecen de piso firme',
            'techo_firme' => 'Viviendas que carecen de techo firme',
            'muro_firme' => 'Viviendas que carecen de muro firme',
            'cuarto_adicional' => 'Viviendas que requieren cuarto adicional',
            'estufa' => 'Viviendas que requieren instalación de estufa ecológica',
            'agua_potable' => 'Viviendas que requieren conexión a la red de agua potable',
            'drenaje' => 'Viviendas que requieren conexión al servicio de drenaje',
            'luz' => 'Viviendas que requieren conectarse el servicio de energía eléctrica',
            'alumbrado' => 'Luminarias de alumbrado público que se requieren en la localidad',

            'menor_no_edu_basica' => 'Menores de edad que no han concluido educación básica',
            'estructuras_escolares' => 'Estructuras escolares dañadas que requieran reparación',
            'escuelas_acondicionamiento' => 'Escuelas que requieran acondicionamiento (mobiliario y equipo)',
            'adulto_no_edu_basica' => 'Adultos que no cuentan con educación básica concluida ',

            'centros_medicos' => 'Cantidad de centros de salud o equivalente existentes en la localidad',
            'personal_medico' => 'Cantidad de personal médico que presta servicio en el centro de salud',
            'medicamento' => 'El medicamento del centro de salud es suficiente ',
            'jornada_de_salud' => 'Se requieren Jornadas de Salud ',
            'seguro_popular' => 'Personas que no están inscritas al seguro popular y lo requieren',


            'trabajador_no_ss' => 'Personas que trabajan y no están afiliadas a la seguridad social',
            'adulto_no_ss' => 'Adultos mayores que no están afiliados a la seguridad social',

            'alimentan1o2' => 'Personas que se alimentan una o dos veces al día ',
            'menor_desayunos' => 'Menores de edad que requieren desayunos escolares',
            'comedor_comunitario' => 'Comedores comunitarios que operan en la localidad',
            'liconsa' => 'Lecherías Liconsa con que cuenta la localidad',
            'diconsa' => 'Tiendas Diconsa con que cuenta la localidad',

            'basura' => 'Viviendas que no cuentan con cobertura de servicio público de recolección de basura',
            'tramite' => 'Personas que requieran regularización de cualquier trámite escolar',
            'ambulancia' => 'Ambulancia para traslado de pacientes (cuando se requiera)',
            'creditos' => 'Personas que requieren apoyos como créditos o financiamiento',
            'policia' => 'Personal de seguridad pública que se requiere en la localidad (policías)',
            'parques' => 'Cantidad de espacios recreativos que se requieren (parques, jardines, unidades deportivas)',
            'iglesias' => 'Centros religiosos que requieran reparación',
            'documentos_personales' => 'Personas que requieren tramitar documentos personales (actas de nacimiento o matrimonio, CURP)',
            'aparatos_ortopedicos' => 'Personas que requieren apoyo con aparatos ortopédicos y sillas de ruedas',
            'aparatos_auditivos' => 'Personas que requieren apoyo con aparatos auditivos',
            'lentes' => 'Personas que requieran apoyo con lentes',

            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFicha()
    {
        return $this->hasOne(FichaTecnica::className(), ['id' => 'ficha_id']);
    }
}
