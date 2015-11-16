<?php


/**
 * This class adds structure of 'c806t_rel_transaccion_marco_normativo' table to 'propel' DatabaseMap object.
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
class C806tRelTransaccionMarcoNormativoMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.C806tRelTransaccionMarcoNormativoMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(C806tRelTransaccionMarcoNormativoPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(C806tRelTransaccionMarcoNormativoPeer::TABLE_NAME);
		$tMap->setPhpName('C806tRelTransaccionMarcoNormativo');
		$tMap->setClassname('C806tRelTransaccionMarcoNormativo');

		$tMap->setUseIdGenerator(true);

		$tMap->setPrimaryKeyMethodInfo('c806t_rel_transaccion_marco_normativo_co_relacion_seq');

		$tMap->addPrimaryKey('CO_RELACION', 'CoRelacion', 'BIGINT', true, null);

		$tMap->addColumn('CO_TRANSACCION', 'CoTransaccion', 'BIGINT', false, null);

		$tMap->addColumn('CO_MARCO_NORMATIVO', 'CoMarcoNormativo', 'BIGINT', false, null);

	} // doBuild()

} // C806tRelTransaccionMarcoNormativoMapBuilder
