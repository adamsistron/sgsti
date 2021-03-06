<?php


/**
 * This class adds structure of 'c200t_evaluacion' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sat Nov 14 07:33:32 2015
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class C200tEvaluacionMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.C200tEvaluacionMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(C200tEvaluacionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(C200tEvaluacionPeer::TABLE_NAME);
		$tMap->setPhpName('C200tEvaluacion');
		$tMap->setClassname('C200tEvaluacion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('c200t_evaluacion_co_evaluacion_seq');

		$tMap->addColumn('CO_EVALUACION', 'CoEvaluacion', 'BIGINT', true, null);

		$tMap->addColumn('CO_REGION', 'CoRegion', 'BIGINT', false, null);

		$tMap->addColumn('CO_NEGOCIO', 'CoNegocio', 'BIGINT', false, null);

		$tMap->addColumn('CO_DIVISION', 'CoDivision', 'BIGINT', false, null);

		$tMap->addColumn('TX_SERIAL', 'TxSerial', 'VARCHAR', false, 255);

		$tMap->addColumn('CO_GERENCIA_SOLICITANTE', 'CoGerenciaSolicitante', 'BIGINT', false, null);

		$tMap->addColumn('CO_PERSONA_SOLICITANTE', 'CoPersonaSolicitante', 'BIGINT', false, null);

		$tMap->addColumn('CO_CLASIFICACION', 'CoClasificacion', 'BIGINT', false, null);

		$tMap->addColumn('TX_OBSERVACIONES', 'TxObservaciones', 'VARCHAR', false, 255);

		$tMap->addColumn('CO_TRANSACCION', 'CoTransaccion', 'BIGINT', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // C200tEvaluacionMapBuilder
