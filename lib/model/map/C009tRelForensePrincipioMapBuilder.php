<?php


/**
 * This class adds structure of 'c009t_rel_forense_principio' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Mon Nov  9 16:17:36 2015
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class C009tRelForensePrincipioMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.C009tRelForensePrincipioMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(C009tRelForensePrincipioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(C009tRelForensePrincipioPeer::TABLE_NAME);
		$tMap->setPhpName('C009tRelForensePrincipio');
		$tMap->setClassname('C009tRelForensePrincipio');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('c009t_rel_forense_principio_co_relacion_seq');

		$tMap->addPrimaryKey('CO_RELACION', 'CoRelacion', 'BIGINT', true, null);

		$tMap->addForeignKey('CO_INFORME_FORENSE', 'CoInformeForense', 'BIGINT', 'c002t_informe_forense', 'CO_INFORME_FORENSE', false, null);

		$tMap->addForeignKey('CO_PRINCIPIO', 'CoPrincipio', 'BIGINT', 'j801t_principio', 'CO_PRINCIPIO', false, null);

	} // doBuild()

} // C009tRelForensePrincipioMapBuilder