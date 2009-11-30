<?php



class FreepageMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'plugins.opFreepagePlugin.lib.model.map.FreepageMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(FreepagePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(FreepagePeer::TABLE_NAME);
		$tMap->setPhpName('Freepage');
		$tMap->setClassname('Freepage');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('TITLE', 'Title', 'LONGVARCHAR', false, null);

		$tMap->addColumn('BODY', 'Body', 'LONGVARCHAR', false, null);

		$tMap->addColumn('APP_TYPE', 'AppType', 'VARCHAR', true, 16);

		$tMap->addColumn('AUTH', 'Auth', 'TINYINT', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

	} 
} 