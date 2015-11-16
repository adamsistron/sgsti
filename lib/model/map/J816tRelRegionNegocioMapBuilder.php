<?php


/**
 * This class adds structure of 'j816t_rel_region_negocio' table to 'propel' DatabaseMap object.
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
class J816tRelRegionNegocioMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.J816tRelRegionNegocioMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(J816tRelRegionNegocioPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(J816tRelRegionNegocioPeer::TABLE_NAME);
		$tMap->setPhpName('J816tRelRegionNegocio');
		$tMap->setClassname('J816tRelRegionNegocio');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('j816t_rel_region_negocio_co_relacion_seq');

		$tMap->addPrimaryKey('CO_RELACION', 'CoRelacion', 'BIGINT', true, null);

		$tMap->addForeignKey('CO_REGION', 'CoRegion', 'BIGINT', 'j813t_region', 'CO_REGION', true, null);

		$tMap->addForeignKey('CO_NEGOCIO', 'CoNegocio', 'BIGINT', 'j814t_negocio', 'CO_NEGOCIO', true, null);

		$tMap->addForeignKey('CO_DIVISION', 'CoDivision', 'BIGINT', 'j815t_division', 'CO_DIVISION', false, null);

	} // doBuild()

} // J816tRelRegionNegocioMapBuilder