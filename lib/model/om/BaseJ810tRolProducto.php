<?php

/**
 * Base class that represents a row from the 'j810t_rol_producto' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sat Nov 14 07:33:32 2015
 *
 * @package    lib.model.om
 */
abstract class BaseJ810tRolProducto extends BaseObject  implements Persistent {


  const PEER = 'J810tRolProductoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        J810tRolProductoPeer
	 */
	protected static $peer;

	/**
	 * The value for the co_rol_producto field.
	 * @var        string
	 */
	protected $co_rol_producto;

	/**
	 * The value for the co_rol field.
	 * @var        string
	 */
	protected $co_rol;

	/**
	 * The value for the co_producto field.
	 * @var        string
	 */
	protected $co_producto;

	/**
	 * The value for the in_ver field.
	 * @var        boolean
	 */
	protected $in_ver;

	/**
	 * @var        J809tRol
	 */
	protected $aJ809tRol;

	/**
	 * @var        J808tProducto
	 */
	protected $aJ808tProducto;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Initializes internal state of BaseJ810tRolProducto object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
	}

	/**
	 * Get the [co_rol_producto] column value.
	 * 
	 * @return     string
	 */
	public function getCoRolProducto()
	{
		return $this->co_rol_producto;
	}

	/**
	 * Get the [co_rol] column value.
	 * 
	 * @return     string
	 */
	public function getCoRol()
	{
		return $this->co_rol;
	}

	/**
	 * Get the [co_producto] column value.
	 * 
	 * @return     string
	 */
	public function getCoProducto()
	{
		return $this->co_producto;
	}

	/**
	 * Get the [in_ver] column value.
	 * 
	 * @return     boolean
	 */
	public function getInVer()
	{
		return $this->in_ver;
	}

	/**
	 * Set the value of [co_rol_producto] column.
	 * 
	 * @param      string $v new value
	 * @return     J810tRolProducto The current object (for fluent API support)
	 */
	public function setCoRolProducto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_rol_producto !== $v) {
			$this->co_rol_producto = $v;
			$this->modifiedColumns[] = J810tRolProductoPeer::CO_ROL_PRODUCTO;
		}

		return $this;
	} // setCoRolProducto()

	/**
	 * Set the value of [co_rol] column.
	 * 
	 * @param      string $v new value
	 * @return     J810tRolProducto The current object (for fluent API support)
	 */
	public function setCoRol($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_rol !== $v) {
			$this->co_rol = $v;
			$this->modifiedColumns[] = J810tRolProductoPeer::CO_ROL;
		}

		if ($this->aJ809tRol !== null && $this->aJ809tRol->getCoRol() !== $v) {
			$this->aJ809tRol = null;
		}

		return $this;
	} // setCoRol()

	/**
	 * Set the value of [co_producto] column.
	 * 
	 * @param      string $v new value
	 * @return     J810tRolProducto The current object (for fluent API support)
	 */
	public function setCoProducto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_producto !== $v) {
			$this->co_producto = $v;
			$this->modifiedColumns[] = J810tRolProductoPeer::CO_PRODUCTO;
		}

		if ($this->aJ808tProducto !== null && $this->aJ808tProducto->getCoProducto() !== $v) {
			$this->aJ808tProducto = null;
		}

		return $this;
	} // setCoProducto()

	/**
	 * Set the value of [in_ver] column.
	 * 
	 * @param      boolean $v new value
	 * @return     J810tRolProducto The current object (for fluent API support)
	 */
	public function setInVer($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->in_ver !== $v) {
			$this->in_ver = $v;
			$this->modifiedColumns[] = J810tRolProductoPeer::IN_VER;
		}

		return $this;
	} // setInVer()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			// First, ensure that we don't have any columns that have been modified which aren't default columns.
			if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->co_rol_producto = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->co_rol = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->co_producto = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->in_ver = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = J810tRolProductoPeer::NUM_COLUMNS - J810tRolProductoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating J810tRolProducto object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aJ809tRol !== null && $this->co_rol !== $this->aJ809tRol->getCoRol()) {
			$this->aJ809tRol = null;
		}
		if ($this->aJ808tProducto !== null && $this->co_producto !== $this->aJ808tProducto->getCoProducto()) {
			$this->aJ808tProducto = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(J810tRolProductoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = J810tRolProductoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aJ809tRol = null;
			$this->aJ808tProducto = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseJ810tRolProducto:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(J810tRolProductoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			J810tRolProductoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseJ810tRolProducto:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BaseJ810tRolProducto:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(J810tRolProductoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseJ810tRolProducto:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			J810tRolProductoPeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aJ809tRol !== null) {
				if ($this->aJ809tRol->isModified() || $this->aJ809tRol->isNew()) {
					$affectedRows += $this->aJ809tRol->save($con);
				}
				$this->setJ809tRol($this->aJ809tRol);
			}

			if ($this->aJ808tProducto !== null) {
				if ($this->aJ808tProducto->isModified() || $this->aJ808tProducto->isNew()) {
					$affectedRows += $this->aJ808tProducto->save($con);
				}
				$this->setJ808tProducto($this->aJ808tProducto);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = J810tRolProductoPeer::CO_ROL_PRODUCTO;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = J810tRolProductoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setCoRolProducto($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += J810tRolProductoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aJ809tRol !== null) {
				if (!$this->aJ809tRol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJ809tRol->getValidationFailures());
				}
			}

			if ($this->aJ808tProducto !== null) {
				if (!$this->aJ808tProducto->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJ808tProducto->getValidationFailures());
				}
			}


			if (($retval = J810tRolProductoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = J810tRolProductoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoRolProducto();
				break;
			case 1:
				return $this->getCoRol();
				break;
			case 2:
				return $this->getCoProducto();
				break;
			case 3:
				return $this->getInVer();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = J810tRolProductoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoRolProducto(),
			$keys[1] => $this->getCoRol(),
			$keys[2] => $this->getCoProducto(),
			$keys[3] => $this->getInVer(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = J810tRolProductoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoRolProducto($value);
				break;
			case 1:
				$this->setCoRol($value);
				break;
			case 2:
				$this->setCoProducto($value);
				break;
			case 3:
				$this->setInVer($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = J810tRolProductoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoRolProducto($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCoRol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoProducto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setInVer($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(J810tRolProductoPeer::DATABASE_NAME);

		if ($this->isColumnModified(J810tRolProductoPeer::CO_ROL_PRODUCTO)) $criteria->add(J810tRolProductoPeer::CO_ROL_PRODUCTO, $this->co_rol_producto);
		if ($this->isColumnModified(J810tRolProductoPeer::CO_ROL)) $criteria->add(J810tRolProductoPeer::CO_ROL, $this->co_rol);
		if ($this->isColumnModified(J810tRolProductoPeer::CO_PRODUCTO)) $criteria->add(J810tRolProductoPeer::CO_PRODUCTO, $this->co_producto);
		if ($this->isColumnModified(J810tRolProductoPeer::IN_VER)) $criteria->add(J810tRolProductoPeer::IN_VER, $this->in_ver);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(J810tRolProductoPeer::DATABASE_NAME);

		$criteria->add(J810tRolProductoPeer::CO_ROL_PRODUCTO, $this->co_rol_producto);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getCoRolProducto();
	}

	/**
	 * Generic method to set the primary key (co_rol_producto column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setCoRolProducto($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of J810tRolProducto (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCoRol($this->co_rol);

		$copyObj->setCoProducto($this->co_producto);

		$copyObj->setInVer($this->in_ver);


		$copyObj->setNew(true);

		$copyObj->setCoRolProducto(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     J810tRolProducto Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     J810tRolProductoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new J810tRolProductoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a J809tRol object.
	 *
	 * @param      J809tRol $v
	 * @return     J810tRolProducto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setJ809tRol(J809tRol $v = null)
	{
		if ($v === null) {
			$this->setCoRol(NULL);
		} else {
			$this->setCoRol($v->getCoRol());
		}

		$this->aJ809tRol = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the J809tRol object, it will not be re-added.
		if ($v !== null) {
			$v->addJ810tRolProducto($this);
		}

		return $this;
	}


	/**
	 * Get the associated J809tRol object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     J809tRol The associated J809tRol object.
	 * @throws     PropelException
	 */
	public function getJ809tRol(PropelPDO $con = null)
	{
		if ($this->aJ809tRol === null && (($this->co_rol !== "" && $this->co_rol !== null))) {
			$c = new Criteria(J809tRolPeer::DATABASE_NAME);
			$c->add(J809tRolPeer::CO_ROL, $this->co_rol);
			$this->aJ809tRol = J809tRolPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aJ809tRol->addJ810tRolProductos($this);
			 */
		}
		return $this->aJ809tRol;
	}

	/**
	 * Declares an association between this object and a J808tProducto object.
	 *
	 * @param      J808tProducto $v
	 * @return     J810tRolProducto The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setJ808tProducto(J808tProducto $v = null)
	{
		if ($v === null) {
			$this->setCoProducto(NULL);
		} else {
			$this->setCoProducto($v->getCoProducto());
		}

		$this->aJ808tProducto = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the J808tProducto object, it will not be re-added.
		if ($v !== null) {
			$v->addJ810tRolProducto($this);
		}

		return $this;
	}


	/**
	 * Get the associated J808tProducto object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     J808tProducto The associated J808tProducto object.
	 * @throws     PropelException
	 */
	public function getJ808tProducto(PropelPDO $con = null)
	{
		if ($this->aJ808tProducto === null && (($this->co_producto !== "" && $this->co_producto !== null))) {
			$c = new Criteria(J808tProductoPeer::DATABASE_NAME);
			$c->add(J808tProductoPeer::CO_PRODUCTO, $this->co_producto);
			$this->aJ808tProducto = J808tProductoPeer::doSelectOne($c, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aJ808tProducto->addJ810tRolProductos($this);
			 */
		}
		return $this->aJ808tProducto;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

			$this->aJ809tRol = null;
			$this->aJ808tProducto = null;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseJ810tRolProducto:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseJ810tRolProducto::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseJ810tRolProducto
