<?php


/**
 * This class adds structure of 'j814t_negocio' table to 'propel' DatabaseMap object.
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
class J814tNegocioMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.J814tNegocioMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(J814tNegocioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(J814tNegocioPeer::TABLE_NAME);
		$tMap->setPhpName('J814tNegocio');
		$tMap->setClassname('J814tNegocio');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('j814t_negocio_co_negocio_seq');

		$tMap->addPrimaryKey('CO_NEGOCIO', 'CoNegocio', 'BIGINT', true, null);

		$tMap->addColumn('TX_NEGOCIO', 'TxNegocio', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_SIGLA', 'TxSigla', 'VARCHAR', false, 255);

	} // doBuild()

} // J814tNegocioMapBuilder
