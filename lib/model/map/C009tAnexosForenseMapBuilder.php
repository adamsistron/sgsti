<?php


/**
 * This class adds structure of 'c009t_anexos_forense' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Thu Oct  1 16:04:45 2015
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class C009tAnexosForenseMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.C009tAnexosForenseMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(C009tAnexosForensePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(C009tAnexosForensePeer::TABLE_NAME);
		$tMap->setPhpName('C009tAnexosForense');
		$tMap->setClassname('C009tAnexosForense');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('c009t_anexos_forense_co_anexos_forense_seq');

		$tMap->addColumn('CO_ANEXOS_FORENSE', 'CoAnexosForense', 'BIGINT', true, null);

		$tMap->addColumn('TX_TITULO', 'TxTitulo', 'VARCHAR', false, 255);

		$tMap->addColumn('TX_DESCRIPCION', 'TxDescripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('NB_ARCHIVO', 'NbArchivo', 'VARCHAR', false, 255);

		$tMap->addColumn('CO_CLASIFICACION', 'CoClasificacion', 'BIGINT', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

	} // doBuild()

} // C009tAnexosForenseMapBuilder
