<?php


/**
 * This class adds structure of 'j007t_repositorio_digital' table to 'propel' DatabaseMap object.
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
class J007tRepositorioDigitalMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.J007tRepositorioDigitalMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(J007tRepositorioDigitalPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(J007tRepositorioDigitalPeer::TABLE_NAME);
		$tMap->setPhpName('J007tRepositorioDigital');
		$tMap->setClassname('J007tRepositorioDigital');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('j007t_repositorio_digital_co_repositorio_digital_seq');

		$tMap->addPrimaryKey('CO_REPOSITORIO_DIGITAL', 'CoRepositorioDigital', 'BIGINT', true, null);

		$tMap->addColumn('TX_TITULO', 'TxTitulo', 'VARCHAR', true, 255);

		$tMap->addColumn('TX_DIRECCION_IP', 'TxDireccionIp', 'VARCHAR', false, 255);

		$tMap->addForeignKey('CO_GERENCIA', 'CoGerencia', 'BIGINT', 'j804t_gerencia', 'CO_GERENCIA', true, null);

		$tMap->addForeignKey('CO_CUSTODIO', 'CoCustodio', 'BIGINT', 'j812_persona', 'CO_PERSONA', true, null);

		$tMap->addColumn('TX_OBSERVACIONES', 'TxObservaciones', 'VARCHAR', false, 255);

		$tMap->addColumn('CO_CLASIFICACION', 'CoClasificacion', 'BIGINT', true, null);

		$tMap->addColumn('CO_TRANSACCION', 'CoTransaccion', 'BIGINT', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null);

		$tMap->addColumn('UPDATE_AT', 'UpdateAt', 'TIMESTAMP', true, null);

	} // doBuild()

} // J007tRepositorioDigitalMapBuilder
