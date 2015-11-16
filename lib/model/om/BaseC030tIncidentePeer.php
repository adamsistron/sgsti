<?php

/**
 * Base static class for performing query and update operations on the 'c030t_incidente' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Thu Oct 29 15:17:29 2015
 *
 * @package    lib.model.om
 */
abstract class BaseC030tIncidentePeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'c030t_incidente';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lib.model.C030tIncidente';

	/** The total number of columns. */
	const NUM_COLUMNS = 27;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the CO_INCIDENTE field */
	const CO_INCIDENTE = 'c030t_incidente.CO_INCIDENTE';

	/** the column name for the FE_APERTURA field */
	const FE_APERTURA = 'c030t_incidente.FE_APERTURA';

	/** the column name for the FE_ESCALADO field */
	const FE_ESCALADO = 'c030t_incidente.FE_ESCALADO';

	/** the column name for the FE_CIERRE field */
	const FE_CIERRE = 'c030t_incidente.FE_CIERRE';

	/** the column name for the CO_USUARIO_APERTURA field */
	const CO_USUARIO_APERTURA = 'c030t_incidente.CO_USUARIO_APERTURA';

	/** the column name for the CO_USUARIO_ESCALA field */
	const CO_USUARIO_ESCALA = 'c030t_incidente.CO_USUARIO_ESCALA';

	/** the column name for the CO_USUARIO_CIERRE field */
	const CO_USUARIO_CIERRE = 'c030t_incidente.CO_USUARIO_CIERRE';

	/** the column name for the CO_REGION field */
	const CO_REGION = 'c030t_incidente.CO_REGION';

	/** the column name for the CO_NEGOCIO field */
	const CO_NEGOCIO = 'c030t_incidente.CO_NEGOCIO';

	/** the column name for the CO_DIVISION field */
	const CO_DIVISION = 'c030t_incidente.CO_DIVISION';

	/** the column name for the TX_SERIAL field */
	const TX_SERIAL = 'c030t_incidente.TX_SERIAL';

	/** the column name for the CO_ESTADO field */
	const CO_ESTADO = 'c030t_incidente.CO_ESTADO';

	/** the column name for the CO_TIPO_INCIDENTE field */
	const CO_TIPO_INCIDENTE = 'c030t_incidente.CO_TIPO_INCIDENTE';

	/** the column name for the CO_TIPO_HECHO field */
	const CO_TIPO_HECHO = 'c030t_incidente.CO_TIPO_HECHO';

	/** the column name for the TX_DESCRIPCION field */
	const TX_DESCRIPCION = 'c030t_incidente.TX_DESCRIPCION';

	/** the column name for the FE_INCIO_HECHO field */
	const FE_INCIO_HECHO = 'c030t_incidente.FE_INCIO_HECHO';

	/** the column name for the FE_FIN_HECHO field */
	const FE_FIN_HECHO = 'c030t_incidente.FE_FIN_HECHO';

	/** the column name for the TX_CAUSA field */
	const TX_CAUSA = 'c030t_incidente.TX_CAUSA';

	/** the column name for the TX_METOLOGIA_HERRAMIENTAS field */
	const TX_METOLOGIA_HERRAMIENTAS = 'c030t_incidente.TX_METOLOGIA_HERRAMIENTAS';

	/** the column name for the TX_OBSERVACIONES field */
	const TX_OBSERVACIONES = 'c030t_incidente.TX_OBSERVACIONES';

	/** the column name for the TX_RUTA field */
	const TX_RUTA = 'c030t_incidente.TX_RUTA';

	/** the column name for the NB_ARCHIVO field */
	const NB_ARCHIVO = 'c030t_incidente.NB_ARCHIVO';

	/** the column name for the CREATED_AT field */
	const CREATED_AT = 'c030t_incidente.CREATED_AT';

	/** the column name for the UPDATE_AT field */
	const UPDATE_AT = 'c030t_incidente.UPDATE_AT';

	/** the column name for the CO_USUARIO_CREATED field */
	const CO_USUARIO_CREATED = 'c030t_incidente.CO_USUARIO_CREATED';

	/** the column name for the CO_USUARIO_UPDATE field */
	const CO_USUARIO_UPDATE = 'c030t_incidente.CO_USUARIO_UPDATE';

	/** the column name for the TX_ACCIONES_TOMADAS field */
	const TX_ACCIONES_TOMADAS = 'c030t_incidente.TX_ACCIONES_TOMADAS';

	/**
	 * An identiy map to hold any loaded instances of C030tIncidente objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array C030tIncidente[]
	 */
	public static $instances = array();

	/**
	 * The MapBuilder instance for this peer.
	 * @var        MapBuilder
	 */
	private static $mapBuilder = null;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('CoIncidente', 'FeApertura', 'FeEscalado', 'FeCierre', 'CoUsuarioApertura', 'CoUsuarioEscala', 'CoUsuarioCierre', 'CoRegion', 'CoNegocio', 'CoDivision', 'TxSerial', 'CoEstado', 'CoTipoIncidente', 'CoTipoHecho', 'TxDescripcion', 'FeIncioHecho', 'FeFinHecho', 'TxCausa', 'TxMetologiaHerramientas', 'TxObservaciones', 'TxRuta', 'NbArchivo', 'CreatedAt', 'UpdateAt', 'CoUsuarioCreated', 'CoUsuarioUpdate', 'TxAccionesTomadas', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('coIncidente', 'feApertura', 'feEscalado', 'feCierre', 'coUsuarioApertura', 'coUsuarioEscala', 'coUsuarioCierre', 'coRegion', 'coNegocio', 'coDivision', 'txSerial', 'coEstado', 'coTipoIncidente', 'coTipoHecho', 'txDescripcion', 'feIncioHecho', 'feFinHecho', 'txCausa', 'txMetologiaHerramientas', 'txObservaciones', 'txRuta', 'nbArchivo', 'createdAt', 'updateAt', 'coUsuarioCreated', 'coUsuarioUpdate', 'txAccionesTomadas', ),
		BasePeer::TYPE_COLNAME => array (self::CO_INCIDENTE, self::FE_APERTURA, self::FE_ESCALADO, self::FE_CIERRE, self::CO_USUARIO_APERTURA, self::CO_USUARIO_ESCALA, self::CO_USUARIO_CIERRE, self::CO_REGION, self::CO_NEGOCIO, self::CO_DIVISION, self::TX_SERIAL, self::CO_ESTADO, self::CO_TIPO_INCIDENTE, self::CO_TIPO_HECHO, self::TX_DESCRIPCION, self::FE_INCIO_HECHO, self::FE_FIN_HECHO, self::TX_CAUSA, self::TX_METOLOGIA_HERRAMIENTAS, self::TX_OBSERVACIONES, self::TX_RUTA, self::NB_ARCHIVO, self::CREATED_AT, self::UPDATE_AT, self::CO_USUARIO_CREATED, self::CO_USUARIO_UPDATE, self::TX_ACCIONES_TOMADAS, ),
		BasePeer::TYPE_FIELDNAME => array ('co_incidente', 'fe_apertura', 'fe_escalado', 'fe_cierre', 'co_usuario_apertura', 'co_usuario_escala', 'co_usuario_cierre', 'co_region', 'co_negocio', 'co_division', 'tx_serial', 'co_estado', 'co_tipo_incidente', 'co_tipo_hecho', 'tx_descripcion', 'fe_incio_hecho', 'fe_fin_hecho', 'tx_causa', 'tx_metologia_herramientas', 'tx_observaciones', 'tx_ruta', 'nb_archivo', 'created_at', 'update_at', 'co_usuario_created', 'co_usuario_update', 'tx_acciones_tomadas', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('CoIncidente' => 0, 'FeApertura' => 1, 'FeEscalado' => 2, 'FeCierre' => 3, 'CoUsuarioApertura' => 4, 'CoUsuarioEscala' => 5, 'CoUsuarioCierre' => 6, 'CoRegion' => 7, 'CoNegocio' => 8, 'CoDivision' => 9, 'TxSerial' => 10, 'CoEstado' => 11, 'CoTipoIncidente' => 12, 'CoTipoHecho' => 13, 'TxDescripcion' => 14, 'FeIncioHecho' => 15, 'FeFinHecho' => 16, 'TxCausa' => 17, 'TxMetologiaHerramientas' => 18, 'TxObservaciones' => 19, 'TxRuta' => 20, 'NbArchivo' => 21, 'CreatedAt' => 22, 'UpdateAt' => 23, 'CoUsuarioCreated' => 24, 'CoUsuarioUpdate' => 25, 'TxAccionesTomadas' => 26, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('coIncidente' => 0, 'feApertura' => 1, 'feEscalado' => 2, 'feCierre' => 3, 'coUsuarioApertura' => 4, 'coUsuarioEscala' => 5, 'coUsuarioCierre' => 6, 'coRegion' => 7, 'coNegocio' => 8, 'coDivision' => 9, 'txSerial' => 10, 'coEstado' => 11, 'coTipoIncidente' => 12, 'coTipoHecho' => 13, 'txDescripcion' => 14, 'feIncioHecho' => 15, 'feFinHecho' => 16, 'txCausa' => 17, 'txMetologiaHerramientas' => 18, 'txObservaciones' => 19, 'txRuta' => 20, 'nbArchivo' => 21, 'createdAt' => 22, 'updateAt' => 23, 'coUsuarioCreated' => 24, 'coUsuarioUpdate' => 25, 'txAccionesTomadas' => 26, ),
		BasePeer::TYPE_COLNAME => array (self::CO_INCIDENTE => 0, self::FE_APERTURA => 1, self::FE_ESCALADO => 2, self::FE_CIERRE => 3, self::CO_USUARIO_APERTURA => 4, self::CO_USUARIO_ESCALA => 5, self::CO_USUARIO_CIERRE => 6, self::CO_REGION => 7, self::CO_NEGOCIO => 8, self::CO_DIVISION => 9, self::TX_SERIAL => 10, self::CO_ESTADO => 11, self::CO_TIPO_INCIDENTE => 12, self::CO_TIPO_HECHO => 13, self::TX_DESCRIPCION => 14, self::FE_INCIO_HECHO => 15, self::FE_FIN_HECHO => 16, self::TX_CAUSA => 17, self::TX_METOLOGIA_HERRAMIENTAS => 18, self::TX_OBSERVACIONES => 19, self::TX_RUTA => 20, self::NB_ARCHIVO => 21, self::CREATED_AT => 22, self::UPDATE_AT => 23, self::CO_USUARIO_CREATED => 24, self::CO_USUARIO_UPDATE => 25, self::TX_ACCIONES_TOMADAS => 26, ),
		BasePeer::TYPE_FIELDNAME => array ('co_incidente' => 0, 'fe_apertura' => 1, 'fe_escalado' => 2, 'fe_cierre' => 3, 'co_usuario_apertura' => 4, 'co_usuario_escala' => 5, 'co_usuario_cierre' => 6, 'co_region' => 7, 'co_negocio' => 8, 'co_division' => 9, 'tx_serial' => 10, 'co_estado' => 11, 'co_tipo_incidente' => 12, 'co_tipo_hecho' => 13, 'tx_descripcion' => 14, 'fe_incio_hecho' => 15, 'fe_fin_hecho' => 16, 'tx_causa' => 17, 'tx_metologia_herramientas' => 18, 'tx_observaciones' => 19, 'tx_ruta' => 20, 'nb_archivo' => 21, 'created_at' => 22, 'update_at' => 23, 'co_usuario_created' => 24, 'co_usuario_update' => 25, 'tx_acciones_tomadas' => 26, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new C030tIncidenteMapBuilder();
		}
		return self::$mapBuilder;
	}
	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. C030tIncidentePeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(C030tIncidentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(C030tIncidentePeer::CO_INCIDENTE);

		$criteria->addSelectColumn(C030tIncidentePeer::FE_APERTURA);

		$criteria->addSelectColumn(C030tIncidentePeer::FE_ESCALADO);

		$criteria->addSelectColumn(C030tIncidentePeer::FE_CIERRE);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_USUARIO_APERTURA);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_USUARIO_ESCALA);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_USUARIO_CIERRE);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_REGION);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_NEGOCIO);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_DIVISION);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_SERIAL);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_ESTADO);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_TIPO_INCIDENTE);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_TIPO_HECHO);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_DESCRIPCION);

		$criteria->addSelectColumn(C030tIncidentePeer::FE_INCIO_HECHO);

		$criteria->addSelectColumn(C030tIncidentePeer::FE_FIN_HECHO);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_CAUSA);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_METOLOGIA_HERRAMIENTAS);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_OBSERVACIONES);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_RUTA);

		$criteria->addSelectColumn(C030tIncidentePeer::NB_ARCHIVO);

		$criteria->addSelectColumn(C030tIncidentePeer::CREATED_AT);

		$criteria->addSelectColumn(C030tIncidentePeer::UPDATE_AT);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_USUARIO_CREATED);

		$criteria->addSelectColumn(C030tIncidentePeer::CO_USUARIO_UPDATE);

		$criteria->addSelectColumn(C030tIncidentePeer::TX_ACCIONES_TOMADAS);

	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(C030tIncidentePeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			C030tIncidentePeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BaseC030tIncidentePeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BaseC030tIncidentePeer', $criteria, $con);
    }


		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     C030tIncidente
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = C030tIncidentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return C030tIncidentePeer::populateObjects(C030tIncidentePeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseC030tIncidentePeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BaseC030tIncidentePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			C030tIncidentePeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      C030tIncidente $value A C030tIncidente object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(C030tIncidente $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getCoIncidente();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A C030tIncidente object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof C030tIncidente) {
				$key = (string) $value->getCoIncidente();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or C030tIncidente object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     C030tIncidente Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = C030tIncidentePeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = C030tIncidentePeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = C030tIncidentePeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				C030tIncidentePeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

  static public function getUniqueColumnNames()
  {
    return array();
  }
	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return C030tIncidentePeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a C030tIncidente or Criteria object.
	 *
	 * @param      mixed $values Criteria or C030tIncidente object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseC030tIncidentePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseC030tIncidentePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from C030tIncidente object
		}

		if ($criteria->containsKey(C030tIncidentePeer::CO_INCIDENTE) && $criteria->keyContainsValue(C030tIncidentePeer::CO_INCIDENTE) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.C030tIncidentePeer::CO_INCIDENTE.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseC030tIncidentePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseC030tIncidentePeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a C030tIncidente or Criteria object.
	 *
	 * @param      mixed $values Criteria or C030tIncidente object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseC030tIncidentePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseC030tIncidentePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(C030tIncidentePeer::CO_INCIDENTE);
			$selectCriteria->add(C030tIncidentePeer::CO_INCIDENTE, $criteria->remove(C030tIncidentePeer::CO_INCIDENTE), $comparison);

		} else { // $values is C030tIncidente object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseC030tIncidentePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseC030tIncidentePeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the c030t_incidente table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(C030tIncidentePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a C030tIncidente or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or C030tIncidente object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			C030tIncidentePeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof C030tIncidente) {
			// invalidate the cache for this single object
			C030tIncidentePeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(C030tIncidentePeer::CO_INCIDENTE, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				C030tIncidentePeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given C030tIncidente object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      C030tIncidente $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(C030tIncidente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(C030tIncidentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(C030tIncidentePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(C030tIncidentePeer::DATABASE_NAME, C030tIncidentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = C030tIncidentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      string $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     C030tIncidente
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = C030tIncidentePeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(C030tIncidentePeer::DATABASE_NAME);
		$criteria->add(C030tIncidentePeer::CO_INCIDENTE, $pk);

		$v = C030tIncidentePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(C030tIncidentePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(C030tIncidentePeer::DATABASE_NAME);
			$criteria->add(C030tIncidentePeer::CO_INCIDENTE, $pks, Criteria::IN);
			$objs = C030tIncidentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseC030tIncidentePeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the C030tIncidentePeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the C030tIncidentePeer class:
//
// Propel::getDatabaseMap(C030tIncidentePeer::DATABASE_NAME)->addTableBuilder(C030tIncidentePeer::TABLE_NAME, C030tIncidentePeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BaseC030tIncidentePeer::DATABASE_NAME)->addTableBuilder(BaseC030tIncidentePeer::TABLE_NAME, BaseC030tIncidentePeer::getMapBuilder());

