### Document

***

- アカウント検索を行う

- DB -> Postgres

```shell

    psql -U _role

```

- Configuration

```shell

    cd bin

    cake migrations migrate

    cake migrations seed

    cake server

```

- DB欄の表示確認

- Table

    - Users

        |Title|Type|Description|
        |:---|:---|:---|
        |user_id|int|idとは別で作ります|
        |name|VARCHAR||
        |email|VARCHAR||
        |password|VARCHAR||

    - Posts

        |Title|Type|Description|
        |:---|:---|:---|
        |user_id|int|Users INNER JOINします|
        |title|VARCHAR||
        |content|VARCHAR(20000)|念のため上限を高くします|

- Controller

    - UsersController

        - 表示に徹します。

        - 使用する関数はindex,login,view_content,resultのみとします。

    - SeatchController

        - 入力された文字列を返すコントローラーです。

        - Seatchで検索をして結果を変数にしてUsersコントローラに渡します。

        - 使用する関数はresultのみです。

- Bake

```shell

    cake bake all users

    cake bake model Posts

```