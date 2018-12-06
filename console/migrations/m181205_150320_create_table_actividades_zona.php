<?php

use yii\db\Migration;

/**
 * Class m181205_150320_create_table_actividades_zona
 */
class m181205_150320_create_table_actividades_zona extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('cat_actividades', [
            'id' => $this->primaryKey(),
            'desc_actividad' => $this->string(150)->notNull(),
            'status' => $this->smallInteger()
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Reunión de trabajo",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Recorrido",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Inicio de obra",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Conclusión de obra",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Evento",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Jornada de Salud",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Entrega de bien(es) materiales",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Curso/Taller",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Aplicación de cédula de detección de necesidades",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Aplicación de censos de priorización",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Entrega de certificado de estudios",
            "status" => 1,
        ]);

        $this->insert("cat_actividades", [
            "desc_actividad" => "Jornada de Limpieza",
            "status" => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m181205_150320_create_table_actividades_zona cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181205_150320_create_table_actividades_zona cannot be reverted.\n";

        return false;
    }
    */
}
