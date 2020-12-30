<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biodata".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $provinsi
 * @property string|null $kabupaten
 * @property string|null $nik
 * @property string|null $nama
 * @property string|null $tempatlahir
 * @property string|null $tanggallahir
 * @property string|null $jkelamin
 * @property string|null $alamat
 * @property string|null $agama
 * @property string|null $statuskawin
 * @property string|null $pekerjaan
 */
class Biodata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biodata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggallahir'], 'safe'],
            [['username', 'provinsi', 'kabupaten', 'tempatlahir'], 'string', 'max' => 50],
            [['nik'], 'string', 'max' => 16],
            [['nama', 'alamat', 'pekerjaan'], 'string', 'max' => 255],
            [['jkelamin', 'agama', 'statuskawin'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'provinsi' => 'Provinsi',
            'kabupaten' => 'Kabupaten',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'tempatlahir' => 'Tempatlahir',
            'tanggallahir' => 'Tanggallahir',
            'jkelamin' => 'Jkelamin',
            'alamat' => 'Alamat',
            'agama' => 'Agama',
            'statuskawin' => 'Statuskawin',
            'pekerjaan' => 'Pekerjaan',
        ];
    }
}
