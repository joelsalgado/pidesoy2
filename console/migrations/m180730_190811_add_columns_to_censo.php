<?php

use yii\db\Migration;

/**
 * Class m180730_190811_add_columns_to_censo
 */
class m180730_190811_add_columns_to_censo extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('censo', 'nombre', $this->string(60)->after('fecha'));
        $this->addColumn('censo', 'apellido_paterno',  $this->string(60)->after('nombre'));
        $this->addColumn('censo', 'apellido_materno',  $this->string(60)->after('apellido_paterno'));
        $this->addColumn('censo', 'edo_civil_id', $this->integer()->after('apellido_materno'));
        $this->addColumn('censo', 'fecha_nacimiento', $this->date()->after('edo_civil_id'));
        $this->addColumn('censo', 'sexo', $this->string(1)->after('fecha_nacimiento'));
        $this->addColumn('censo', 'telefono', $this->string(15)->after('sexo'));

        $this->addForeignKey(
            'fk-censo-edo-civil',
            'censo',
            'edo_civil_id',
            'cat_estado_civil',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180730_190811_add_columns_to_censo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180730_190811_add_columns_to_censo cannot be reverted.\n";

        return false;
    }
    */
}
