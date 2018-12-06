<?php

namespace common\models;

use common\models\Apartados;
use Yii;
use yii\behaviors\BlameableBehavior;

class Solicitantes extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'solicitantes';
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }


    public function rules()
    {
        return [
            [['periodo','ent_nac_id','grado_id','red_id', 'entidad_id', 'region_id', 'mun_id', 'loc_id', 'edo_civil_id', 'edad', 'codigo_postal','check',
                'status', 'created_by', 'updated_by'], 'integer', 'message' => 'Debe ser un numero entero'],
            [['region_id', 'mun_id', 'loc_id','nombre', 'apellido_paterno', 'edo_civil_id', 'fecha_nacimiento',
                'sexo', 'calle', 'colonia', 'num_ext', 'codigo_postal',
                'otra_referencia', 'created_at', 'updated_at'], 'required', 'message' => 'Campo requerido'],
            [['fecha_nacimiento', 'created_at', 'updated_at', 'red_social'], 'string'],
            [['nombre', 'apellido_paterno', 'apellido_materno'], 'string', 'max' => 60],
            [['sexo'], 'string', 'max' => 1],
            [['telefono', 'celular'], 'string', 'max' => 15],
            [['curp', 'cve_elector'], 'string', 'max' => 18],
            [['otra_referencia'], 'string', 'max' => 100],
            [['calle','entre_calle','y_calle', 'colonia'], 'string', 'max' => 80],
            [['num_ext', 'num_int'], 'string', 'max' => 40],
            ['otra_referencia', 'validateDuplicados'],
            ['fecha_nacimiento', 'validateFecha'],
            ['curp', 'validateCurp'],
            ['cve_elector', 'validateCve'],
            //[['edo_civil_id'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoCivil::className(), 'targetAttribute' => ['edo_civil_id' => 'id']],
            //[['entidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntidadNacimiento::className(), 'targetAttribute' => ['entidad_id' => 'id']],
            //[['loc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidades::className(), 'targetAttribute' => ['loc_id' => 'localidad_id']],
            //[['mun_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municpios::className(), 'targetAttribute' => ['mun_id' => 'id']],
            //[['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regiones::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['apellido_paterno','apellido_materno', 'nombre'], 'match', 'pattern' => '/^[a-zñÑ\s]+$/i',
                'message' => 'Sólo se aceptan letras sin acentos'],
            [['entre_calle', 'y_calle'], 'match', 'pattern' => '/^[a-zñ0-9#()\s]+$/i',
                'message' => 'Sólo se aceptan letras sin acentos y numéros'],
            //[['fecha_nacimiento'],'date', 'format'=>'yyyy-MM-dd', 'message' => 'Formato no valido'],
            [['curp', 'cve_elector'], 'match', 'pattern' => '/^.{1,18}$/', 'message' => 'Tiene que tener 18 caracteres'],
            [['curp'], 'match', 'pattern' => '/[A-Z]{4}\d{6}[HM][A-Z]{2}[B-DF-HJ-NP-TV-Z]{3}[A-Z0-9][0-9]/', 'message' => 'Formato de CURP invalido'],
            [['cve_elector'], 'match', 'pattern' => '/[A-Z]{6}\d{6}[0-9]{2}[HM][0-9]{3}/', 'message' => 'Formato de clave de Elector incorrecto'],
            [['celular'], 'match', 'pattern' => '/^[0-9SsDd/+\s]+$/i', 'message' => 'Solo se aceptan números'],
            [['codigo_postal'], 'match', 'pattern' => '/^[0-9]{5}/i', 'message' => 'Deben ser 5 digitos'],
            [['codigo_postal'], 'integer', 'max' => 90000,'tooBig' => '{attribute} no debe ser mayor a 9000' ],
            [['curp'], 'unique', 'message' => 'Ya se encuentra un registro con este mismo valor'],
            //['correo','email', 'message' => 'Formato de correo incorrecto'],
        ];
    }


    public function validateCurp()
    {
        $fecha = $this->fecha_nacimiento;
        $curp = $this->curp;
        $sexo = $this->sexo;
        $entFed = EntidadNacimiento::findOne($this->ent_nac_id);
        $ent = $entFed->abrev_ent_nac;

        $fecha_esp = str_replace("-", "", $fecha);
        $dia     = substr($fecha_esp, 6, 2);
        $mes     = substr($fecha_esp, 4, 2);
        $anio     = substr($fecha_esp, 2, 2);

        $fechaCurp = substr($curp, 4, 6);
        $sexoCurp = substr($curp, 10, 1);
        $entCurp = substr($curp, 11, 2);
        $armada = $anio.$mes.$dia;

        if ($fechaCurp != $armada){
            $this->addError('curp', 'El CURP no corrresponde a tu fecha de nacimiento.');
            $this->fechas();
        }

        if ($sexo != $sexoCurp){
            $this->addError('curp', 'El CURP no corrresponde a tu Sexo.');
            $this->fechas();
        }

        if ($ent != $entCurp){
            $this->addError('curp', 'El CURP no corrresponde a tu Entidad de Nacimiento.');
            $this->fechas();
        }
    }

    public function validateCVE()
    {

        $fecha = $this->fecha_nacimiento;
        $cve = $this->cve_elector;
        $sexo = $this->sexo;
        $ent = $this->ent_nac_id;

        $fecha_esp = str_replace("-", "", $fecha);
        $dia     = substr($fecha_esp, 6, 2);
        $mes     = substr($fecha_esp, 4, 2);
        $anio     = substr($fecha_esp, 2, 2);

        $fechaCve = substr($cve, 6, 6);
        $entCve = substr($cve, 12, 2);
        $sexoCve = substr($cve, 14, 1);
        $armada = $anio.$mes.$dia;

        if ($fechaCve != $armada){
            $this->addError('cve_elector', 'Clave de Elector no corrresponde a tu fecha de nacimiento.');
            $this->fechas();
        }

        if ($sexo != $sexoCve){
            $this->addError('cve_elector', 'Clave de Elector no corrresponde a tu Sexo.');
            $this->fechas();
        }

        if ($ent != $entCve){
            $this->addError('cve_elector', 'Clave de Elector no corrresponde a tu Entidad de Nacimiento.');
            $this->fechas();
        }



    }

    public function validateDuplicados(){
        if ($this->isNewRecord) {
            $dup = self::find()->where([
                'apellido_paterno' => $this->apellido_paterno,
                //'created_by' => Yii::$app->user->id
            ])
                ->andWhere(['apellido_materno' => $this->apellido_materno])
                ->andWhere(['nombre' => $this->nombre])
                ->andWhere(['fecha_nacimiento' => $this->fecha_nacimiento])
                ->andWhere(['mun_id' => $this->mun_id])
                ->andWhere(['status' => 1])
                ->all();
            if ($dup) {
                echo "dup";
                $this->addError('otra_referencia', 'Este registro ya se encuentra en base de datos');
                $this->fechas();
            }
        }
    }

    public function validateFecha()
    {
        $fecha = $this->fecha_nacimiento;
        $fecha_esp = str_replace("-", "", $fecha);
        $anio = substr($fecha_esp, 0, 4);
        if ($anio < 1909 || $anio > 2004){
            echo "fecha";
            $this->addError('fecha_nacimiento', 'Fecha de Naciemiento incorrecta');
            $this->fechas();
        }
    }

    public function fechas(){
        $this->fecha_nacimiento = ($this->fecha_nacimiento)? Yii::$app->formatter->asDate($this->fecha_nacimiento, 'dd-MM-yyyy'): null;
        $this->mun_id = ($this->mun_id)? $this->mun_id: null;
        $this->loc_id = ($this->loc_id)? $this->loc_id: null;

    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'periodo' => 'Periodo',
            'entidad_id' => 'Clave de Estado',
            'region_id' => 'Región',
            'mun_id' => 'Clave de Municipio',
            'loc_id' => 'Clave de la Localidad',
            'nombre' => 'Nombre',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'edo_civil_id' => 'Estado Civil',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'grado_id' => 'Grado de Estudios',
            'ent_nac_id' => 'Entidad de Nacimiento',
            'cve_elector' => 'Clave de Elector',
            'curp' => 'CURP',
            'celular' => 'Celular',
            'correo' => 'Correo Electronico',
            'red_id' => 'Tipo de Red Social',
            'red_social' => 'Red Social',
            'entre_calle' => 'Entre Calle',
            'y_calle' => 'Y calle',
            'edad' => 'Edad',
            'sexo' => 'Sexo',
            'telefono' => 'Teléfono',
            'calle' => 'Calle, Avenida, Callejón, Carretera, Camino, Boulervard, Km.',
            'colonia' => 'Colonia, Fraccionamiento, Unidad Habitacional.',
            'num_ext' => 'Número Exteror',
            'num_int' => 'Número Interior',
            'codigo_postal' => 'Código Postal',
            'otra_referencia' => 'Rasgo Físico que ayude a ubicar la vivienda(Tienda, río, edificio, arroyo, árbol u otro).',
            'check' => 'Validado',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getEdoCivil()
    {
        return $this->hasOne(EstadoCivil::className(), ['id' => 'edo_civil_id']);
    }

    public function getEntidad()
    {
        return $this->hasOne(EntidadNacimiento::className(), ['id' => 'entidad_id']);
    }

    public function getLoc()
    {
        return $this->hasOne(Localidades::className(), ['localidad_id' => 'loc_id']);
    }

    public function getMun()
    {
        return $this->hasOne(Municpios::className(), ['id' => 'mun_id']);
    }

    public function getRegion()
    {
        return $this->hasOne(Regiones::className(), ['id' => 'region_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($insert){
            $cedula = new CedulaPobreza();
            $cedula->scenario = 'PARTICIPANTES';

            $cedula->solicitante_id = $this->id;
            $cedula->periodo = $this->periodo;
            $cedula->entidad_id = $this->entidad_id;
            $cedula->region_id = $this->region_id;
            $cedula->region_id = $this->region_id;
            $cedula->mun_id = $this->mun_id;
            $cedula->loc_id = $this->loc_id;
            $cedula->status = 1;
            $cedula->created_at = $this->created_at;
            $cedula->updated_at = $this->updated_at;

            $documentos = new Documentos();
            $documentos->solicitante_id = $this->id;
            $documentos->periodo = $this->periodo;
            $documentos->entidad_id = $this->entidad_id;
            $documentos->region_id = $this->region_id;
            $documentos->region_id = $this->region_id;
            $documentos->mun_id = $this->mun_id;
            $documentos->loc_id = $this->loc_id;
            $documentos->status = 1;
            $documentos->created_at = $this->created_at;
            $documentos->updated_at = $this->updated_at;

            $apartados = new Apartados();
            $apartados->solicitante_id = $this->id;
            $apartados->periodo = $this->periodo;
            $apartados->apartado1 = 1;
            $apartados->created_at = $this->created_at;
            $apartados->updated_at = $this->updated_at;


            if ($cedula->save() && $documentos->save() && $apartados->save()){
                echo "se guardo";
            }else{
                $mal = self::findOne($this->id);
                echo "Error folio".$mal->id; die;
            }
        }


    }
}
