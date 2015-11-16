<?php

/**
 * Base class that represents a row from the 'c120t_aprobacion_acceso' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Sat Nov 14 07:33:32 2015
 *
 * @package    lib.model.om
 */
abstract class BaseC120tAprobacionAcceso extends BaseObject  implements Persistent {


  const PEER = 'C120tAprobacionAccesoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        C120tAprobacionAccesoPeer
	 */
	protected static $peer;

	/**
	 * The value for the co_aprobacion_acceso field.
	 * @var        string
	 */
	protected $co_aprobacion_acceso;

	/**
	 * The value for the co_region field.
	 * @var        string
	 */
	protected $co_region;

	/**
	 * The value for the co_negocio field.
	 * @var        string
	 */
	protected $co_negocio;

	/**
	 * The value for the co_division field.
	 * @var        string
	 */
	protected $co_division;

	/**
	 * The value for the co_tipo_acceso field.
	 * @var        string
	 */
	protected $co_tipo_acceso;

	/**
	 * The value for the co_perfil_solicitado field.
	 * @var        string
	 */
	protected $co_perfil_solicitado;

	/**
	 * The value for the tx_indicador_solicitante field.
	 * @var        string
	 */
	protected $tx_indicador_solicitante;

	/**
	 * The value for the co_gerencia_solicitante field.
	 * @var        string
	 */
	protected $co_gerencia_solicitante;

	/**
	 * The value for the tx_justificacion field.
	 * @var        string
	 */
	protected $tx_justificacion;

	/**
	 * The value for the tx_gerente_aprobador_solicitante field.
	 * @var        string
	 */
	protected $tx_gerente_aprobador_solicitante;

	/**
	 * The value for the num_caso_siga field.
	 * @var        string
	 */
	protected $num_caso_siga;

	/**
	 * The value for the co_estado_aprobador field.
	 * @var        string
	 */
	protected $co_estado_aprobador;

	/**
	 * The value for the nb_ruta_soporte field.
	 * @var        string
	 */
	protected $nb_ruta_soporte;

	/**
	 * The value for the tx_observacion field.
	 * @var        string
	 */
	protected $tx_observacion;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * Initializes internal state of BaseC120tAprobacionAcceso object.
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
	 * Get the [co_aprobacion_acceso] column value.
	 * 
	 * @return     string
	 */
	public function getCoAprobacionAcceso()
	{
		return $this->co_aprobacion_acceso;
	}

	/**
	 * Get the [co_region] column value.
	 * 
	 * @return     string
	 */
	public function getCoRegion()
	{
		return $this->co_region;
	}

	/**
	 * Get the [co_negocio] column value.
	 * 
	 * @return     string
	 */
	public function getCoNegocio()
	{
		return $this->co_negocio;
	}

	/**
	 * Get the [co_division] column value.
	 * 
	 * @return     string
	 */
	public function getCoDivision()
	{
		return $this->co_division;
	}

	/**
	 * Get the [co_tipo_acceso] column value.
	 * 
	 * @return     string
	 */
	public function getCoTipoAcceso()
	{
		return $this->co_tipo_acceso;
	}

	/**
	 * Get the [co_perfil_solicitado] column value.
	 * 
	 * @return     string
	 */
	public function getCoPerfilSolicitado()
	{
		return $this->co_perfil_solicitado;
	}

	/**
	 * Get the [tx_indicador_solicitante] column value.
	 * 
	 * @return     string
	 */
	public function getTxIndicadorSolicitante()
	{
		return $this->tx_indicador_solicitante;
	}

	/**
	 * Get the [co_gerencia_solicitante] column value.
	 * 
	 * @return     string
	 */
	public function getCoGerenciaSolicitante()
	{
		return $this->co_gerencia_solicitante;
	}

	/**
	 * Get the [tx_justificacion] column value.
	 * 
	 * @return     string
	 */
	public function getTxJustificacion()
	{
		return $this->tx_justificacion;
	}

	/**
	 * Get the [tx_gerente_aprobador_solicitante] column value.
	 * 
	 * @return     string
	 */
	public function getTxGerenteAprobadorSolicitante()
	{
		return $this->tx_gerente_aprobador_solicitante;
	}

	/**
	 * Get the [num_caso_siga] column value.
	 * 
	 * @return     string
	 */
	public function getNumCasoSiga()
	{
		return $this->num_caso_siga;
	}

