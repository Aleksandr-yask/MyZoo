<?php
/* -------------------------------------
Main

-------------------------------------*/

namespace application\models;

use application\core\Model;

class Main extends Model
{
    /**
     * Удаляет строку из таблицы
     * на входе POST - array
     * table - str
     * id - int
     */
    public function deleteSomthing() {
        $a = $this->db->query('DELETE FROM '.$_POST['table'].' WHERE '.$_POST['idName'].'=:id', ['id' => $_POST['id']]);
        return $a;
    }

    /**
     * Получает из бд список животных
     * @return array список животных
     */
    public function getAnimals() {
        $a = $this->db->row('SELECT * FROM animals LEFT JOIN animals_type ON animals.type_id = animals_type.id_type ORDER BY animals.id');
        return $a;
    }

    /**
     * Возвращает список типов животных
     * @return array
     */
    public function getAnimals_types() {
        $a = $this->db->row('select * from animals_type');
        return $a;
    }

    /**
     * Добавляет животное
     * на входе POST - array
     * name - string
     * type - int
     * age - int
     * sex - int
     * @return bool
     */
    public function addAnimal() {
        return $this->db->query('insert into animals values (:id, :name, :type_id, :age, :sex)',
            ['id' => '', 'name' => $_POST['name'], 'type_id' => $_POST['type_id'], 'age' => $_POST['age'], 'sex' => $_POST['sex']]);
    }

    /**
     * Меняет данные в таблице
     * на входе POST со всеми данным таблицы
     */
    public function updateAnimal() {
        return $this->db->query('UPDATE animals SET name=:name,type_id=:type_id,age=:age,sex=:sex WHERE id = :id',
            ['name' => $_POST['name'], 'type_id'=>$_POST['type_id'], 'age' => $_POST['age'], 'sex' => $_POST['sex'], 'id' => $_POST['id']]);
    }

    /**
     * Добавляет тип животного
     * на входе POST - array
     * name - string
     * @return bool
     */
    public function addAnimalType() {
        return $this->db->query('insert into animals_type values (:id, :name)',
            ['id' => '', 'name' => $_POST['name']]);
    }

    /**
     * Меняет данные в таблице
     * на входе POST со всеми данным таблицы
     */
    public function updateAnimalType() {
        return $this->db->query('UPDATE animals_type SET name_type=:name WHERE id_type=:id',
            ['name' => $_POST['name'], 'id' => $_POST['id']]);
    }

    /**
     * Получает чистый список животных
     * @return array
     */
    public function getAllAnimals() {
        return $this->db->row('select id,name from animals');
    }

    /**
     * Получает корм в объеденении с животным
     * @return array
     */
    public function getKorm() {
        return $this->db->row('SELECT * FROM korm LEFT JOIN animals ON korm.animal_id = animals.id ORDER BY korm.id_korm');
    }

    /**
     * Добавляет корм животного
     * на входе POST - array
     * name - string
     * @return bool
     */
    public function addKorm() {
        return $this->db->query('insert into korm values (:id, :animal_id, :name, :size)',
            ['id' => '', 'animal_id' => $_POST['animal_id'], 'name' => $_POST['name'], 'size' => $_POST['size']]);
    }

    /**
     * Меняет данные в таблице
     * на входе POST со всеми данным таблицы
     */
    public function updateKorm() {
        return $this->db->query('UPDATE korm SET animal_id=:animal_id, name_korm=:name,size=:size WHERE id_korm=:id',
            ['animal_id' => intval($_POST['animal_id']), 'name' => $_POST['name'], 'size' => intval($_POST['size']), 'id' => $_POST['id']]);
    }

    /**
     * Получает список билетов
     * @return array
     */
    public function getBileti() {
        return $this->db->row('SELECT * FROM bileti LEFT JOIN sotrudniki ON sotrudniki.id = bileti.id_bileti');
    }

    /**
     * Получает список сотрудников
     * @return array
     */
    public function getSotrudniki() {
        return $this->db->row('select * from sotrudniki LEFT JOIN sotrudnik_type ON sotrudnik_type.id_s = sotrudniki.type ORDER BY sotrudniki.id');
    }

    /**
     * Добавляет корм билет
     * на входе POST - array
     * name - string
     * @return bool
     */
    public function addBileti() {
        return $this->db->query('insert into bileti values (:id, :time, :sotrudnik_id)',
            ['id' => '', 'sotrudnik_id' => intval($_POST['sotrudnik_id']), 'time' => $_POST['time']]);
    }

    /**
     * Выводит должности сотрудников
     * @return array
     */
    public function getSotTypes() {
        return $this->db->row('select * from sotrudnik_type');
    }

    /**
     * Добавление сотрудника
     * @return bool|\PDOStatement
     */
    public function addSotrudnik() {
        return $this->db->query('insert into sotrudniki values (:id, :name, :date, :type)',
            ['id' => '', 'name' => $_POST['name'], 'date' => $_POST['date'], 'type' => $_POST['type_s']]);
    }

    /**
     * Изменить сотрудника
     * @return bool|\PDOStatement
     */
    public function updateSotrudnik() {
        return $this->db->query('UPDATE sotrudniki SET name=:name, date_start=:date,type=:type WHERE id=:id',
            ['id' => $_POST['id'], 'date' => $_POST['date'], 'type' => $_POST['type_s'], 'name' => $_POST['name']]);
    }




}