<?php

// Подключаемся к БД ООП
class DBConnect
{
    // Подключение к файлу
    private function config()
    {
        return include __DIR__ . '/../config.php';
    }
    // Подключение к БД
    public function __construct()
    {
        $config = $this->config();
        $link = mysql_connect(
            $config['db']['host'],
            $config['db']['user'],
            $config['db']['password']
        );
        if (!$link)
        {
            die('Could not connect: ' . mysql_error());
        }
        if(!mysql_select_db($config['db']['dbname']))
        {
            die('Could not select db: ' . mysql_error());
        }
    }
    // Возвращает все
    public function DBQuery($sql) {
        $res = mysql_query($sql);
        if (!$res) {
            echo mysql_error();
            return [];
        }
        $ret = [];
        while ($row = mysql_fetch_assoc($res))
        {
            $ret[] = $row;
        }
        return $ret;
    }
    // Возвращает одну новость
    public function DBQueryOne($sql) {
        return $this->DBQuery($sql)[0];
    }
    // Для записи в БД
    public function DBExec($sql)
    {
        $res = mysql_query($sql);
        if (false === $res) {
            return false;
        }
        else {
            return true;
        }
    }

}








// БЕЗ ООП

// Функция подключения к БД, где необходимо прописать названия и пароли к БД

/*
function config()
{
    return include __DIR__ . '/../config.php';
}

//Функция подключения к БД,
function DBConnect()
{
    $config = config();           // Создаем переменную куда помещаем '../config.php' config() - функция выше с возвращеннием файла
    mysql_connect(                // Подключаемся
        $config['db']['host'],    // db - массив из конфигурационного файла подключенного выше
        $config['db']['user'],
        $config['db']['password']
    );
    // Выбираем БД
    mysql_select_db($config['db']['dbname']);
}



    // Запрос к БД
function DBQuery($sql)
{
    DBConnect(); // соединение с БД
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
var_dump(DBQuery($sql));



    // Возвращайт 1 элемнт массива из БД
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