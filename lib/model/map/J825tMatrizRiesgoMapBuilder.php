<?php


/**
 * This class adds structure of 'j825t_matriz_riesgo' table to 'propel' DatabaseMap object.
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
class J825tMatrizRiesgoMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.J825tMatrizRiesgoMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(J825tMatrizRiesgoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(J825tMatrizRiesgoPeer::TABLE_NAME);
		$tMap->setPhpName('J825tMatrizRiesgo');
		$tMap->setClassname('J825tMatrizRiesgo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('j825t_matriz_riesgo_co_matriz_riesgo_seq');

		$tMap->addPrimaryKey('CO_MATRIZ_RIESGO', 'CoMatrizRiesgo', 'BIGINT', true, null);

		$tMap->addForeignKey('CO_IMPACTO', 'CoImpacto', 'BIGINT', 'j823t_nivel_impacto', 'CO_NIVEL_IMPACTO', false, null);

		$tMap->addForeignKey('CO_AMENAZA', 'CoAmenaza', 'BIGINT', 'j824t_nivel_amenaza', 'CO_NIVEL_AMENAZA', false, null);

		$tMap->addForeignKey('CO_RIESGO', 'CoRiesgo', 'BIGINT', 'j822t_nivel_riesgo', 'CO_NIVEL_RIESGO', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', true, null);

		$tMap->addColumn('CO_CREATED_AT', 'CoCreatedAt', 'BIGINT', false, null);

		$tMap->addColumn('CO_UPDATED_AT', 'CoUpdatedAt', 'BIGINT', false, null);

	} // doBuild()

} // J825tMatrizRiesgoMapBuilder