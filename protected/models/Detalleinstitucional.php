<?php

/**
 * This is the model class for table "detalleinstitucional".
 *
 * The followings are the available columns in table 'detalleinstitucional':
 * @property integer $idDI
 * @property integer $idFilial
 * @property string $nivel
 * @property string $grado
 * @property integer $idAnio
 * @property integer $numerosecciones
 *
 * The followings are the available model relations:
 * @property CursoGrado[] $cursoGrados
 */
class Detalleinstitucional extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalleinstitucional';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idFilial, idAnio, numerosecciones', 'numerical', 'integerOnly'=>true),
			array('nivel, grado', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idDI, idFilial, nivel, grado, idAnio, numerosecciones', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cursoGrados' => array(self::HAS_MANY, 'CursoGrado', 'idDI'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDI' => 'Id Di',
			'idFilial' => 'Id Filial',
			'nivel' => 'Nivel',
			'grado' => 'Grado',
			'idAnio' => 'Id Anio',
			'numerosecciones' => 'Numerosecciones',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idDI',$this->idDI);
		$criteria->compare('idFilial',$this->idFilial);
		$criteria->compare('nivel',$this->nivel,true);
		$criteria->compare('grado',$this->grado,true);
		$criteria->compare('idAnio',$this->idAnio);
		$criteria->compare('numerosecciones',$this->numerosecciones);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detalleinstitucional the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
