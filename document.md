### Document

***

- リンク

    - [Migration本格運用](https://qiita.com/tentatsu/items/dea6e5864ab150f28da4)

- Phinxlog

    - Migrationsで行き詰ったときはDROP TABLE phinxlogでまっさらな状態で開始できる

- DefaultPasswordHasher

    - レコードをインサートしたときにEntityがハッシュ化を自動でしてくれる

     ```php

        namespace App\Model\Entity;

        use Cake\ORM\Entity;
        use Cake\Auth\DefaultPasswordHasher;

        /**
        * User Entity
        *
        * @property int $user_id
        * @property string $name
        * @property string $email
        * @property string $password
        */
        class User extends Entity
        {

            /**
            * Fields that can be mass assigned using newEntity() or patchEntity().
            *
            * Note that when '*' is set to true, this allows all unspecified fields to
            * be mass assigned. For security purposes, it is advised to set '*' to false
            * (or remove it), and explicitly make individual fields accessible as needed.
            *
            * @var array
            */
            protected $_accessible = [
                '*' => true,
                'id' => false
            ];
            protected $_hidden = [
                'password'
            ];

            protected function _setPassword($password)
            {
                if (strlen($password) > 0) {
                    return (new DefaultPasswordHasher)->hash($password);
                }
            }
        }

     ```

