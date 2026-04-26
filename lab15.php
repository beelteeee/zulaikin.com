<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. Интерфейс
interface FigureInterface {
    public function getArea();
}

// 2. Абстрактный класс Figure
abstract class Figure implements FigureInterface {
    protected float $area;
    protected string $color;
    protected int $sides;

    public function __construct(string $color) {
        $this->color = $color;
    }

    // Геттеры для доступа к protected свойствам
    public function getColor(): string {
        return $this->color;
    }

    public function getSides(): int {
        return $this->sides;
    }

    // Абстрактный метод
    abstract public function infoAbout(): string;
}

// 3. Класс Rectangle (Прямоугольник)
class Rectangle extends Figure {
    private float $a;
    private float $b;

    public function __construct(float $a, float $b, string $color) {
        parent::__construct($color);
        $this->a = $a;
        $this->b = $b;
        $this->sides = 4;
    }

    public function getArea(): float {
        return $this->a * $this->b;
    }

    public function infoAbout(): string {
        return "Это класс прямоугольника. У него {$this->sides} стороны.";
    }
}

// 4. Класс Square (Квадрат)
class Square extends Figure {
    private float $a;

    public function __construct(float $a, string $color) {
        parent::__construct($color);
        $this->a = $a;
        $this->sides = 4;
    }

    public function getArea(): float {
        return $this->a * $this->a;
    }

    public function infoAbout(): string {
        return "Это класс квадрата. У него {$this->sides} стороны.";
    }
}

// 5. Класс Triangle (Треугольник)
class Triangle extends Figure {
    private float $a;
    private float $b;
    private float $c;

    public function __construct(float $a, float $b, float $c, string $color) {
        parent::__construct($color);
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->sides = 3;
    }

    public function getArea(): float {
        $p = ($this->a + $this->b + $this->c) / 2;
        return sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
    }

    public function infoAbout(): string {
        return "Это класс треугольника. У него {$this->sides} стороны.";
    }
}

// Создание объектов
$rect1 = new Rectangle(10, 5, "Синий");
$rect2 = new Rectangle(7, 3, "Красный");
$sq1 = new Square(5, "Зеленый");
$sq2 = new Square(10, "Желтый");
$tr1 = new Triangle(3, 4, 5, "Оранжевый");
$tr2 = new Triangle(6, 8, 10, "Фиолетовый");

$figures = [$rect1, $rect2, $sq1, $sq2, $tr1, $tr2];
$names   = ["Прямоугольник 1", "Прямоугольник 2", "Квадрат 1", "Квадрат 2", "Треугольник 1", "Треугольник 2"];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лаба 15</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f7f6; padding: 20px; }
        h1 { text-align: center; color: #333; }
        .grid { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 320px; border-left: 5px solid #007bff; }
        .card h3 { margin-top: 0; color: #007bff; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .info { color: #555; margin: 8px 0; }
        .area { font-weight: bold; font-size: 1.3em; color: #28a745; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Лабораторная 15</h1>
    <div class="grid">
        <?php foreach ($figures as $i => $fig): ?>
            <div class="card">
                <h3><?= $names[$i] ?></h3>
                <p class="info">📝 <?= $fig->infoAbout() ?></p>
                <p class="info">🎨 Цвет: <?= $fig->getColor() ?></p>
                <p class="info">📐 Сторон: <?= $fig->getSides() ?></p>
                <p class="area">📐 Площадь: <?= number_format($fig->getArea(), 2) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>