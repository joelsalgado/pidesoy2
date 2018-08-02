<?php

use yii\db\Migration;

/**
 * Class m180517_221549_add_columns_to_seguimiento
 */
class m180517_221549_add_columns_to_seguimiento extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('seguimiento', 'fecha_termino_piso', $this->date()->after('fecha_entrega_piso'));
        $this->addColumn('seguimiento', 'fecha_termino_techo', $this->date()->after('fecha_entrega_techo'));
        $this->addColumn('seguimiento', 'fecha_termino_muro', $this->date()->after('fecha_entrega_muro'));
        $this->addColumn('seguimiento', 'fecha_termino_cuarto', $this->date()->after('fecha_entrega_cuarto'));
        $this->addColumn('seguimiento', 'fecha_termino_agua_potable', $this->date()->after('fecha_entrega_agua_potable'));
        $this->addColumn('seguimiento', 'fecha_termino_agua_interior', $this->date()->after('fecha_entrega_agua_interior'));
        $this->addColumn('seguimiento', 'fecha_termino_drenaje', $this->date()->after('fecha_entrega_drenaje'));
        $this->addColumn('seguimiento', 'fecha_termino_luz', $this->date()->after('fecha_entrega_luz'));
        $this->addColumn('seguimiento', 'fecha_termino_estufa', $this->date()->after('fecha_entrega_estufa'));
        $this->addColumn('seguimiento', 'fecha_termino_seguro_popular', $this->date()->after('fecha_entrega_seguro_popular'));
        $this->addColumn('seguimiento', 'fecha_termino_3_15_escuela', $this->date()->after('fecha_entrega_3_15_escuela'));
        $this->addColumn('seguimiento', 'fecha_termino_antes_1982_primaria', $this->date()->after('fecha_entrega_antes_1982_primaria'));
        $this->addColumn('seguimiento', 'fecha_termino_despues_1982_secundaria', $this->date()->after('fecha_entrega_despues_1982_secundaria'));
        $this->addColumn('seguimiento', 'fecha_termino_despensas', $this->date()->after('fecha_entrega_despensas'));
        $this->addColumn('seguimiento', 'fecha_termino_ss', $this->date()->after('fecha_entrega_ss'));
        $this->addColumn('seguimiento', 'fecha_termino_trabajadores_ss', $this->date()->after('fecha_entrega_trabajadores_ss'));
        $this->addColumn('seguimiento', 'fecha_termino_adultos_ss', $this->date()->after('fecha_entrega_adultos_ss'));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180517_221549_add_columns_to_seguimiento cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180517_221549_add_columns_to_seguimiento cannot be reverted.\n";

        return false;
    }
    */
}
