<?php
// Функция подключения к БД, где необходимо прописать названия и пароли к БД
function config()
{
    return include __DIR__ . '/../config.php';
}

//Функция подключения к БД,
function DBConnect()
{
    $config = config();
    mysql_connect(
        $config['db']['host'],
        $config['db']['user'],
        $config['db']['password']
    );
    mysql_select_db($config['db']['dbname']);
}

// Запрос к БД
function DBQuery($sql)
{
    DBConnect(); 
    $res = mysql_query($sql);
    if (!$res) {
        echo mysql_error();
        return [];
    }
    // Создаем пустой массив, записываем данные из БД в переменную, передаём данные в массив, возвращаем полученное
    $ret = [];
    while ($row = mysql_fetch_assoc($res))
    {
        $ret[] = $row;
    }
    return $ret;
}

function DBQueryOne($sql){
    DBConnect();
    $res = mysql_query($sql);
    $row = mysql_fetch_assoc($res);
    return $row;
}

/*
    // Возвращайт 1 элемнт массива из БД
 function DbQueryOne($sql) {
 return DbQuery($sql)[0];
}
*/