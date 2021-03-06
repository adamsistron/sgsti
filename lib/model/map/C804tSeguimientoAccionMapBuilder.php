<?php


/**
 * This class adds structure of 'c804t_seguimiento_accion' table to 'propel' DatabaseMap object.
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
class C804tSeguimientoAccionMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.C804tSeguimientoAccionMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(C804tSeguimientoAccionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(C804tSeguimientoAccionPeer::TABLE_NAME);
		$tMap->setPhpName('C804tSeguimientoAccion');
		$tMap->setClassname('C804tSeguimientoAccion');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('c804t_seguimiento_accion_co_seguimiento_accion_seq');

		$tMap->addColumn('CO_SEGUIMIENTO_ACCION', 'CoSeguimientoAccion', 'BIGINT', true, null);

		$tMap->addColumn('CO_ACCION', 'CoAccion', 'BIGINT', false, null);

		$tMap->addColumn('CO_ESTADO_ACCION', 'CoEstadoAccion', 'BIGINT', false, null);

		$tMap->addColumn('CO_RESPONSABLE_STI', 'CoResponsableSti', 'BIGINT', false, null);

		$tMap->addColumn('CO_RESPONSABLE_EJECUTAR', 'CoResponsableEjecutar', 'BIGINT', false, null);

		$tMap->addColumn('CO_GERENCIA_RESPONSABLE', 'CoGerenciaResponsable', 'BIGINT', false, null);

		$tMap->addColumn('FE_PLANIFICADA_EJECUTAR', 'FePlanificadaEjecutar', 'DATE', false, null);

		$tMap->addColumn('FE_SEGUIMIENTO_STI', 'FeSeguimientoSti', 'DATE', false, null);

		$tMap->addColumn('TX_RESPUESTA_RESPONSABLE', 'TxRespuestaResponsable', 'LONGVARCHAR', false, null);

		$tMap->addColumn('TX_OBSERVACIONES', 'TxObservaciones', 'VARCHAR', false, 255);

		$tMap->addColumn('NB_ARCHIVO_EVIDENCIA', 'NbArchivoEvidencia', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_RUTA_EVIDENCIA', 'TxRutaEvidencia', 'VARCHAR', false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('CO_CREATED_AT', 'CoCreatedAt', 'BIGINT', false, null);

		$tMap->addColumn('CO_UPDATED_AT', 'CoUpdatedAt', 'BIGINT', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // C804tSeguimientoAccionMapBuilder
