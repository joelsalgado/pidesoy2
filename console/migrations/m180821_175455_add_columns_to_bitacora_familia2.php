<?php

use yii\db\Migration;

/**
 * Class m180821_175455_add_columns_to_bitacora_familia2
 */
class m180821_175455_add_columns_to_bitacora_familia2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('bitacora_familia2', 'actividad_realizar', $this->string()->after('fechas'));
        $this->addColumn('bitacora_familia2', 'nombre_ejecucion', $this->string()->after('actividad_realizar'));
        $this->addColumn('bitacora_familia2', 'nombre_supervisar', $this->string()->after('nombre_ejecucion'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180821_175455_add_columns_to_bitacora_familia2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180821_175455_add_columns_to_bitacora_familia2 cannot be reverted.\n";

        return false;
    }
    */
}
