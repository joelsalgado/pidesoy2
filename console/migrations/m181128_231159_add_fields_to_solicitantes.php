<?php

use yii\db\Migration;

/**
 * Class m181128_231159_add_fields_to_solicitantes
 */
class m181128_231159_add_fields_to_solicitantes extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('solicitantes', 'grado_id', $this->integer()->after('fecha_nacimiento'));
        $this->addColumn('solicitantes', 'ent_nac_id', $this->integer()->after('grado_id'));
        $this->addColumn('solicitantes', 'cve_elector', $this->string(18)->after('ent_nac_id'));
        $this->addColumn('solicitantes', 'curp', $this->string(18)->after('cve_elector'));
        $this->addColumn('solicitantes', 'entre_calle', $this->string()->after('calle'));
        $this->addColumn('solicitantes', 'y_calle', $this->string()->after('entre_calle'));
        $this->addColumn('solicitantes', 'celular', $this->string()->after('telefono'));
        $this->addColumn('solicitantes', 'correo', $this->string()->after('celular'));


        $this->addForeignKey(
            'fk-grado-solicitante',
            'solicitantes',
            'grado_id',
            'cat_grado_estudios',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m181128_231159_add_fields_to_solicitantes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181128_231159_add_fields_to_solicitantes cannot be reverted.\n";

        return false;
    }
    */
}
