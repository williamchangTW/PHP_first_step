<?php
// day1: output
echo "Hello World!\n";

// day2: variable define
$var = "Give your name:";
echo $var." William\n";

$var1 = 100;
$res = $var1 + 10 / 2;
echo $res."\n";

//day3: if else expression
$weather = "rainning";
if ($weather = "rainning") 
{
    echo "bring an umbrella\n";
    echo "wear a raincoat\n";
    echo "wear rain boots\n";
} 
else
{
    echo "play basketball\n";
}

//day4 : loop
$order_total = array();
$order_total['1221000'] = 100;
$order_total['1221001'] = 200;
$order_total['1221002'] = 300;
$order_total['1221003'] = 400;
$order_total['1221004'] = 500;
$order_total['1221005'] = 150;
$order_total['1221006'] = 200;
$order_total['1221007'] = 300;

$order_recieve = array();
$order_recieve['1221000'] = 100;
$order_recieve['1221001'] = 200;
$order_recieve['1221002'] = 300;
$order_recieve['1221003'] = 400;
$order_recieve['1221004'] = 0;
$order_recieve['1221005'] = 150;
$order_recieve['1221006'] = 0;

$order_not_exist = array();
$order_zero = array();
foreach($order_total as $order_id => $order_total)
{
    echo $order_id."\n";
    if (isset ($order_recieve[$order_id]))
    {
        echo $order_id."\n";
        if ($order_recieve[$order_id] != $order_total)
        {
            $order_zero[] = $order_total;
        }
    } else {
        $order_not_exist[] = $order_id;
    }
}
echo "Order not recieved: \n";
print_r($order_zero);
echo "Order not exist: \n";
print_r($order_not_exist);

// day5:
// case 1: str operation
foreach ($order_recieve as $key => $val)
{
    $month = substr($key, 0, 2);
    $day = substr($key, 2, 2);
    $count = substr($key,4, 3);
    echo "month: $month \n";
    echo "day: $day \n";
    echo "count: $count \n";
}

// case 2: class
class Hero
{
    public $name;
    public $stats_hp;
    public $stats_mp;
    public $stats_atk;
    public $stats_def;
    public $stats_1;
    public $stats_2;
    public $stats_3;
    public $stats_4;
    public $article;
}

$heroBox = new Hero();
$heroBox->name = "Valhein";
$heroBox->stats_hp = 100;
$heroBox->stats_mp = 50;
$heroBox->stats_atk = 60;
$heroBox->stats_def = 40;

//case 3: advanced class
class Stats
{
    public $hp;
    public $mp;
    public $atk;
    public $def;
    public function __construct($sourceHp, $sourceMp, $sourceAtk, $sourceDef)
    {
        $this->hp = $sourceHp;
        $this->mp = $sourceMp;
        $this->atk = $sourceAtk;
        $this->def = $sourceDef;
    }
}

class Skill
{
    public $name;
    public $description;
    public function __construct($sourceName, $sourceDescription)
    {
        $this->name = $sourceName;
        $this->description = $sourceDescription;
    }
}

class Hero_New
{
    public $name;
    public $stats;
    public $skills;
    public $article;
    function __construct($sourceName, $sourceStats, $sourceSkills, $sourceArticle)
    {
        $this->name = $sourceName;
        $this->stats = $sourceStats;
        $this->skills = $sourceSkills;
        $this->article = $sourceArticle;
    }
}
$sourceName = "Valhein";
$sourceStats = new Stats(100, 80, 40, 20); // (hp, mp, atk, def)
$sourceSkills[] = new Skill("skill1", "bla");
$sourceSkills[] = new Skill("skill2", "bla");
$sourceSkills[] = new Skill("skill3", "bla");
$sourceSkills[] = new Skill("skill4", "bla");
$sourceArticle = "skip";
$hero = new Hero_New($sourceName, $sourceStats, $sourceSkills, $sourceArticle);

echo $hero->name."\n";
echo $hero->stats->hp."\n";
echo $hero->skills[0]->name."\n";
echo $hero->skills[1]->name."\n";
echo $hero->skills[2]->name."\n";
echo $hero->skills[3]->name."\n";
echo $hero->article."\n";