	/**
	 * Get the [co_estado_aprobador] column value.
	 * 
	 * @return     string
	 */
	public function getCoEstadoAprobador()
	{
		return $this->co_estado_aprobador;
	}

	/**
	 * Get the [nb_ruta_soporte] column value.
	 * 
	 * @return     string
	 */
	public function getNbRutaSoporte()
	{
		return $this->nb_ruta_soporte;
	}

	/**
	 * Get the [tx_observacion] column value.
	 * 
	 * @return     string
	 */
	public function getTxObservacion()
	{
		return $this->tx_observacion;
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of [co_aprobacion_acceso] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoAprobacionAcceso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_aprobacion_acceso !== $v) {
			$this->co_aprobacion_acceso = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_APROBACION_ACCESO;
		}

		return $this;
	} // setCoAprobacionAcceso()

	/**
	 * Set the value of [co_region] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoRegion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_region !== $v) {
			$this->co_region = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_REGION;
		}

		return $this;
	} // setCoRegion()

	/**
	 * Set the value of [co_negocio] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoNegocio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_negocio !== $v) {
			$this->co_negocio = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_NEGOCIO;
		}

		return $this;
	} // setCoNegocio()

	/**
	 * Set the value of [co_division] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoDivision($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_division !== $v) {
			$this->co_division = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_DIVISION;
		}

		return $this;
	} // setCoDivision()

	/**
	 * Set the value of [co_tipo_acceso] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoTipoAcceso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_tipo_acceso !== $v) {
			$this->co_tipo_acceso = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_TIPO_ACCESO;
		}

		return $this;
	} // setCoTipoAcceso()

	/**
	 * Set the value of [co_perfil_solicitado] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoPerfilSolicitado($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_perfil_solicitado !== $v) {
			$this->co_perfil_solicitado = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_PERFIL_SOLICITADO;
		}

		return $this;
	} // setCoPerfilSolicitado()

	/**
	 * Set the value of [tx_indicador_solicitante] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setTxIndicadorSolicitante($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tx_indicador_solicitante !== $v) {
			$this->tx_indicador_solicitante = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::TX_INDICADOR_SOLICITANTE;
		}

		return $this;
	} // setTxIndicadorSolicitante()

	/**
	 * Set the value of [co_gerencia_solicitante] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoGerenciaSolicitante($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_gerencia_solicitante !== $v) {
			$this->co_gerencia_solicitante = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_GERENCIA_SOLICITANTE;
		}

		return $this;
	} // setCoGerenciaSolicitante()

	/**
	 * Set the value of [tx_justificacion] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setTxJustificacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tx_justificacion !== $v) {
			$this->tx_justificacion = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::TX_JUSTIFICACION;
		}

		return $this;
	} // setTxJustificacion()

	/**
	 * Set the value of [tx_gerente_aprobador_solicitante] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setTxGerenteAprobadorSolicitante($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tx_gerente_aprobador_solicitante !== $v) {
			$this->tx_gerente_aprobador_solicitante = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::TX_GERENTE_APROBADOR_SOLICITANTE;
		}

		return $this;
	} // setTxGerenteAprobadorSolicitante()

	/**
	 * Set the value of [num_caso_siga] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setNumCasoSiga($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->num_caso_siga !== $v) {
			$this->num_caso_siga = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::NUM_CASO_SIGA;
		}

		return $this;
	} // setNumCasoSiga()

	/**
	 * Set the value of [co_estado_aprobador] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setCoEstadoAprobador($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->co_estado_aprobador !== $v) {
			$this->co_estado_aprobador = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::CO_ESTADO_APROBADOR;
		}

		return $this;
	} // setCoEstadoAprobador()

	/**
	 * Set the value of [nb_ruta_soporte] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setNbRutaSoporte($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nb_ruta_soporte !== $v) {
			$this->nb_ruta_soporte = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::NB_RUTA_SOPORTE;
		}

		return $this;
	} // setNbRutaSoporte()

	/**
	 * Set the value of [tx_observacion] column.
	 * 
	 * @param      string $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setTxObservacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tx_observacion !== $v) {
			$this->tx_observacion = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::TX_OBSERVACION;
		}

		return $this;
	} // setTxObservacion()

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     C120tAprobacionAcceso The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = C120tAprobacionAccesoPeer::ID;
		}

		return $this;
	} // setId()

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

			$this->co_aprobacion_acceso = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->co_region = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->co_negocio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->co_division = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->co_tipo_acceso = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->co_perfil_solicitado = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->tx_indicador_solicitante = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->co_gerencia_solicitante = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->tx_justificacion = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->tx_gerente_aprobador_solicitante = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->num_caso_siga = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->co_estado_aprobador = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->nb_ruta_soporte = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->tx_observacion = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 15; // 15 = C120tAprobacionAccesoPeer::NUM_COLUMNS - C120tAprobacionAccesoPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating C120tAprobacionAcceso object", $e);
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
			$con = Propel::getConnection(C120tAprobacionAccesoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = C120tAprobacionAccesoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

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

    foreach (sfMixer::getCallables('BaseC120tAprobacionAcceso:delete:pre') as $callable)
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
			$con = Propel::getConnection(C120tAprobacionAccesoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			C120tAprobacionAccesoPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseC120tAprobacionAcceso:delete:post') as $callable)
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

    foreach (sfMixer::getCallables('BaseC120tAprobacionAcceso:save:pre') as $callable)
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
			$con = Propel::getConnection(C120tAprobacionAccesoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseC120tAprobacionAcceso:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			C120tAprobacionAccesoPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = C120tAprobacionAccesoPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = C120tAprobacionAccesoPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += C120tAprobacionAccesoPeer::doUpdate($this, $con);
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


			if (($retval = C120tAprobacionAccesoPeer::doValidate($this, $columns)) !== true) {
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
		$pos = C120tAprobacionAccesoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCoAprobacionAcceso();
				break;
			case 1:
				return $this->getCoRegion();
				break;
			case 2:
				return $this->getCoNegocio();
				break;
			case 3:
				return $this->getCoDivision();
				break;
			case 4:
				return $this->getCoTipoAcceso();
				break;
			case 5:
				return $this->getCoPerfilSolicitado();
				break;
			case 6:
				return $this->getTxIndicadorSolicitante();
				break;
			case 7:
				return $this->getCoGerenciaSolicitante();
				break;
			case 8:
				return $this->getTxJustificacion();
				break;
			case 9:
				return $this->getTxGerenteAprobadorSolicitante();
				break;
			case 10:
				return $this->getNumCasoSiga();
				break;
			case 11:
				return $this->getCoEstadoAprobador();
				break;
			case 12:
				return $this->getNbRutaSoporte();
				break;
			case 13:
				return $this->getTxObservacion();
				break;
			case 14:
				return $this->getId();
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
		$keys = C120tAprobacionAccesoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoAprobacionAcceso(),
			$keys[1] => $this->getCoRegion(),
			$keys[2] => $this->getCoNegocio(),
			$keys[3] => $this->getCoDivision(),
			$keys[4] => $this->getCoTipoAcceso(),
			$keys[5] => $this->getCoPerfilSolicitado(),
			$keys[6] => $this->getTxIndicadorSolicitante(),
			$keys[7] => $this->getCoGerenciaSolicitante(),
			$keys[8] => $this->getTxJustificacion(),
			$keys[9] => $this->getTxGerenteAprobadorSolicitante(),
			$keys[10] => $this->getNumCasoSiga(),
			$keys[11] => $this->getCoEstadoAprobador(),
			$keys[12] => $this->getNbRutaSoporte(),
			$keys[13] => $this->getTxObservacion(),
			$keys[14] => $this->getId(),
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
		$pos = C120tAprobacionAccesoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCoAprobacionAcceso($value);
				break;
			case 1:
				$this->setCoRegion($value);
				break;
			case 2:
				$this->setCoNegocio($value);
				break;
			case 3:
				$this->setCoDivision($value);
				break;
			case 4:
				$this->setCoTipoAcceso($value);
				break;
			case 5:
				$this->setCoPerfilSolicitado($value);
				break;
			case 6:
				$this->setTxIndicadorSolicitante($value);
				break;
			case 7:
				$this->setCoGerenciaSolicitante($value);
				break;
			case 8:
				$this->setTxJustificacion($value);
				break;
			case 9:
				$this->setTxGerenteAprobadorSolicitante($value);
				break;
			case 10:
				$this->setNumCasoSiga($value);
				break;
			case 11:
				$this->setCoEstadoAprobador($value);
				break;
			case 12:
				$this->setNbRutaSoporte($value);
				break;
			case 13:
				$this->setTxObservacion($value);
				break;
			case 14:
				$this->setId($value);
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
		$keys = C120tAprobacionAccesoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoAprobacionAcceso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCoRegion($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCoNegocio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoDivision($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoTipoAcceso($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCoPerfilSolicitado($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTxIndicadorSolicitante($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCoGerenciaSolicitante($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTxJustificacion($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTxGerenteAprobadorSolicitante($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumCasoSiga($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCoEstadoAprobador($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNbRutaSoporte($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTxObservacion($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setId($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(C120tAprobacionAccesoPeer::DATABASE_NAME);

		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_APROBACION_ACCESO)) $criteria->add(C120tAprobacionAccesoPeer::CO_APROBACION_ACCESO, $this->co_aprobacion_acceso);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_REGION)) $criteria->add(C120tAprobacionAccesoPeer::CO_REGION, $this->co_region);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_NEGOCIO)) $criteria->add(C120tAprobacionAccesoPeer::CO_NEGOCIO, $this->co_negocio);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_DIVISION)) $criteria->add(C120tAprobacionAccesoPeer::CO_DIVISION, $this->co_division);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_TIPO_ACCESO)) $criteria->add(C120tAprobacionAccesoPeer::CO_TIPO_ACCESO, $this->co_tipo_acceso);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_PERFIL_SOLICITADO)) $criteria->add(C120tAprobacionAccesoPeer::CO_PERFIL_SOLICITADO, $this->co_perfil_solicitado);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::TX_INDICADOR_SOLICITANTE)) $criteria->add(C120tAprobacionAccesoPeer::TX_INDICADOR_SOLICITANTE, $this->tx_indicador_solicitante);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_GERENCIA_SOLICITANTE)) $criteria->add(C120tAprobacionAccesoPeer::CO_GERENCIA_SOLICITANTE, $this->co_gerencia_solicitante);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::TX_JUSTIFICACION)) $criteria->add(C120tAprobacionAccesoPeer::TX_JUSTIFICACION, $this->tx_justificacion);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::TX_GERENTE_APROBADOR_SOLICITANTE)) $criteria->add(C120tAprobacionAccesoPeer::TX_GERENTE_APROBADOR_SOLICITANTE, $this->tx_gerente_aprobador_solicitante);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::NUM_CASO_SIGA)) $criteria->add(C120tAprobacionAccesoPeer::NUM_CASO_SIGA, $this->num_caso_siga);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::CO_ESTADO_APROBADOR)) $criteria->add(C120tAprobacionAccesoPeer::CO_ESTADO_APROBADOR, $this->co_estado_aprobador);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::NB_RUTA_SOPORTE)) $criteria->add(C120tAprobacionAccesoPeer::NB_RUTA_SOPORTE, $this->nb_ruta_soporte);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::TX_OBSERVACION)) $criteria->add(C120tAprobacionAccesoPeer::TX_OBSERVACION, $this->tx_observacion);
		if ($this->isColumnModified(C120tAprobacionAccesoPeer::ID)) $criteria->add(C120tAprobacionAccesoPeer::ID, $this->id);

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
		$criteria = new Criteria(C120tAprobacionAccesoPeer::DATABASE_NAME);

		$criteria->add(C120tAprobacionAccesoPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of C120tAprobacionAcceso (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setCoRegion($this->co_region);

		$copyObj->setCoNegocio($this->co_negocio);

		$copyObj->setCoDivision($this->co_division);

		$copyObj->setCoTipoAcceso($this->co_tipo_acceso);

		$copyObj->setCoPerfilSolicitado($this->co_perfil_solicitado);

		$copyObj->setTxIndicadorSolicitante($this->tx_indicador_solicitante);

		$copyObj->setCoGerenciaSolicitante($this->co_gerencia_solicitante);

		$copyObj->setTxJustificacion($this->tx_justificacion);

		$copyObj->setTxGerenteAprobadorSolicitante($this->tx_gerente_aprobador_solicitante);

		$copyObj->setNumCasoSiga($this->num_caso_siga);

		$copyObj->setCoEstadoAprobador($this->co_estado_aprobador);

		$copyObj->setNbRutaSoporte($this->nb_ruta_soporte);

		$copyObj->setTxObservacion($this->tx_observacion);


		$copyObj->setNew(true);

		$copyObj->setCoAprobacionAcceso(NULL); // this is a auto-increment column, so set to default value

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

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
	 * @return     C120tAprobacionAcceso Clone of current object.
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
	 * @return     C120tAprobacionAccesoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new C120tAprobacionAccesoPeer();
		}
		return self::$peer;
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

	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseC120tAprobacionAcceso:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseC120tAprobacionAcceso::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} // BaseC120tAprobacionAcceso
