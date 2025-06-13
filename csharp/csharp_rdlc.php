  /* va debajo de <AutoRefresh>0</AutoRefresh> */
  <DataSources>
    <DataSource Name="DummyDataSource">
      <ConnectionProperties>
        <DataProvider>SQL</DataProvider>
        <ConnectString>/* Local Connection */</ConnectString>
      </ConnectionProperties>
      <rd:DataSourceID>da8935ff-cb6b-45ed-b543-28f14e961b12</rd:DataSourceID>
    </DataSource>
  </DataSources>
  <DataSets>
    <DataSet Name="ds_<?=$objDatos->tbNombreOriginal?>">
      <Query>
        <DataSourceName>DummyDataSource</DataSourceName>
        <CommandText>/* Local Query */</CommandText>
      </Query>
      <Fields>
<?php 
echo $objDatos->camposRdlc;
?>
</Fields>
      <rd:DataSetInfo>
        <rd:DataSetName>DataSet1</rd:DataSetName>
        <rd:TableName>tb_<?=$objDatos->tbNombreOriginal?></rd:TableName>
      </rd:DataSetInfo>
    </DataSet>
  </DataSets>
