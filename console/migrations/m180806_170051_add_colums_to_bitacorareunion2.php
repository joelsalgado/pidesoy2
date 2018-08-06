<?php

use yii\db\Migration;

/**
 * Class m180806_170051_add_colums_to_bitacorareunion2
 */
class m180806_170051_add_colums_to_bitacorareunion2 extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('bitacora_reunion2', 'actividad_realizar', $this->string()->after('fechas'));
        $this->addColumn('bitacora_reunion2', 'nombre_ejecucion', $this->string()->after('actividad_realizar'));
        $this->addColumn('bitacora_reunion2', 'nombre_supervisar', $this->string()->after('nombre_ejecucion'));
        $this->addColumn('bitacora_reunion2', 'cumplio', $this->smallInteger()->after('nombre_supervisar'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180806_170051_add_colums_to_bitacorareunion2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180806_170051_add_colums_to_bitacorareunion2 cannot be reverted.\n";

        return false;
    }
    */
}
