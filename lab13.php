<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 13: Объекты в PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 20px; line-height: 1.6; }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; }
        .task { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #6f42c1; }
        code { background: #e9ecef; padding: 2px 5px; border-radius: 4px; color: #d63384; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №13</h1>

    <?php
    // ==========================================
    // КЛАСС РАБОТНИКА (Employee)
    // ==========================================
    class Employee {
        // Задание 1: Свойства
        public $name;
        private $age;      // Задание 7: делаем скрытым (private)
        private $salary;

        // Конструктор (удобно сразу задавать значения при создании)
        public function __construct($name, $age, $salary) {
            $this->name = $name;
            $this->salary = $salary;
            $this->setAge($age); // Сразу используем валидацию из Задания 8/10
        }

        // Задание 3: возвращает имя
        public function getName() {
            return $this->name;
        }

        // Задание 4: возвращает возраст
        public function getAge() {
            return $this->age;
        }

        // Задание 5: возвращает зарплату конкретного работника
        public function getSalary() {
            return $this->salary;
        }

        // Задание 9 & 10: приватная проверка возраста
        private function checkAge($newAge) {
            return $newAge >= 18;
        }

        // Задание 7, 8, 10: открытый метод установки возраста
        public function setAge($newAge) {
            if ($this->checkAge($newAge)) {
                $this->age = $newAge;
            } else {
                echo "⚠️ Вам работать в нашей компании еще рано!<br>";
            }
        }

        // Задание 6: статический метод для суммы зарплат всех работников
        public static function getTotalSalary(array $workers) {
            $sum = 0;
            foreach ($workers as $w) {
                $sum += $w->getSalary();
            }
            return $sum;
        }
    }

    // ==========================================
    // ВЫПОЛНЕНИЕ ЗАДАНИЙ
    // ==========================================

    echo '<div class="task"><h3>Задание 1: Создание 2 объектов и установка свойств</h3>';
    $emp1 = new Employee("Иван", 25, 50000);
    $emp2 = new Employee("Мария", 30, 65000);
    echo "✅ Созданы: {$emp1->getName()} и {$emp2->getName()}</div>";

    echo '<div class="task"><h3>Задание 2: Сумма зарплат и возрастов</h3>';
    $totalSalary = Employee::getTotalSalary([$emp1, $emp2]);
    $totalAge = $emp1->getAge() + $emp2->getAge();
    echo "Сумма зарплат: <b>$totalSalary</b> руб.<br>";
    echo "Сумма возрастов: <b>$totalAge</b> лет.</div>";

    echo '<div class="task"><h3>Задание 3, 4, 5: Работа методов getName, getAge, getSalary</h3>';
    echo "👤 {$emp1->getName()} | Возраст: {$emp1->getAge()} | Зарплата: {$emp1->getSalary()} руб.<br>";
    echo "👤 {$emp2->getName()} | Возраст: {$emp2->getAge()} | Зарплата: {$emp2->getSalary()} руб.</div>";

    echo '<div class="task"><h3>Задание 7, 8, 9, 10: setAge + приватный checkAge</h3>';
    echo "🔹 Попытка установить возраст 16 лет:<br>";
    $emp1->setAge(16); 
    echo "Текущий возраст: <b>{$emp1->getAge()}</b> лет (не изменился).<br><br>";

    echo "🔹 Попытка установить возраст 28 лет:<br>";
    $emp1->setAge(28);
    echo "Текущий возраст: <b>{$emp1->getAge()}</b> лет (успешно изменён).</div>";
    ?>
</body>
</html>