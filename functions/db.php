<?php

// Подключаемся к БД ООП
class DBConnect
{
    private function config() // private
    {
        return include __DIR__ . '/../config.php';
    }
    public function __construct()
    {
        $config = $this->config();
        mysql_connect(
            $config['db']['host'],
            $config['db']['user'],
            $config['db']['password']
        );
        mysql_select_db($config['db']['dbname']);
        // var_dump(mysql_select_db($config['db']['dbname'])); возвращает true
    }
}

// Одна новость
class News_getOne
    extends DBConnect // Наследуем
{
    public function __construct($sql) // Создаём функцию конструктор
    {
        parent::__construct(); // Наследуем  конструктор подключения
        //var_dump($sql); Попадает
        $this->res = mysql_query($sql);
        //var_dump($this->res); //resource(7, mysql result)      Не попадало Так как не подключено было parent::__construct();
        $this->row = mysql_fetch_assoc($this->res);
        //var_dump ($this->row); // Все отлично, данные есть
        return $this->row;
    }
}

// Все новости
class News_getAll
    extends DBConnect
{
    public function __construct($sql) // Создаём функцию конструктор
    {
        parent::__construct(); // Наследуем  конструктор подключения
        $this->res = mysql_query($sql);
        if (!$this->res)
        {
            echo mysql_error();
            return [];
        }
        $this->ret = [];
        while ($this->row = mysql_fetch_assoc($this->res))
        {
            $this->ret[] = $this->row;
        }
        // var_dump($this->ret); // Выводит все
        return $this->ret;
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