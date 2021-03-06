<?php


/**
 * This class adds structure of 'c006t_evidencia' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sat Nov 14 07:33:31 2015
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class C006tEvidenciaMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.C006tEvidenciaMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(C006tEvidenciaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(C006tEvidenciaPeer::TABLE_NAME);
		$tMap->setPhpName('C006tEvidencia');
		$tMap->setClassname('C006tEvidencia');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('c006t_evidencia_co_evidencia_seq');

		$tMap->addPrimaryKey('CO_EVIDENCIA', 'CoEvidencia', 'BIGINT', true, null);

		$tMap->addColumn('FE_REGISTRO', 'FeRegistro', 'DATE', false, null);

		$tMap->addForeignKey('CO_REGISTRA', 'CoRegistra', 'BIGINT', 'j811t_usuario', 'CO_USUARIO', true, null);

		$tMap->addForeignKey('CO_ACC', 'CoAcc', 'BIGINT', 'c003t_acta_acc', 'CO_ACC', false, null);

		$tMap->addForeignKey('CO_AIE', 'CoAie', 'BIGINT', 'c004t_acta_aie', 'CO_AIE', false, null);

		$tMap->addColumn('TX_DESCRIPCION_COLECCION', 'TxDescripcionColeccion', 'VARCHAR', false, 255);

		$tMap->addColumn('FE_COLECCION_EVIDENCIA', 'FeColeccionEvidencia', 'DATE', false, null);

		$tMap->addForeignKey('CO_COLECTA', 'CoColecta', 'BIGINT', 'j811t_usuario', 'CO_USUARIO', true, null);

		$tMap->addColumn('CO_RECURSO', 'CoRecurso', 'BIGINT', true, null);

		$tMap->addColumn('TX_NOMBRE_RECURSO', 'TxNombreRecurso', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_SERIAL_RECURSO', 'TxSerialRecurso', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_MARCA_RECURSO', 'TxMarcaRecurso', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_MODELO_RECURSO', 'TxModeloRecurso', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_NUMERO_ACTIVO', 'TxNumeroActivo', 'VARCHAR', false, 255);

		$tMap->addForeignKey('CO_TIPO_EVIDENCIA', 'CoTipoEvidencia', 'BIGINT', 'j002t_tipo_evidencia', 'CO_TIPO_EVIDENCIA', true, null);

		$tMap->addForeignKey('CO_ESTADO_EVIDENCIA', 'CoEstadoEvidencia', 'BIGINT', 'j003t_estado_evidencia', 'CO_ESTADO_EVIDENCIA', true, null);

		$tMap->addColumn('CO_LUGAR_SEGURO', 'CoLugarSeguro', 'BIGINT', false, null);

		$tMap->addColumn('CO_REPOSITORIO', 'CoRepositorio', 'BIGINT', false, null);

		$tMap->addColumn('CO_CUSTODIO_STI', 'CoCustodioSti', 'BIGINT', false, null);

		$tMap->addColumn('TX_OBSERVACIONES', 'TxObservaciones', 'VARCHAR', false, 255);

		$tMap->addColumn('IN_ABIERTA', 'InAbierta', 'BOOLEAN', false, null);

		$tMap->addForeignKey('CO_CLASIFICACION', 'CoClasificacion', 'BIGINT', 'j802t_clasificacion', 'CO_CLASIFICACION', false, null);

		$tMap->addForeignKey('CO_TRANSACCION', 'CoTransaccion', 'BIGINT', 'c801t_transaccion', 'CO_TRANSACCION', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addForeignKey('CO_ENTREGADO_FUERA_STI', 'CoEntregadoFueraSti', 'BIGINT', 'j811t_usuario', 'CO_USUARIO', false, null);

		$tMap->addForeignKey('CO_CUSTODIO', 'CoCustodio', 'BIGINT', 'j812_persona', 'CO_PERSONA', true, null);

		$tMap->addForeignKey('CO_CREATED_AT', 'CoCreatedAt', 'BIGINT', 'j812_persona', 'CO_PERSONA', false, null);

		$tMap->addForeignKey('CO_UPDATED_AT', 'CoUpdatedAt', 'BIGINT', 'j812_persona', 'CO_PERSONA', false, null);

	} // doBuild()

} // C006tEvidenciaMapBuilder
